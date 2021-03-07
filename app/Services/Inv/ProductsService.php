<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/5/2019
 * Time: 2:10 PM
 */

namespace App\Services\Inv;


use App\Category;
use App\Helpers\ImageHelpers;
use App\Inv\InvProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsService
{

    private $productsPagination = 5;


    public function getAllProducts($request)
    {
        $data['all_products'] = InvProduct::orderBy('id', 'desc');
        $data['total_pages'] = InvProduct::orderBy('id', 'desc');
        $data['all_products_count'] = InvProduct::orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_products'] = $data['total_pages']->where('product_name', 'like', '%' . $request->search . '%');
            $data['total_pages'] = $data['total_pages']->where('product_name', 'like', '%' . $request->search . '%');
            $data['all_products_count'] = $data['all_products_count']->where('product_name', 'like', '%' . $request->search . '%');
        }


        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_products'] = $data['all_products']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_pages'] = $data['total_pages']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_products'] = $data['all_products']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_products'] = $data['all_products']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }
        $data['all_products'] = $data['all_products']->simplePaginate($this->productsPagination);
        $data['total_pages'] = $data['total_pages']->paginate($this->productsPagination);
        $data['all_products_count'] = $data['all_products_count']->count();

        $request->flash();
        return $data;
    }

    public function getAllProductsFront($request)
    {
        $data['all_products'] = InvProduct::orderBy('id', 'desc');
        $data['total_pages'] = InvProduct::orderBy('id', 'desc');
        $data['all_products_count'] = InvProduct::orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_products'] = $data['total_pages']->where('product_name', 'like', '%' . $request->search . '%');
            $data['total_pages'] = $data['total_pages']->where('product_name', 'like', '%' . $request->search . '%');
            $data['all_products_count'] = $data['all_products_count']->where('product_name', 'like', '%' . $request->search . '%');
        }


        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_products'] = $data['all_products']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_pages'] = $data['total_pages']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_products'] = $data['all_products']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_products'] = $data['all_products']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_products_count'] = $data['all_products_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }
        $data['all_products'] = $data['all_products']->simplePaginate($this->productsPagination);
        $data['total_pages'] = $data['total_pages']->paginate($this->productsPagination);
        $data['all_products_count'] = $data['all_products_count']->count();



        $request->flash();
        return $data;
    }

    public function saveProduct($request)
    {
        DB::beginTransaction();

        $fileName = time() . "-" . rand(10, 1000000) . 'product-image' . ".png";

        ImageHelpers::updateProfileImage('project-assets/images/products/profile-image/', $request->file('profile_image'), $fileName);

        if($request->sale_from == '' && $request->sale_to == '')
        {
            $product = InvProduct::create($request->except('category_id','gallery_images','profile_image') + ['profile_image' => "project-assets/images/products/profile-image/" . $fileName, 'created_by' => Auth::user()->id]);
        }
        else{
            $product = InvProduct::create($request->except('category_id','gallery_images','profile_image','sale_from','sale_to') + ['profile_image' => "project-assets/images/products/profile-image/" . $fileName, 'created_by' => Auth::user()->id,'sale_from'=>Carbon::parse($request->sale_from)->format('Y-m-d'),'sale_to'=>Carbon::parse($request->sale_to)->format('Y-m-d')]);
        }



        if($product)
        {

            $product->categories()->attach($request->category_id);

            foreach($request->gallery_images as $key => $gallery)
            {
                $fileName = time() . "-" . rand(10, 1000000) . 'product-gallery-image' . ".png";

                ImageHelpers::updateProfileImage('project-assets/images/products/gallery-image/', $gallery, $fileName);

                $product->gallery()->create(['name'=>'project-assets/images/products/gallery-image/'.$fileName]);
            }
            DB::commit();
            return 'success';
        }
        else{
            DB::rollBack();
            return 'error';
        }
    }

    public function updateProduct($request)
    {
        DB::beginTransaction();
        $product_get = InvProduct::find($request->id);
        if($request->profile_image != '')
        {

            $filePath = $product_get->profile_image;
            if (file_exists($filePath))
            {
                unlink($filePath);
            }

            $fileName = time() . "-" . rand(10, 1000000) . 'product-image' . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/products/profile-image/', $request->file('profile_image'), $fileName);
            if($request->sale_from == '' && $request->sale_to == '')
            {
                $product = InvProduct::where('id','=',$request->id)->update($request->except('_token','category_id','gallery_images','profile_image') + ['profile_image' => "project-assets/images/products/profile-image/" . $fileName, 'created_by' => Auth::user()->id]);
            }
            else{
                $product = InvProduct::where('id','=',$request->id)->update($request->except('_token','category_id','gallery_images','profile_image','sale_from','sale_to') + ['profile_image' => "project-assets/images/products/profile-image/" . $fileName, 'created_by' => Auth::user()->id,'sale_from'=>Carbon::parse($request->sale_from)->format('Y-m-d'),'sale_to'=>Carbon::parse($request->sale_to)->format('Y-m-d')]);
            }
        }
        else{
            if($request->sale_from == '' && $request->sale_to == '')
            {
                $product = InvProduct::where('id','=',$request->id)->update($request->except(['_token','category_id','gallery_images','profile_image']) + ['created_by' => Auth::user()->id]);
            }
            else{
                $product = InvProduct::where('id','=',$request->id)->update($request->except(['_token','category_id','gallery_images','profile_image','sale_from','sale_to']) + [ 'created_by' => Auth::user()->id, 'sale_from'=>Carbon::parse($request->sale_from)->format('Y-m-d'), 'sale_to'=>Carbon::parse($request->sale_to)->format('Y-m-d')]);
            }
        }

        if($product)
        {
            $product = InvProduct::find($request->id);
            $product->categories()->detach();

            $product->categories()->attach($request->category_id);

            if($request->gallery_images != null) {

                foreach ($request->gallery_images as $key => $gallery) {
                    $fileName = time() . "-" . rand(10, 1000000) . 'product-gallery-image' . ".png";

                    ImageHelpers::updateProfileImage('project-assets/images/products/gallery-image/', $gallery, $fileName);

                    $product->gallery()->create(['name' => 'project-assets/images/products/gallery-image/' . $fileName]);
                }
            }
            DB::commit();
            return 'success';
        }
        else{
            DB::rollBack();
            return 'error';
        }
    }

    public function deleteProduct($id)
    {
        $product = InvProduct::find($id);
        DB::beginTransaction();
        if($product)
        {
            $product->categories()->detach();
            foreach($product->gallery as $gallery)
            {
                $filePath = $gallery->name;
                if (file_exists($filePath))
                {
                    unlink($filePath);
                }
                $gallery->delete();
            }

            $filePath = $product->profile_image;
            if (file_exists($filePath))
            {
                unlink($filePath);
                $product->delete();

            }

            DB::commit();
            return 'success';

        }
        else{
            DB::rollBack();
            return 'error';
        }


    }


    public static function productApi($data, $productData)
    {
        foreach ($data['all_products'] as $product) {
            $productData[] = [
                'stars' => ReviewHelper::reviewStars($product),
                'product_id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'currency_name' => $product->categories->name,
                'quantity' => $product->quantity,
                'type' => $product->type,
                'description' => $product->description,
                'business' => $product->business->name,
                'sale' => $product->sale,
                'sale_percentage' => $product->sale_percentage,
                'sale_from' => $product->sale_from,
                'sale_to' => $product->sale_to,
                'sku' => $product->sku,
                'return' => $product->return,
                'return_date' => $product->return_date,
                'return_interval' => $product->return_interval,
                'warranty'=> $product->warranty,
                'warranty_claim_date'=> $product->warranty_claim_date,
                'warranty_interval' => $product->warranty_interval,
                'cash_on_delivery' => $product->cash_on_delivery,
                'home_delivery' => $product->home_delivery,
                'home_delivery_to' => $product->home_delivery_to,
                'home_delivery_from' => $product->home_delivery_from,
                'home_delivery_interval' => $product->home_delivery_interval,
                'delivery_charges' => $product->delivery_charges,
                'status'=>$product->status,
                'created_by' => $product->createdBy->name,
                'profile_image' =>$product->profile_image,
                'gallery_image'=>$product->gallery,
                'category' => $product->categories
            ];
        }

        return $productData;
    }


    public static function nearMe()
    {
        $lat = '';
        $lng = '';
        if(!empty(Auth::user()->userinfo->lat) &&  !empty(Auth::user()->userinfo->long) )
        {
            $lat = Auth::user()->userinfo->lat;
            $lng = Auth::user()->userinfo->long;
        }

        $data['all_products'] =  InvProduct::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        $data['total_products'] = InvProduct::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        $data['all_products_count'] = InvProduct::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        return $data;
    }

    public static function postedByMe($data)
    {
        $data['all_jobs'] = $data['all_products']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        $data['total_products'] = $data['total_jobs']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        $data['all_products_count'] = $data['all_jobs_count']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        return $data;
    }

    public static function keywordSearch($data, $request)
    {
        $data['all_jobs'] = $data['all_jobs']->where('task', 'like', '%' . $request->search . '%');
        $data['total_jobs'] = $data['total_jobs']->where('task', 'like', '%' . $request->search . '%');
        $data['all_jobs_count'] = $data['all_jobs_count']->where('task', 'like', '%' . $request->search . '%');
        return $data;
    }

    public static function addressSearch($data, $request)
    {
        $address = $request->address;

        $data['all_jobs'] = $data['all_jobs']->where('location', 'like', '%' . $request->search . '%');


        $data['total_jobs'] = $data['total_jobs']->where('location', 'like', '%' . $request->search . '%');

        $data['all_jobs_count'] = $data['all_jobs_count']->where('location', 'like', '%' . $request->search . '%');

        return $data;
    }

    public static function categorySearch($data, $request)
    {

        $categoryId = $request->category_id;

        $data['all_jobs'] = $data['all_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', 'like', '%' . $categoryId . '%');
        });


        $data['total_jobs'] = $data['total_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        $data['all_jobs_count'] = $data['total_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        return $data;
    }

    public function citySearch($data, $request)
    {

        $cityId = $request->city_id;

        $data['all_jobs'] = $data['all_jobs']->with(['city']);


        $data['total_jobs'] = $data['total_jobs']->with(['city']);

        $data['all_jobs_count'] = $data['all_jobs_count']->with(['city']);


        return $data;
    }

    public function countrySearch($data, $request)
    {
        $countryId = $request->country_id;

        $data['all_jobs'] = $data['all_jobs']->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['total_jobs'] = $data['total_jobs']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['all_jobs_count'] = $data['all_jobs_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        return $data;
    }


    public static function sortByOnApi($jobData, $request)
    {
        if ($request->sort_by == 'a-z') {
            return SetupsHelper::sortArrayAsc($jobData);
        }
        if ($request->sort_by == 'z-a') {
            return SetupsHelper::sortArrayDesc($jobData);
        }
    }

}