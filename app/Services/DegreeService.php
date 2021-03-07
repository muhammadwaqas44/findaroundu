<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;
use Yajra\Datatables\Datatables;
use App\Degree;
use Illuminate\Http\Request;





class DegreeService
{


    public function getDegreeData()
    {
        $degrees = Degree::withoutGlobalScopes()->get();
        $result['degree'] = [];
        foreach ($degrees as $degree) {
            $status = 'active';
            $urlForActive = route('admin.change-status.degree', [$degree->id]);
            $active = "<a class=\"btn btn-xs  btn-danger\"onclick=\"changeStatus(".$degree->id.",'degrees')\">Deactive</a>";
            if ($degree->active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs  btn-success\" onclick=\"changeStatus(".$degree->id.",'degrees')\">Active </a>";
            }

            $result['degree'][] = [
                'action' => $active,
                'name' => $degree->name,
                'id' => $degree->id,
                'created_at' => $degree->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['degree'])->make(true);

    }




    public function changeDegreeStatus($id){
        $degree = Degree::withoutGlobalScopes()->find($id);

        if ($degree->active == 0) {
            $degree->update(['active' => 1]);
            session()->flash('degree-status-active', $degree->name . " Activated.");

        } else {
            $degree->update(['active' => 0]);
            session()->flash('degree-status-deactive', $degree->name . " DeActivated.");
        }
    }



    public function addDegree($request){
        session()->flash('degree-added-success', $request->name.'  Added.');
        Degree::create(['name' => $request->name]);
    }




}