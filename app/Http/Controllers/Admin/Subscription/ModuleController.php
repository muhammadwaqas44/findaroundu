<?php

namespace App\Http\Controllers\Admin\Subscription;

use Illuminate\Http\Request;
use App\Services\ModuleServices;
use App\Subscription\MainModule;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    public function addModule(Request $request, ModuleServices $moduleServices){
        if($request->isMethod('get')){
            return view('admin.Module.add-module');
        }else{
            $moduleServices->addModule($request);
            return redirect()->route('admin.all-modules');
        }
    }


    public function deleteModule($moduleId){
        MainModule::destroy($moduleId);
        return redirect()->back();
    }


    public function moduleDetail($moduleId, ModuleServices $moduleServices){
        $data['module_detail'] = MainModule::find($moduleId);
        $data['all_functions'] = null;

        return view('admin.Module.module-detail',compact('data'));
    }




    public function allModules(Request $request, ModuleServices $moduleServices){
        $data['all_modules'] = $moduleServices->allModules($request);

        return view('admin.Module.all-modules',compact('data'));
    }

}
