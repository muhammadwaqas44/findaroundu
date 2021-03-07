<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;
use Yajra\Datatables\Datatables;

use App\Skill;

use Illuminate\Http\Request;





class SkillService
{



    public function addSkill($request){
        Skill::create(['name'=>$request->name]);
        session()->flash('skill-added', $request->name.'  Added.');
    }

    public function getSkillsData()
    {


        $skills = Skill::withoutGlobalScopes()->get();
        $result = [];
        foreach ($skills as $skills) {
            $status = 'active';
            $urlForActive = route('admin.change-status.skill', [$skills->id]);
            $active = "<a class=\"btn btn-xs  btn-danger\" onclick=\"changeStatus(".$skills->id.",'skills')\">Deactive</a>";
            if ($skills->active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs  btn-success\"  onclick=\"changeStatus(".$skills->id.",'skills')\">Active </a>";
            }

            $result['skills'][] = [
                'action' => $active,
                'name' => $skills->name,
                'id' => $skills->id,
                'created_at' => $skills->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['skills'])->make(true);

    }




    public function changeSkillsStatus($id){
        $skill = Skill::withoutGlobalScopes()->find($id);

        if ($skill->active == 0) {
            $skill->update(['active' => 1]);
            session()->flash('skill-status-active', $skill->name . " Activated.");
            //    return redirect()->back();
        } else {
            $skill->update(['active' => 0]);
            session()->flash('skill-status-deactive', $skill->name . " DeActivated.");

        }
    }




}