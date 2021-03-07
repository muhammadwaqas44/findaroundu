<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/22/2019
 * Time: 3:55 PM
 */

namespace App\Services;


use App\Setting;

class SettingsService
{
    private $planPagination = 5;

    public function getServices($request)
    {

        if ($request->sort_by == "oldest" && $request->has('search')) {

            $data['all_settings'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_settings'] = Setting::where('title', 'like', '%' . $request->search . '%')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::where('title', 'like', '%' . $request->search . '%')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::where('title', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_settings'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_settings'] = Setting::orderBy('id', 'asc')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::orderBy('id', 'asc')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_settings'] = Setting::orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::orderBy('id', 'desc')->count();

        } else {

            $data['all_settings'] = Setting::orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = Setting::orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_settings_count'] = Setting::orderBy('id', 'desc')->count();

        }


        $request->flash();
        return $data;
    }

    public function changeStatus($id)
    {

        $status = Setting::find($id);
        if($status)
        {
            if($status->is_active == 0)
            {
                Setting::where('id','=',$id)->update(['is_active'=>1]);
                Setting::where('id','!=',$id)->update(['is_active'=>0]);
                return 'success';
            }
            else{
                Setting::where('id','=',$id)->update(['is_active'=>0]);
                return 'success';
            }
        }

    }

}