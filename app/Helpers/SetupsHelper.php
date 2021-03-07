<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Helpers;


use App\EmployeeCount;
use Illuminate\Http\Request;
use Image;
use App\Category;

class SetupsHelper
{


    public static function sortArrayAsc($businessData)
    {
        usort($businessData, function ($a, $b) use ($businessData) {

            return strnatcmp($a['title'], $b['title']);
        });
        return $businessData;
    }


    public static function sortArrayDesc($businessData)
    {
        usort($businessData, function ($a, $b) use ($businessData) {
            if (strnatcmp($a['title'], $b['title']) == -1) {
                return 1;
            }
            // return strnatcmp($a['title'],$b['title']);
        });
//dd($businessData);
        return $businessData;
    }


    ///////     Type can be link or anything else. In $file we will receive path of file or object of file
    public static function getSetups($setpName)
    {
        if ($setpName == "skills") {
            return self::getSkillsHtml();
        } elseif ($setpName == "countries") {
            return self::getCountriesHtml();
        } elseif ($setpName == "schools") {
            return self::getSchoolsHtml();
        } elseif ($setpName == "degrees") {
            return self::getDegreesHtml();
        } elseif ($setpName == "languages") {
            return self::getLanguagesHtml();
        } elseif ($setpName == "all-users") {
            return self::getUsersHtml();
        } elseif ($setpName == "all-individuals-categories") {
            return self::getCategoriesHtml();
        } elseif ($setpName == "all-company-categories") {
            return self::getCategoriesHtml();
        } elseif ($setpName == "footer_settings") {
            return self::getFooterHtml();
        } elseif ($setpName == "all-adds") {
            return self::getAddsHtml();
        } elseif ($setpName == "all-services") {
            return self::getServicesHtml();
        }
    }




    public static function topBarHelper($categoriesType)
    {
        $categoriesHtml = "";
        if ($categoriesType == "Business") {
            $categories = Category::BusinessType()->get();
            foreach ($categories as $category) {

                if ($category->childCate()->count() == 0) {
                    $categoriesHtml = $categoriesHtml . "<div style=\"width:33.3%;float:left;\"><span class=\"cat-heading\"><a onclick=\"valueReplace('$category->name','sub-category-text','business-hidden',$category->id)\">$category->name</a></span><ul class=\"mega-cat-ul\"><li><a>No SubCategories</a></li></ul></div>";
                } else {
                    $categoriesHtml = $categoriesHtml . "<div style=\"width:33.3%;float:left;\"><span class=\"cat-heading\"><a onclick=\"valueReplace('$category->name','sub-category-text','business-hidden',$category->id)\">$category->name</a></span>";
                    foreach ($category->childCate as $child) {
                        $categoriesHtml = $categoriesHtml . "<ul class=\"mega-cat-ul\"><li><a onclick=\"valueReplace('$child->name', 'sub-category-text', 'business-hidden', $child->id)\">$child->name</a></li></ul>";
                    }
                    $categoriesHtml = $categoriesHtml . "</div>";
                }

            }
            echo $categoriesHtml;
        }
    }


    public static function getSideBarCate($categoriesType, $catId)
    {
        $categoriesHtml = "";
        if ($categoriesType == "Business") {
            $categoriesHtml .= "<form id='business_filter_sidebar_form'>";
            if($catId != "") {
                $categoriesHtml .= SELF::generateCatForSidebar($catId);
            }
            $categoriesHtml .= SELF::daysWiseFilterSidebar("business");
            $categoriesHtml .= SELF::employeeWiseFilterSidebar("business");
            $categoriesHtml .= SELF::hourlyWiseFilterSidebar("business");
            $categoriesHtml .= SELF::projectWiseFilterSidebar("business");
            $categoriesHtml .= "</form>";
        }
        if ($categoriesType == "Adds") {
            $categoriesHtml .= "<form id='ads_filter_sidebar_form'>";
            if($catId != "") {
                $categoriesHtml .= SELF::generateCatForSidebar($catId);
            }
            $categoriesHtml .= SELF::daysWiseFilterSidebarAds("adds");
            $categoriesHtml .= SELF::priceAddFilterSidebar('adds');
            $categoriesHtml .= "</form>";
        }
        echo $categoriesHtml;
    }

    public static function generateCatForSidebar($catId){
        $category = Category::find($catId);
        $returnHtml = "";
        if($category){
            $returnHtml .= "<span class=\"related-p-text\"><i class=\"fas fa-list\"></i> RELATED CATEGORY</span>";
            if($category->parent_id != ""){
                $returnHtml .= "<a href=\"javascript:void(0)\" class=\"telic-text\">{$category->parent->name}</a>
                                <ul class=\"teli-comunication-ul\">";
                                    foreach ($category->parent->children as $child) {
                                        if ($child->id == $catId) {
                                            $checkboxChecked = "checked";
                                        } else {
                                            $checkboxChecked = "";
                                        }
                                        $returnHtml .= "<li>
                                                            <label class=\"type-check\">
                                                                <input name='category_id[]' value='{$child->id}' type=\"checkbox\" {$checkboxChecked} onclick=\"formSubmitById('business_filter_search_form')\">{$child->name}<span></span>
                                                            </label>
                                                        </li>";
                                    }
                $returnHtml .= "</ul>";
            } else {
                $returnHtml .= "<a href=\"javascript:void(0)\" class=\"telic-text\">{$category->name}</a>
                                <ul class=\"teli-comunication-ul\">";
                                    if ($category->children()->count() == 0) {
                                        if ($category->id == $catId) {
                                            $checkboxChecked = "checked";
                                        } else {
                                            $checkboxChecked = "";
                                        }
                                        $returnHtml .= "<li>
                                                            <label class=\"type-check\">
                                                                <input name='category_id[]' value='{$category->id}' type=\"checkbox\" {$checkboxChecked} onclick=\"formSubmitById('business_filter_search_form')\">{$category->name}<span></span>
                                                            </label>
                                                        </li>";
                                    } else {
                                        foreach ($category->children as $child) {
                                            if ($child->id == $catId) {
                                                $checkboxChecked = "checked";
                                            } else {
                                                $checkboxChecked = "";
                                            }
                                            $returnHtml .= "<li>
                                                                <label class=\"type-check\">
                                                                    <input name='category_id[]' value='{$child->id}' type=\"checkbox\" {$checkboxChecked} onclick=\"formSubmitById('business_filter_search_form')\">{$child->name}<span></span>
                                                                </label>
                                                            </li>";
                                        }
                                    }
                $returnHtml .= "</ul>";
            }
        }
        return $returnHtml;
    }

    public static function daysWiseFilterSidebar($type){
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#date-posted-{$type}\">Date Posted <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"date-posted-{$type}\" >
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='1' onclick=\"formSubmitById('business_filter_search_form')\">24 hours<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='3' onclick=\"formSubmitById('business_filter_search_form')\">3 days<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='7' onclick=\"formSubmitById('business_filter_search_form')\">7 days<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='30' onclick=\"formSubmitById('business_filter_search_form')\">30 days<span></span>
                                </label>
                            </li>
                        </ul>";
        return $returnHtml;
    }


    public static function daysWiseFilterSidebarAds($type){
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#date-posted-{$type}\">Date Posted <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"date-posted-{$type}\" >
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='1' onclick=\"formSubmitById('ads_filter_search_form')\">24 hours<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='3' onclick=\"formSubmitById('ads_filter_search_form')\">3 days<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='7' onclick=\"formSubmitById('ads_filter_search_form')\">7 days<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='day_limit' value='30' onclick=\"formSubmitById('ads_filter_search_form')\">30 days<span></span>
                                </label>
                            </li>
                        </ul>";
        return $returnHtml;
    }



    public static function employeeWiseFilterSidebar($type){
        $employeeCounts = EmployeeCount::all();
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#employees-{$type}\">Employees <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"employees-{$type}\" >";
                            foreach($employeeCounts as $count){
                                $returnHtml .= "<li>
                                                    <label class=\"type-check\">
                                                        <input type=\"radio\" name='employee_count' value='{$count->id}' onclick=\"formSubmitById('business_filter_search_form')\">{$count->name}<span></span>
                                                    </label>
                                                </li>";
                            }
                        $returnHtml .= "</ul>";
        return $returnHtml;
    }

    public static function hourlyWiseFilterSidebar($type){
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#hourly-{$type}\">Hourly Rate <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"hourly-{$type}\" >
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='1-10' onclick=\"formSubmitById('business_filter_search_form')\">1 - 10<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='11-20' onclick=\"formSubmitById('business_filter_search_form')\">11 - 20<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='21-30' onclick=\"formSubmitById('business_filter_search_form')\">21 - 30<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='31-40' onclick=\"formSubmitById('business_filter_search_form')\">31 - 40<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='41-50' onclick=\"formSubmitById('business_filter_search_form')\">41 - 50<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='51-more' onclick=\"formSubmitById('business_filter_search_form')\">More Than 50<span></span>
                                </label>
                            </li>
                        </ul>";
        return $returnHtml;
    }

    public static function projectWiseFilterSidebar($type){
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#price-{$type}\">Price <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"price-{$type}\" >
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='1-10' onclick=\"formSubmitById('business_filter_search_form')\">1 - 10<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='11-20' onclick=\"formSubmitById('business_filter_search_form')\">11 - 20<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='21-30' onclick=\"formSubmitById('business_filter_search_form')\">21 - 30<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='31-40' onclick=\"formSubmitById('business_filter_search_form')\">31 - 40<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='41-50' onclick=\"formSubmitById('business_filter_search_form')\">41 - 50<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='project_price' value='51-more' onclick=\"formSubmitById('business_filter_search_form')\">More Than 50<span></span>
                                </label>
                            </li>
                        </ul>";
        return $returnHtml;
    }

    public static function priceAddFilterSidebar($type){
        $returnHtml = "<span class=\"related-p-text\" data-toggle=\"collapse\" data-target=\"#price-{$type}\">Price <i class=\"fas fa-angle-down\"></i></span>
                        <ul class=\"type-ul collapse\" id=\"price-{$type}\" >
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='price' value='1-10' onclick=\"formSubmitById('ads_filter_search_form')\">1 - 10<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='price' value='11-20' onclick=\"formSubmitById('ads_filter_search_form')\">11 - 20<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='price' value='21-30' onclick=\"formSubmitById('ads_filter_search_form')\">21 - 30<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='price' value='31-40' onclick=\"formSubmitById('ads_filter_search_form')\">31 - 40<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='price' value='41-50' onclick=\"formSubmitById('ads_filter_search_form')\">41 - 50<span></span>
                                </label>
                            </li>
                            <li>
                                <label class=\"type-check\">
                                    <input type=\"radio\" name='hourly_price' value='51-more' onclick=\"formSubmitById('ads_filter_search_form')\">More Than 50<span></span>
                                </label>
                            </li>
                        </ul>";
        return $returnHtml;
    }



    public static function getUsersHtml()
    {

        return "<hr>



                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Profile Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Current Plan</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getFooterHtml()
    {
        return "<hr>

<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-schools-general'><a  onclick=\"getSetupsData('schools')\">Schools</a></li>
                        <li id='sub-menu-degrees-general'><a  onclick=\"getSetupsData('degrees')\">Degrees</a></li>
           <li id='sub-menu-job-cat-general'><a  onclick=\"getSetupsData('job_categories')\">Job Categories</a></li>
           <li id='sub-menu-footer'><a  onclick=\"getSetupsData('footer_settings')\"> Footer Settings</a></li>
                    </ul>
<button type=\"button\" class=\"btn btn-primary btn-sm\"   style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#footer_modal\">Add Footer Settings <i class='glyphicon glyphicon-plus'></i></button>
                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Phone # 1</th>
                                    <th>Phone # 2</th>
                                    <th>Email</th>
                                    <th>Copy Right</th>
                                    <th>Facebook </th>
                                    <th>LinkeDin </th>
                                    <th>Google </th>
                                    <th>Twitter </th>
                                    <th>Status </th>                                  
                                    <th>Action </th>
                                    <th>Created At </th>
                                </tr>
                                </thead>
                            </table>

                        ";
    }

    public static function getCompaniesHtml()
    {

        return "
<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-companies-profile'><a  onclick=\"getSetupsData('companies')\">Companies</a></li>
                        <li id='sub-menu-skills-profile'><a  onclick=\"getSetupsData('skills')\">Skills</a></li>
         <li id='sub-menu-countries-profile'><a  onclick=\"getSetupsData('countries')\">Countries</a></li>
                        <li id='sub-menu-languages-profile'><a  onclick=\"getSetupsData('languages')\">Languages</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\"   style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#companyModal\">Add Company <i class='glyphicon glyphicon-plus'></i></button>


                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getSkillsHtml()
    {
        return "
<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-companies-profile'><a  onclick=\"getSetupsData('companies')\">Companies</a></li>
                        <li id='sub-menu-skills-profile'><a  onclick=\"getSetupsData('skills')\">Skills</a></li>
         <li id='sub-menu-countries-profile'><a  onclick=\"getSetupsData('countries')\">Countries</a></li>
                        <li id='sub-menu-languages-profile'><a  onclick=\"getSetupsData('languages')\">Languages</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\"  style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#skillModal\">Add Skill <i class='glyphicon glyphicon-plus'></i></button>


                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getLanguagesHtml()
    {
        return "
<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-companies-profile'><a  onclick=\"getSetupsData('companies')\">Companies</a></li>
                        <li id='sub-menu-skills-profile'><a  onclick=\"getSetupsData('skills')\">Skills</a></li>
         <li id='sub-menu-countries-profile'><a  onclick=\"getSetupsData('countries')\">Countries</a></li>
                        <li id='sub-menu-languages-profile'><a  onclick=\"getSetupsData('languages')\">Languages</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\"  style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#languageModal\">Add Language <i class='glyphicon glyphicon-plus'></i></button>


                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getCountriesHtml()
    {

        return "
<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-companies-profile'><a  onclick=\"getSetupsData('companies')\">Companies</a></li>
                        <li id='sub-menu-skills-profile'><a  onclick=\"getSetupsData('skills')\">Skills</a></li>
         <li id='sub-menu-countries-profile'><a  onclick=\"getSetupsData('countries')\">Countries</a></li>
                        <li id='sub-menu-languages-profile'><a  onclick=\"getSetupsData('languages')\">Languages</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\"  style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#countryModal\">Add Country <i class='glyphicon glyphicon-plus'></i></button>


                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getSchoolsHtml()
    {

        return "

<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-schools-general'><a  onclick=\"getSetupsData('schools')\">Schools</a></li>
                        <li id='sub-menu-degrees-general'><a  onclick=\"getSetupsData('degrees')\">Degrees</a></li>
         <li id='sub-menu-job-cat-general'><a  onclick=\"getSetupsData('job_categories')\">Job Categories</a></li>
         <li id='sub-menu-footer'><a  onclick=\"getSetupsData('footer_settings')\"> Footer Settings</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\" style=\"margin-bottom:20px;margin-top:0px;\" data-toggle=\"modal\" data-target=\"#schoolModal\">Add School <i class='glyphicon glyphicon-plus'></i></button>

                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getDegreesHtml()
    {

        return "

<ul class=\"dropsown_sub_links\" style='margin-top:-12px;'>
                    	<li id='sub-menu-schools-general'><a  onclick=\"getSetupsData('schools')\">Schools</a></li>
                        <li id='sub-menu-degrees-general'><a  onclick=\"getSetupsData('degrees')\">Degrees</a></li>
           <li id='sub-menu-job-cat-general'><a  onclick=\"getSetupsData('job_categories')\">Job Categories</a></li>
           <li id='sub-menu-footer'><a  onclick=\"getSetupsData('footer_settings')\"> Footer Settings</a></li>
                    </ul>
<hr>
<button type=\"button\" class=\"btn btn-primary btn-sm\"  style=\"margin-bottom:20px;margin-top:0px;\"  data-toggle=\"modal\" data-target=\"#degreeModal\">Add Degrees <i class='glyphicon glyphicon-plus'></i></button>

 


                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }

    public static function getCategoriesHtml()
    {
        return "<hr>



                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Image</th>
                                    <th>Name</th>                                   
                                    <th>Status</th>                                 
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }

    public static function getAddsHtml()
    {
        return "<hr>



                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>                                  
                                    <th>Add Image</th>
                                    <th>Title</th>    
                                    <th>Price</th>     
                                      <th>Condition</th>
                                      <th>Categories</th>
                                    <th>Country</th>                                                                                                   
                                    <th>Status</th>                                 
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }


    public static function getServicesHtml()
    {
        return "<hr>



                        <table class=\"table table-bordered\" id=\"setups-table\">
                                <thead>
                                <tr>
                                    <th>Id</th>                                  
                                    <th>Service Image</th>
                                    <th>Title</th>    
                                    <th>Rate</th>                                       
                                     <th>Categories</th>
                                    <th>Country</th>                                                                                                   
                                    <th>Status</th>   
                                    <th>Is Approve</th>   
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                            </table>
                        
                        ";
    }

}
