<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Category;
use App\Imports\CategoriesImport;
use App\Imports\TagsImport;
use App\MainCountry;
use App\PivotCategoryCountry;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Helpers\ImageHelpers;

class CategoryService
{
    private $categoriesPagination = 100;


    public function getAllCategoriesAdmin($categoryType)
    {
        if ($categoryType == "All") {
            $data['all_categories'] = Category::withoutGlobalScopes()->orderBy('id', 'desc')->simplePaginate($this->categoriesPagination);
            $data['total_pages'] = Category::withoutGlobalScopes()->orderBy('id', 'desc')->paginate($this->categoriesPagination);
            $data['all_categories_count'] = Category::withoutGlobalScopes()->orderBy('id', 'desc')->count();
        } else {
            $data['all_categories'] = Category::withoutGlobalScopes()->where('type', $categoryType)->orderBy('id', 'desc')->simplePaginate($this->categoriesPagination);
            $data['total_pages'] = Category::withoutGlobalScopes()->where('type', $categoryType)->orderBy('id', 'desc')->paginate($this->categoriesPagination);
            $data['all_categories_count'] = Category::withoutGlobalScopes()->where('type', $categoryType)->orderBy('id', 'desc')->count();
        }
        $data['type'] = $categoryType;
        return $data;
    }

    public function getAllSubCategoriesAdmin($categoryId)
    {
        $parentCategory = Category::withoutGlobalScopes()->find($categoryId);
        $data['all_categories'] = $parentCategory->childCate()->orderBy('id', 'desc')->simplePaginate($this->categoriesPagination);
        $data['total_pages'] = $parentCategory->childCate()->orderBy('id', 'desc')->paginate($this->categoriesPagination);
        $data['all_categories_count'] = $parentCategory->childCate()->orderBy('id', 'desc')->count();
        return $data;
    }


    public function getAllCategoriesData($type)
    {
        if ($type == "Individuals") {
            $categories = Category::withoutGlobalScopes()->individual()->get();
            $categoryType = "all-individuals-categories";
        } else {
            $categories = Category::withoutGlobalScopes()->company()->get();
            $categoryType = "all-company-categories";
        }

        $result['categories'] = [];
        foreach ($categories as $category) {
            $status = 'active';
            $urlForActive = route('admin.change-status.user', [$category->id]);
            $active = "<a class=\"btn btn-xs  btn-danger\"onclick=\"changeStatus(" . $category->id . ",'$categoryType')  \">Deactive</a>";
            if ($category->is_active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs  btn-success\" onclick=\"changeStatus(" . $category->id . ",'$categoryType')  \">Active </a>";
            }

            $result['categories'][] = [
                'action' => $active,
                'name' => $category->name,
                'profile_image' => $category->profile_image,
                'id' => $category->id,
                'created_at' => $category->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['categories'])->make(true);

    }


    public function changeCategoryStatus($id)
    {
        $category = Category::withoutGlobalScopes()->find($id);

        if ($category->is_active == 0) {
            $category->update(['is_active' => 1]);
            session()->flash('degree-status-active', $category->name . " Activated.");

        } else {
            $category->update(['is_active' => 0]);
            session()->flash('degree-status-deactive', $category->name . " DeActivated.");
        }
    }


    public function addCategory($request)
    {
        Category::create([$request->except('_token')]);
    }

    public function postCategory($request)
    {
        $fileName = time() . "-" . rand(10, 1000000) . $request->name . ".png";
        ImageHelpers::updateProfileImage('project-assets/images/categories/', $request->file('profile_image'), $fileName);
        Category::create(array_merge($request->except('_token'), ['profile_image' => "project-assets/images/categories/" . $fileName, 'is_active' => 1]));
    }

    public function updateCategory($request)
    {
        $category = Category::withoutGlobalScopes()->find($request->id);
        if (!empty($request->profile_image)) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->name . ".png";
            ImageHelpers::updateProfileImage('project-assets/images/categories/', $request->file('profile_image'), $fileName);
            $category->update(array_merge($request->except('_token'), ['profile_image' => "project-assets/images/categories/" . $fileName]));
        } else {
            $category->update($request->except(['_token']));
        }
    }

    public function getCategoryCountryWise($countryId, $type)
    {
        $cat = PivotCategoryCountry::with(["category"])->where(["country_id" => $countryId]);
        if ($type == "Professionals") {
            $cat->professional();
        }
        return $cat->orderBy("order_no", "ASC")->get();
    }

    public function getCategoryTypeWise($type)
    {
        $cat = Category::withoutGlobalScopes();
        if ($type == "Professionals") {
            $cat->professional();
        }
        $cats = $cat->get();
        $newCats = [];
        foreach ($cats as $cat) {
            $newCats[$cat->parent_id][] = $cat;
        }

        $newCatArray = [];
        foreach ($cats as $cat) {
            if ($cat->parent_id == null) {
                $newCatArray[] = [
                    "category_object" => $cat,
                    "category_childs" => (isset($newCats[$cat->id])) ? $newCats[$cat->id] : [],
                ];
            }
        }
        return $newCatArray;
    }

    public function updateSelectedCategories($request)
    {
        $country = MainCountry::find($request->country_id);
        if ($country && isset($request->id) && is_array($request->id)) {
            $newArr = [];
            foreach ($request->id as $key => $val) {
                $newArr[$val] = [
                    "order_no" => $key,
                    "type" => $request->type
                ];
            }
            $country->categories()->sync($newArr);
        }
    }

    public function categoriesImport($request)
    {
        if ('Tags' == $request->type) {
            $request->session()->put('type', $request->type);
            Excel::import(new TagsImport(), request()->file('import_file'));
        } else {
            $request->session()->put('type', $request->type);
            Excel::import(new CategoriesImport(), request()->file('import_file'));
        }
    }

    public function categoriesImportShopping($file)
    {
        session()->put('type', 'Shopping');
        Excel::import(new CategoriesImport, $file);

    }

    public function categoriesImportProfessionals($file)
    {
        session()->put('type', 'Professionals');
        Excel::import(new CategoriesImport, $file);

    }

    public function categoriesImportClassified($file)
    {
        session()->put('type', 'Adds');
        Excel::import(new CategoriesImport, $file);

    }

    public function categoriesImportBusiness($file)
    {
        session()->put('type', 'Business');
        Excel::import(new CategoriesImport, $file);

    }

    public function tagsImport($file)
    {
        Excel::import(new TagsImport, $file);

    }
}
