<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\MainModelPivotFunction;
use App\Subscription\MainModule;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;


class ModuleServices
{
    use SoftDeletes;
    private $modulePagination = 5;

    public function addModuleFunctions($moduleId, $request){
        $forDeleteModelFun = MainModelPivotFunction::where('module_id',$moduleId)->whereNotIn('function_id',$request->functions_id)->get();
        foreach($forDeleteModelFun as $deleteFun){
            $deleteFun->delete();
        }
        foreach($request->functions_id as $function_id){
            if(MainModelPivotFunction::where('module_id',$moduleId)->where('function_id',$function_id)->count() == 0)
            {MainModelPivotFunction::create(["module_id" => $moduleId, 'function_id' => $function_id]);}
        }

        return 'success';
    }

    public function allModules($request){
        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_modules'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('created_by') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('created_by') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_modules'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'asc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_modules'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'desc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::where('created_by', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_modules'] = MainModule::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::where('name', 'like', '%' . $request->search . '%')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_modules'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_modules'] = MainModule::orderBy('id', 'asc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::orderBy('id', 'asc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_modules'] = MainModule::orderBy('id', 'desc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::orderBy('id', 'desc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::orderBy('id', 'desc')->count();

        } else {
            $data['all_modules'] = MainModule::orderBy('id', 'desc')->simplePaginate($this->modulePagination);
            $data['total_pages'] = MainModule::orderBy('id', 'desc')->paginate($this->modulePagination);
            $data['all_modules_count'] = MainModule::orderBy('id', 'desc')->count();
        }
        $request->flash();
        return $data;
    }

    public function addModule($request)
    {
        if($request->module_icon_option == 'image'){
            $fileName = time()."_".$request->name.".png";
            Image::make($request->icon_image)->save(public_path("erp/module-images/" . $fileName));
            MainModule::create(array_merge($request->except(['_token', 'icon_image']),['icon_image_url'=> "erp/module-images/".$fileName]));
            return "success";
        }else{
            $stripeService = new StripeServices();
            $product = $stripeService->addProduct($request);
            $stripeProductId = $product->id;
            MainModule::create(array_merge($request->except(['_token', 'icon_image','module_icon_option']),['icon_code'=>$request->icon_code,'stripe_product_id' => $stripeProductId]));
            return "success";
        }

    }


}