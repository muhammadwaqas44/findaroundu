<?php

namespace App\Http\Controllers\Admin;

use App\Services\SettingsService;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //
    public function allSettings(Request $request, SettingsService $service)
    {
        $data['all_settings'] = $service->getServices($request);

        return view('Admin.Settings.all-settings',compact('data'));
    }

    public function addNewSettings(Request $request)
    {
        return view('Admin.Settings.add-new-settings');
    }

    public function postNewSettings(Request $request)
    {

        Setting::create($request->all());
        return redirect()->route('admin.all-settings');
    }

    public function changeStatus($id, SettingsService $service)
    {
        $status = $service->changeStatus($id);

        if($status == 'success'){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function deleteSetting($id)
    {
        $setting = Setting::find($id);

        if($setting)
        {
            $setting->delete();
            return redirect()->back();
        }
    }
}
