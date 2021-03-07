<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use Yajra\Datatables\Datatables;
use App\Helpers\ImageHelpers;
use App\User\School;
use Auth;
use Illuminate\Http\Request;


class SchoolService
{


    public function getSchoolsData()
    {


        $schools = School::withoutGlobalScopes()->get();
        $result = [];
        foreach ($schools as $school) {
            $status = 'active';
            $urlForActive = route('admin.change-status.school', [$school->id]);
            $active = "<a class=\"btn btn-xs btn-danger\"  onclick=\"changeStatus(" . $school->id . ",'schools')\">Deactive</a>";
            if ($school->active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs btn-success\" onclick=\"changeStatus(" . $school->id . ",'schools')\">Active </a>";
            }
            $imageUrl = asset($school->image_path);

            $result['school'][] = [
                'action' => $active,
                'name' => $school->name  ,
                'image_path' => $imageUrl,
                'id' => $school->id,
                'created_at' => $school->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['school'])->make(true);

    }


    public function changeSchoolStatus($id)
    {
        $school = School::withoutGlobalScopes()->find($id);

        if ($school->active == 0) {
            $school->update(['active' => 1]);
            session()->flash('school-status-active', $school->name . " Activated.");
            return redirect()->back();
        } else {
            $school->update(['active' => 0]);
            session()->flash('school-status-deactive', $school->name . " DeActivated.");
            return redirect()->back();
        }
    }


    public function addSchool($request)
    {
        session()->flash('school-added-success', $request->name . '  Added.');
        $fileName = time() . "-" . 'school_image' . ".png";
        ImageHelpers::updateProfileImage('energy-zone/school_images/', $request->file('school_image'), Auth::user()->name, 'not-link', $fileName);
        School::create(['name' => $request->name, 'image_path' => 'energy-zone/school_images/' . $fileName]);
    }


}