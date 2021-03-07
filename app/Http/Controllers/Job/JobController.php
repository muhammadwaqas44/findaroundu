<?php

namespace App\Http\Controllers\Job;

use App\Business;
use App\Category;
use App\FauJob;
use App\FauRequestQuote;
use App\FauRequestQuoteAttachment;
use App\FauTag;
use App\Helpers\ImageHelpers;
use App\InventoryPackingUnit;
use App\MainCountry;
use App\Services\AddressService;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
use App\Services\JobsService;
use App\Services\ReviewService;
use App\Tag;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function index(Request $request, JobsService $jobsService)
    {
        if ($request->category_id == 'Professionals') {
            if ($request->filled('location')) {
                return redirect()->route('user.front-services');
            } else {
                return redirect()->route('user.front-services', ['location' => $request->location]);
            }
        } else if ($request->category_id == 'Adds') {
            if ($request->filled('location')) {
                return redirect()->route('user.front-adds');
            } else {
                return redirect()->route('user.front-adds', ['location' => $request->location]);
            }
        }

        if ($request->posted_by_me == "me") {
            $data['all_jobs'] = $jobsService->getAllJobs($request);
        } else {
            $data['all_jobs'] = $jobsService->getAllJobs($request);
            $data['latest_jobs'] = FauJob::all()->sortByDesc('id')->take(5);
        }

        $data['professionals'] = Category::Individual()->whereNull('parent_id')->get();

        return view('User.Jobs.job-listing', compact('data'));
    }


//    public function viewAdds (Request $request, AddsService $addsService)
//    {
//        if($request->category_id == 'Professionals'){
//            if($request->filled('location')){
//                return redirect()->route('user.front-services');
//            }else{
//                return redirect()->route('user.front-services',['location' => $request->location]);
//            }
//        }else if($request->category_id == 'Adds'){
//            if($request->filled('location')){
//                return redirect()->route('user.front-adds');
//            }else{
//                return redirect()->route('user.front-adds',['location' => $request->location]);
//            }
//        }
//
//        if($request->posted_by_me == "me") {
//            $data['all_adds'] = $addsService->getAllAddsFront($request);
//        }else{
//            $data['all_adds'] = $addsService->getAllAddsFront($request);
//            $data['latest_adds']= Add::all()->sortByDesc('id')->take(5);
//        }
//
//        $data['professionals'] = Category::Individual()->whereNull('parent_id')->get();
//        /* $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);
//         $data['flag'] = 'Add';
//         $data['reviews'] = $data['add_detail']->reviews();
//         $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null);*/
//        return view('User.Adds.front-adds-listing',compact('data'));
//    }


    //

    public function getTag($id)
    {
        $category = Category::find($id);


        if($category)
        {
            $data['tags'] =  $category->tags;


            return response()->json(['data' => $data['tags']]);
        }
    }

    public function getCateTag(Request $request)
    {
        $categories = $request->categories;

        $tags = FauTag::with('categories')->wherehas('categories', function ($query) use ($categories) {

            $query->whereIn('category_id', $categories);
        })->get();




        if($tags->count() > 0)
        {
            $data['tags'] =  $tags;


            return response()->json(['data' => $data['tags']]);
        }
    }


    public function getSelecetdCateTag(Request $request)
    {
        $categories = $request->categories;

        $tags = FauTag::with('categories')->wherehas('categories', function ($query) use ($categories) {

            $query->whereIn('category_id', $categories);
        })->get();
        //
        $result = [];
        $business = Business::withoutGlobalScope(ActiveScope::Class)->withoutGlobalScope(IsApproveScope::Class)->find($request->business_id);


        $noIncludeVal = FauTag::with('categories')->wherehas('categories', function ($query) use ($categories) {

            $query->whereIn('category_id', $categories);
        })->pluck('id')->toArray();



        foreach ($business->tags()->whereNotIn('fau_tag_id',$noIncludeVal)->get() as $selectedTag) {
            $result[] = ['id' => $selectedTag->id, "name" => $selectedTag->name, 'selected' => true];
        }

        foreach ($tags as $tag) {
            if ($business->tags()->where('fau_tag_id', $tag->id)->get()->count() > 0) {
                $result[] = ['id' => $tag->id, "name" => $tag->name, 'selected' => true];
            }else{
                $result[] = ['id' => $tag->id, "name" => $tag->name, 'selected' => false];
            }

        }


        if ($tags->count() > 0) {
            $data['tags'] = $tags;

            return response()->json(['data' => $result]);
        }
    }


    public function getInventoryUnit()
    {
        $data['getInventoryUnit'] = InventoryPackingUnit::all();

        return response()->json(['data' => $data['getInventoryUnit']]);
    }

    public function getSubCategory($id)
    {

        $data['subCategory'] = Category::where('parent_id', '=', $id)->get();

        return response()->json(['data' => $data['subCategory']]);

    }

    public function createJob(Request $request)
    {
        $fileName = '';
        $fileNameUpload = '';
        if ($request->video != '') {
            $fileName = $request->video->getClientOriginalName();

            $fileNameUpload = time() . "-" . $fileName;

            $path = public_path('project-assets/video/fau_job/');
            if (!file_exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            ImageHelpers::uploadVideo('project-assets/video/fau_job/', $request->video, $fileNameUpload);

        }

        $pathSave = '';
        if ($request->audio != '') {
            $audioFile = $request->audio;

            $string = str_random(15);

            $path = public_path('project-assets/audio/fau_job/');

            if (!file_exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $audioFileStr = str_replace('data:audio/mp3;base64,', '', $audioFile);

            $pathSave = public_path('project-assets/audio/fau_job/' . $string . '.mp3');

            file_put_contents($pathSave, base64_decode($audioFileStr));

        }
        if ($request->type == 'online') {
            $job = FauJob::create($request->except('tags', 'task_name', 'video', 'audio', 'category_id', 'city', 'date', 'location', 'lat', 'lng') + ['task' => $request->task_name, 'video' => 'project-assets/video/fau_job/' . $fileNameUpload, 'audio' => $pathSave, 'created_by' => Auth::user()->id, 'date' => Carbon::parse($request->date)->format('Y-m-d')]);
        } else {
            $job = FauJob::create($request->except('tags', 'task_name', 'video', 'audio', 'category_id', 'city', 'date') + ['task' => $request->task_name, 'video' => 'project-assets/video/fau_job/' . $fileNameUpload, 'audio' => $pathSave, 'created_by' => Auth::user()->id, 'city_id' => $request->city, 'date' => Carbon::parse($request->date)->format('Y-m-d')]);
        }

        $job->fauTags()->attach($request->tags);

        $job->categories()->attach($request->category_id);

        return response()->json(['result' => 'success', 'message' => 'Job Done Successful']);
    }

    public function changeCountry(Request $request, AddressService $addressService)
    {
        $countryId = $request->country_id;

        $country = MainCountry::find($countryId);

        if ($country) {
            $city_record = $addressService->getCitiesCountryWise($countryId);

            if (sizeof($city_record) > 0) {
                $cityId = $city_record->pluck('city_id')->first(); //Lahore default id
                $cityName = $city_record->first()->cities->name;
            } else {
                $city_record = $addressService->getCitiesOfCountry($countryId);

                $cityId = $city_record->pluck('id')->first();
                $cityName = $city_record->pluck('name')->first();
            }


            $data['countryId'] = $country->id;
            $data['cityId'] = $cityId;
            $data['city'] = $cityName;
            $data['country'] = $country->name;
            $data['countryFlag'] = $country->flag;
            $data['countryCode'] = $country->country_code;

            $request->session()->put('location', $data);

            return response()->json(['result' => 'success', 'message' => 'Session set successfully.']);
        } else {
            return response()->json(['result' => 'success', 'message' => 'This country does not exist in our system.']);
        }
    }

    public function createQuote(Request $request)
    {
        $quote = FauRequestQuote::create($request->except('attachment') + ['created_by' => Auth::user()->id]);
        if ($request->attachment != '') {
            foreach ($request->attachment as $key => $item) {
                $ext = $item->getClientOriginalExtension();
                $fileName = $item->getClientOriginalName();


                if ($ext == 'png' | $ext == 'jpg') {
                    $fileNameUpload = time() . "-" . $fileName;

                    $path = public_path('project-assets/images/request-quote/' . $quote->id . '/');
                    if (!file_exists($path)) {
                        File::makeDirectory($path, 0777, true);
                    }

                    ImageHelpers::updateProfileImage('project-assets/images/request-quote/' . $quote->id . '/', $item, $fileNameUpload);
                    $type = 'Image';
                    FauRequestQuoteAttachment::create($request->except('attachment', '_token', 'title', 'quantity', 'inventory_packing_unit_id', 'description', 'category_id', 'sub_category_id', 'currency_id') + ['fau_request_quotes_id' => $quote->id, 'attachments' => 'project-assets/images/request-quote/' . $quote->id . '/' . $fileNameUpload]);

                } else {
                    $fileNameUpload = time() . "-" . $fileName;

                    $path = public_path('project-assets/images/request-quote/' . $quote->id . '/');
                    if (!file_exists($path)) {
                        File::makeDirectory($path, 0777, true);
                    }

                    ImageHelpers::uploadFile('project-assets/images/request-quote/' . $quote->id . '/', $item, $fileNameUpload);
                    $type = 'File';

                    FauRequestQuoteAttachment::create($request->except('attachment', '_token', 'title', 'inventory_packing_unit_id', 'quantity', 'description', 'category_id', 'sub_category_id', 'currency_id')
                        + ['attachments' => 'project-assets/images/request-quote/' . $quote->id . '/' . $fileNameUpload, 'fau_request_quotes_id' => $quote->id]);

                }
            }
        }

        return response()->json(['result' => 'success', 'message' => 'Record inserted successfully.']);
    }


    public function jobsData(Request $request, JobsService $jobsService)
    {
        return $jobsService->getAllJobs($request);
    }

    public function jobDetail(Request $request, $id, ReviewService $reviewService)
    {
        $data['job_detail'] = FauJob::find($id);
        $data['flag'] = 'Add';
        $data['reviews'] = $data['job_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, null, null, $id);

        return view('User.Jobs.job-detail', compact('data'));
    }

}
