<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\SetupsHelper;
use App\Services\DegreeService;
use App\Services\SchoolService;
use App\Services\SkillService;
use App\Services\LanguageService;
use App\Http\Controllers\Controller;

class SetupsController extends Controller
{
    public function getSetups(Request $request)
    {
        return ['html_menu' => SetupsHelper::getSetups($request->setup)];
    }

    ////////////    SCHOOLS    ////////////


    public function schoolsData(SchoolService $schoolService)
    {
        return $schoolService->getSchoolsData();
    }

    public function changeSchoolStatus($id, SchoolService $schoolService)
    {
        return $schoolService->changeSchoolStatus($id);
    }

    public function addSchool(Request $request, SchoolService $schoolService)
    {
        $schoolService->addSchool($request);
        return redirect()->back();
    }






    ///////////     LANGUAGE    ////////////

    public function languagesData(LanguageService $languageService)
    {
        return $languageService->getLanguageData();
    }

    public function changeJobCatStatus($id, jobCategoriesService $jobCategoriesService){
        $jobCategoriesService->changeJobCatStatus($id);
        return "success";
    }

    public function changeLanguageStatus($id, LanguageService $languageService)
    {
        $languageService->changeLanguageStatus($id);
        return "success";
    }






    ///////////     SKILL       /////////////

    public function changeSkillStatus($id, SkillService $skillService)
    {
        $skillService->changeSkillsStatus($id);
        return redirect()->back();
    }


    public function skillsData(SkillService $skillService)
    {
        return $skillService->getSkillsData();
    }

    public function addSkill(Request $request, SkillService $skillService)
    {
        $skillService->addSkill($request);
        return redirect()->back();
    }



    /////////////       DEGRESS     /////////////

    public function changeDegreeStatus($id, DegreeService $degreeService)
    {
        $degreeService->changeDegreeStatus($id);
        return redirect()->back();
    }

    public function degreesData(DegreeService $degreeService)
    {
        return $degreeService->getDegreeData();
    }

    public function addDegree(Request $request, DegreeService $degreeService)
    {
        $degreeService->addDegree($request);
        return redirect()->back();
    }


}
