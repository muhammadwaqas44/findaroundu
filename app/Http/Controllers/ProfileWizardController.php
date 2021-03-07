<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Helpers\ImageHelpers;
use App\MainCity;
use App\MainState;
use App\PivotCategoriesAddsBusinessService;
use App\PivotCategoryCountry;
use App\Service;
use App\Timing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileWizardController extends Controller
{
    //
    public function showForm(Request $request)
    {
        $data['category'] = Category::Professional()->whereNULL('parent_id')->get();

        $countryId = Session::get('location')['countryId'];
        $states = MainState::where('country_id', $countryId)->pluck('id');
        $data['city'] = MainCity::whereIn('state_id', $states)->select('id', 'name')->get();

        return view('ProfileWizard.profile-wizard',compact('data'));
    }

    public function saveProfileWizardForm(Request $request)
    {

        foreach($request->category as $key => $category)
        {

            if($request->profile_image[$key]) {

                $fileName = time() . "-" . 'service_image' . ".png";
                ImageHelpers::updateProfileImage('project-assets/images/services', $request->profile_image[$key], $fileName);

            }

            $service = Service::create(
                    ['description'=>$request->description[$key],'lat'=>$request->lat[$key],'long'=>$request->lng{$key},
                    'facebook_url'=>$request->facebook[$key],'instagram_url'=>$request->instagram[$key],
                    'google_url'=>$request->google[$key],'pinterest_url'=>$request->pinterest[$key],
                    'linkedin_url'=>$request->linkedin[$key],'youtube_url'=>$request->youtube[$key],
                    'skills_id'=>$request->skill[$key],'hourly_price'=>$request->hourly_price[$key],
                    'project_price'=>$request->project_price[$key],'lat'=>$request->lat[$key],'long'=>$request->lng[$key],
                    'profile_image'=>'project-assets/images/services/'.$fileName,'email'=>$request->email[$key],
                    'phone'=>$request->phone[$key], 'created_by'=>Auth::user()->id
                    ]);

            $service->categories()->attach(['category_id'=>isset($category[$key]) ? $category[$key]:null]);


            Address::create([
                'service_id' => $service->id,
                'main_country_id' => Session::get('location.countryId'),
                'main_city_id' => $request->city_id[$key],
                'address' => $request->location[$key]
            ]);

            if(isset($request->monday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->monday_from[$key] != 'null' && $request->monday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->monday_to[$key],'_from'=>$request->monday_from[$key],'service_id'=>$service->id]);
            }

            if(isset($request->tuesday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->tuesday_from[$key] != 'null' && $request->tuesday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->tuesday_to[$key],'_from'=>$request->tuesday_from[$key],'service_id'=>$service->id]);
            }


            if(isset($request->wednesday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }

            elseif($request->wednesday_from[$key] != 'null' && $request->wednesday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->wednesday_to[$key],'_from'=>$request->wednesday_from[$key],'service_id'=>$service->id]);
            }


            if(isset($request->thursday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->thursday_from[$key] != 'null' && $request->thursday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->thursday_to[$key],'_from'=>$request->thursday_from[$key],'service_id'=>$service->id]);
            }

            if(isset($request->friday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->friday_from[$key] != 'null' && $request->friday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->friday_to[$key],'_from'=>$request->friday_from[$key],'service_id'=>$service->id]);
            }

            if(isset($request->saturday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->saturday_from[$key] != 'null' && $request->saturday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->saturday_to[$key],'_from'=>$request->saturday_from[$key],'service_id'=>$service->id]);
            }

            if(isset($request->sunday_checkbox[$key]) == 'close')
            {
                Timing::create(['_to'=>'close','_from'=>'close','service_id'=>$service->id]);
            }
            elseif($request->sunday_from[$key] != 'null' && $request->sunday_to[$key]!= null)
            {
                Timing::create(['_to'=>$request->sunday_to[$key],'_from'=>$request->sunday_from[$key],'service_id'=>$service->id]);
            }

            $service->tags()->attach(['fau_tag_id'=>isset($request->tag_id[$key]) ? $request->tag_id[$key]:null]);

            $user = User::find(Auth::user()->id);
            $user->profile_complete = 1;
            $user->save();

        }

        return redirect()->route('home');
    }
}
