<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Business;
use App\FauTag;
use App\MainCountry;
use App\Services\CategoryService;
use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function categoriesLayout()
    {
        return view('Admin.Categories.categories');
    }

    public function loadCategories($businessId)
    {
        $businessModel = Business::withoutGlobalScope(ActiveScope::Class)->withoutGlobalScope(IsApproveScope::Class)->find($businessId);

        $data['business_detail'] = $businessModel;
        $data['category'] = Category::BusinessType()->get();

        return response()->json(['status' => 'success', 'message' => 'Categories Loaded','response_html' => view('home.Partials.ajax_response_add_and_load_categories')->with('data', $data)->render()]);
    }


    public function editCategory($categoryId)
    {
        $data['parent_categories'] = Category::all();
        $data['category'] = Category::find($categoryId);

        // dd($data['parent_categories']);

        return view('Admin.Categories.edit-category', compact('data'));
    }

    public function updateCategory(Request $request, CategoryService $categoryService)
    {
        $categoryService->updateCategory($request);
        return redirect()->route('Admin.all-categories', ["All"]);
    }

    //////////      FOR DATA TABLES


    public function getAllIndividualsCategoriesData(CategoryService $categoryService)
    {
        return $categoryService->getAllCategoriesData("Individuals");
    }


    public function getAllCompanyCategoriesData(CategoryService $categoryService)
    {
        return $categoryService->getAllCategoriesData("Company");
    }

    public function changeCategoryStatus($id, CategoryService $categoryService)
    {
        $categoryService->changeCategoryStatus($id);
        return redirect()->back();
    }

    //////////      END DATA TABLES


    public function allCategories($categoryType, CategoryService $categoriesService)
    {
        $data['all_categories'] = $categoriesService->getAllCategoriesAdmin($categoryType);
        // dd($data['all_categories']);
        return view('Admin.Categories.all-categories', compact('data'));
    }

    public function subCategories($categoryId, CategoryService $categoriesService)
    {

        $data['all_categories'] = $categoriesService->getAllSubCategoriesAdmin($categoryId);
        // dd($data['all_categories']);
        return view('Admin.Categories.sub-categories', compact('data'));
    }

    public function addCategory()
    {
        $data['parent_categories'] = Category::all();

        // dd($data['parent_categories']);

        return view('Admin.Categories.new-category', compact('data'));
    }

    public function postCategory(Request $request, CategoryService $categoryService)
    {
        $categoryService->postCategory($request);
        return redirect()->route('admin.all-categories', ["All"]);
    }

    public function deleteCategory($categoryId)
    {
        Category::withoutGlobalScopes()->find($categoryId)->delete();
        return redirect()->back();
    }

    public function categoryDetail($categoryId)
    {
        $data['category'] = Category::withoutGlobalScopes()->find($categoryId);


        return view('Admin.Categories.category-detail', compact('data'));
    }

    public function countryWiseCategory($countryId, CategoryService $categoriesService)
    {
        $type = "Professionals";
        $data["countries"] = MainCountry::all();
        $data["country_categories"] = $categoriesService->getCategoryCountryWise($countryId, $type);
        $data["count_cat_ids"] = $data["country_categories"]->pluck("category_id")->toArray();
        $data["all_categories"] = $categoriesService->getCategoryTypeWise($type);
        return view('Admin.Categories.country-wise-categories', compact('data', 'countryId', 'type'));
    }

    public function updateCategoryData(Request $request, CategoryService $categoryService)
    {
        $categoryService->updateCategory($request);
        return response()->json(["result" => "success", "message" => "Category update successfully"], 200);
    }

    public function updateCountrySelectedCategory(Request $request, CategoryService $categoryService)
    {
        $categoryService->updateSelectedCategories($request);
        return response()->json(["result" => "success", "message" => "Selected categories updated."], 200);
    }

    public function importCategories()
    {
        $data['professionals'] = Category::where('type', '=', 'Professionals')->get();
        $data['adds'] = Category::where('type', '=', 'Adds')->get();
        $data['tags'] = FauTag::all();
        $data['business'] = Category::where('type', '=', 'Business')->get();
        $data['professionals_cat'] = Category::tree()->where('type', '=', 'Professionals')->sortBy("name");
        $data['adds_cat'] = Category::tree()->where('type', '=', 'Adds')->sortBy("name");
        $data['shopping'] = Category::where('type', '=', 'Shopping')->get();
        $data['shopping_cat'] = Category::tree()->where('type', '=', 'Shopping')->sortBy("name");
        $data['business_cat'] = Category::tree()->where('type', '=', 'Business')->sortBy("name");
        return view('admin.Categories.import-categories', compact('data'));
    }

    public function deleteImportCategory($importCatId)
    {
        $cat = Category::withoutGlobalScopes()->find($importCatId);
        if ($cat){
                Category::withoutGlobalScopes()->find($importCatId)->delete();
                Category::withoutGlobalScopes()->where('parent_id', '=', $importCatId)->delete();
        }else{
        return redirect()->back();
        }
        return redirect()->back();
    }

    public function importExcelCategories(Request $request, CategoryService $categoryService)
    {
        $categoryService->categoriesImport($request);
        $data['record'] = session('variableRecord');
        return view('admin.Categories.report-importing-categories', compact('data'));
    }

    public function exportSampleCategories()
    {
        return Excel::download(new CategoriesExport, 'Sample_Categories.xlsx');
    }

}
