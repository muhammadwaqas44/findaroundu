<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;
use Yajra\Datatables\Datatables;

use App\Language;

use Illuminate\Http\Request;





class LanguageService
{


    public function addLanguage($request){
        Language::create(['name'=>$request->name]);
        session()->flash('language-added', $request->name.'  Added.');
    }


    public function getLanguageData()
    {
        $languages = Language::withoutGlobalScopes()->get();
        $result = [];

        foreach ($languages as $language) {
            $status = 'active';

            $active = "<a class=\"btn btn-danger btn-xs\" onclick=\"changeStatus(".$language->id.",'languages')\" >Deactive</a>";
            if ($language->active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-success btn-xs\" onclick=\"changeStatus(".$language->id.",'languages')\">Active </a>";
            }

            $result['language'][] = [
                'action' => $active,
                'name' => $language->name,
                'id' => $language->id,
                'created_at' => $language->created_at,
                'status' => $status
            ];
        }


        return Datatables::of($result['language'])->make(true);
    }




    public function changeLanguageStatus($id){
        $language = Language::withoutGlobalScopes()->find($id);
        if($language->active == 0){
            $language->update(['active' => 1]);
            session()->flash('language-status-active',$language->name." Activated.");
            return redirect()->back();
        }else{
            $language->update(['active' => 0]);
            session()->flash('language-status-deactive',$language->name." DeActivated.");
            return redirect()->back();
        }
    }




}