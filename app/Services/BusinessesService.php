<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Business;
use App\FauJob;
use App\Helpers\ImageHelpers;
use App\Helpers\ReviewHelper;
use App\Helpers\SetupsHelper;
use App\PivotBusinessService;
use App\Rate;
use App\Setting;
use App\Timing;
use Auth;
use App\Category;
use App\Gallery;
use App\Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Collection;


class BusinessesService
{


    private $businessPagination = 5;


    public function unverifiedBusinessDetail($placeId)
    {
        $googleApiAddress = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $placeId . "&key=" . env('GOOGLE_KEY');
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $googleApiAddress);
        $response = json_decode($response->getBody());
        $website = "N/A";
        $openNowStatus = "";
        $weekText = [];
        $phoneNumber = "N/A";

        if (!empty($response->result->website)) {
            $website = $response->result->website;
        }

        if (!empty($response->result->opening_hours)) {

            if (!empty($response->result->opening_hours->open_now)) {
                if ($response->result->opening_hours->open_now == "true") {
                    $openNowStatus = "Open";
                } else {
                    $openNowStatus = "Close";
                }
            }
            $weekText = [];


            if (!empty($response->result->opening_hours->weekday_text)) {
                foreach ($response->result->opening_hours->weekday_text as $week_text) {
                    $weekText[] = $week_text;
                }

            }

        }


        if (!empty($response->result->formatted_phone_number)) {
            $phoneNumber = $response->result->formatted_phone_number;
        }

        $photos = [];
        if (!empty($response->result->photos)) {
            foreach ($response->result->photos as $photo) {
                $photos[] = "https://maps.googleapis.com/maps/api/place/photo?height=" . $photo->height . "&maxwidth=" . $photo->width . "&photoreference=" . $photo->photo_reference . '&key='.env('GOOGLE_KEY');
            }
        }

        $response = [
            "photo" => $photos,
            "lat" => $response->result->geometry->location->lat,
            "location" => $response->result->vicinity,
            "long" => $response->result->geometry->location->lng,
            "website" => $website,
            "name" => $response->result->name,
            "open_status" => $openNowStatus,
            "week_text" => $weekText,
            "rating" => $response->result->rating,
            "phone_number" => $phoneNumber
        ];
//dd($response);
        return $response;
    }


    public function addServices($businessId, $request)
    {
        $forDeleteBusinessService = PivotBusinessService::where('business_id', $businessId)->whereNotIn('service_id', $request->service_id)->get();
        foreach ($forDeleteBusinessService as $deleteService) {
            $deleteService->delete();
        }
        foreach ($request->service_id as $service_id) {
            if (PivotBusinessService::where('business_id', $businessId)->where('service_id', $service_id)->count() == 0) {
                PivotBusinessService::create(["business_id" => $businessId, 'service_id' => $service_id]);
            }
        }

        return 'success';
    }

    public function addJob($businessId, $request)
    {
        $forDeleteBusinessJob = FauJob::where('business_id', $businessId)->where('created_by',Auth::user()->id)->whereNotIn('id', $request->job_id)->get();
        foreach ($forDeleteBusinessJob as $deleteJob) {
            $deleteJob->update(['business_id'=>null]);
        }
        foreach ($request->job_id as $job_id) {
            FauJob::where('id',$job_id)->update(['business_id'=>$businessId]);

        }

        return 'success';
    }


    public function updateDescription($request)
    {
        $business_id = $request->business_id;

        Business::withoutGlobalScopes()->find($business_id)->update(['description'=>$request->description]);

        return 'success';
    }

    public function updatePhone($request)
    {
        $business_id = $request->business_id;

        Business::withoutGlobalScopes()->find($business_id)->update(['phone'=>$request->phone]);

        return 'success';
    }

    public function getAllBusinessDataUser($request){

        $data['all_business'] = Auth::user()->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_pages'] = Auth::user()->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_business_count'] = Auth::user()->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_business'] = $data['all_business']->where('title', 'like', '%' . $request->search . '%');
            $data['total_pages'] = $data['total_pages']->where('title', 'like', '%' . $request->search . '%');
            $data['all_business_count'] = $data['all_business_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_business'] = $data['all_business']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_business_count'] = $data['all_business_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_business'] = $data['all_business']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_pages'] = $data['total_pages']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_business_count'] = $data['all_business_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_business'] = $data['all_business']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_business_count'] = $data['all_business_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_business'] = $data['all_business']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_pages'] = $data['total_pages']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_business_count'] = $data['all_business_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_business'] = $data['all_business']->simplePaginate($this->businessPagination);
        $data['total_pages'] = $data['total_pages']->paginate($this->businessPagination);
        $data['all_business_count'] = $data['all_business_count']->count();

        $request->flash();
        return $data;
    }


    /////////////////                               //////////////
    /// ////////////        AGENT BUSINESSES        /////////////
    ///////////////                                 /////////////
    public function getAllBusinessDataAgentAdmin($request)
    {

        $data['all_business'] = Auth::user()->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc')->simplePaginate($this->businessPagination);
        $data['total_pages'] = Auth::user()->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc')->paginate($this->businessPagination);
        $data['all_business_count'] = Auth::user()->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc')->count();


        $request->flash();
        return $data;
    }

    public function getAllBusinessDataAdmin($request)
    {
        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_business'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "oldest") && ($request->search == "" || !$request->has('search'))) {

            $data['all_business'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_business'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('created_by', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_business'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_business'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "oldest") {

            $data['all_business'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_business'] = Business::withoutGlobalScopes()->orderBy('id', 'asc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->orderBy('id', 'asc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_business'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->count();

        } else {

            $data['all_business'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->simplePaginate($this->businessPagination);
            $data['total_pages'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->paginate($this->businessPagination);
            $data['all_business_count'] = Business::withoutGlobalScopes()->orderBy('id', 'desc')->count();
        }


        $request->flash();
        return $data;
    }


    public function getAllBusinessFront($request)
    {

        $data['all_business'] = Business::activeUserBusinesses();
        $categoryName = null;

        if ($request->filled('near_me')) {
            $data = Self::nearMe($request->near_me, $request->lat, $request->lng);
        }

        if ($request->filled('posted_by_me')) {
            $data = Self::postedByMe($data);
        }

        if ($request->filled('search')) {
            $data = Self::keywordSearch($data, $request);
        }

        if ($request->filled('address')) {
            $data = Self::addressSearch($data, $request);
        }


        if ($request->filled('category_id')) {
            $data = Self::categorySearch($data, $request);
        }

        if ($request->filled('city_id')) {
            $data = Self::citySearch($data, $request);
        }

        if ($request->filled('country_id')) {
            $data = Self::countrySearch($data, $request);
        }

        if ($request->filled('available_now')) {
            $data = Self::availableNow($data);
        }

        if ($request->filled('sort_by')) {
            $data = Self::sortByDate($data, $request);
        }

        if ($request->filled('day_limit')) {
            $data = Self::dayLimit($data, $request);
        }

        if ($request->filled('employee_count')) {
            $data = Self::employeeCountFilter($data, $request);
        }

        if ($request->filled('hourly_price')) {
            $data = Self::hourlyPriceFilter($data, $request);
        }

        if ($request->filled('project_price')) {
            $data = Self::projectPriceFilter($data, $request);
        }


        $data['all_business'] = $data['all_business']->get();

        $businessData = [];

        $resultsData = [];
        if ($request->filled('search_location')) {
            $data['all_business'] = Self::searchLocation($data, $request)['all_business'];

            $resultsData = Self::searchLocation($data, $request)['result_data'];

        }


        $businessData = Self::businessApi($data, $businessData);

        if (count($resultsData) != 0) {
            $businessData = array_merge($businessData, $resultsData);
        }

        if ($request->filled('sort_by')) {
            $businessData = Self::sortByOnApi($businessData, $request);
        }


        $data['all_business'] = (array)$businessData;


        return $data;
    }

    public function approveBusiness($id)
    {
        $business = Business::withoutGlobalScopes()->find($id);
        if ($business->is_approve == 'Not Approve') {
            $business->update(['is_approve' => "Approve"]);
            return;
        }
        if ($business->is_approve == 'Approve') {
            $business->update(['is_approve' => "Not Approve"]);
        }
    }

    public function rejectBusiness($id)
    {
        $business = Business::withoutGlobalScopes()->find($id);
        if ($business->is_approve == 'Not Approve') {
            $business->update(['is_approve' => "Rejected"]);
        }
    }

    public function changeBusinessStatus($id)
    {
        $business = Business::withoutGlobalScopes()->find($id);

        if ($business->is_active == 0) {
            $business->update(['is_active' => 1]);
        } else {
            $business->update(['is_active' => 0]);
        }
    }

    public function approveAllBusiness()
    {
        $data['business'] = Business::withoutGlobalScopes()->where('is_approve', 'Not Approve')->update(['is_approve' => 'Approve']);


    }


    public function postBusiness($request, $flag)
    {
//        dd($request->monday['day_category']);

        //dd($request);
        if (!$request->filled('front')) {
            $address = trim($request->address);
            $googleApiAddress = "https://maps.googleapis.com/maps/api/geocode/json?key=".env('GOOGLE_KEY')."&address=$address";
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', $googleApiAddress);
            $response = json_decode($response->getBody());

            if ($response->status == 'ZERO_RESULTS') {
                throw new Exception('Enter Correct Address');
            }

            $lat = $response->results[0]->geometry->location->lat;
            $lng = $response->results[0]->geometry->location->lng;
        } else {
            $lat = $request->lat;
            $lng = $request->lng;
        }


        $fileName = time() . "-" . $request->title . ".png";
        ImageHelpers::updateProfileImage('project-assets/images/business', $request->file('profile_image'), $fileName);

        $setting = Setting::where('is_business', '=', 1)->where('is_active', '=', 1)->first();

        if ($flag == "agent") {
            if (isset($request->user_checkbox)) {
                if ($setting) {
                    $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName, 'is_approve' => 'Approve']));
                } else {
                    $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName]));
                }
            } else {
                if ($setting) {
                    $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName, 'is_approve' => 'Approve', 'created_by' => Auth::user()->id]));
                } else {
                    $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName, 'created_by' => Auth::user()->id]));
                }

            }

        } else if ($flag == "admin") {
            $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName, 'is_approve' => 'Approve', 'agent_admin_id' => Auth::user()->id]));
        } else {//dd(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'created_by' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName]));
            $business = Business::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'created_by' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName]));
        }


        foreach ($request->gallery_images as $image) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";
            ImageHelpers::updateProfileImage('project-assets/images/business/', $image, $fileName);
            Gallery::create(['name' => 'project-assets/images/business/' . $fileName, 'business_id' => $business->id]);
        }

        $business->categories()->attach($request->category_id);

        if ($flag == 'agent') {
            foreach ($request->timing['day'] as $key => $time) {
                if ($request->timing['day_category'][$key] == 'enter_time') {
                    Timing::create([
                        'business_id' => $business->id,
                        'day' => $time,
                        '_from' => Carbon::parse($request->timing['_from'][$key])->format('H:i:s'),
                        '_to' => Carbon::parse($request->timing['_to'][$key])->format('H:i:s')
                    ]);
                } elseif ($request->timing['day_category'][$key] == 'open_day') {
                    Timing::create([
                        'business_id' => $business->id,
                        'day' => $time,
                        '_from' => 'Open',
                        '_to' => 'Open'
                    ]);
                } elseif ($request->timing['day_category'][$key] == 'close_day') {
                    Timing::create([
                        'business_id' => $business->id,
                        'day' => $time,
                        '_from' => 'Closed',
                        '_to' => 'Closed'
                    ]);
                } else {

                }
            }

        } else {
            if ($request->monday) {

                if (!empty($request->monday['day_category'])) {
                    if ($request->monday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->monday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->monday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->monday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->monday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->monday['day'],
                            '_from' => $request->monday['_from'],
                            '_to' => $request->monday['_to']
                        ]);
                    } else {

                    }
                }

            }

            if ($request->tuesday) {

                if (!empty($request->tuesday['day_category'])) {
                    if ($request->tuesday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->tuesday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->tuesday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->tuesday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->tuesday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->tuesday['day'],
                            '_from' => Carbon::parse($request->tuesday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->tuesday['_to'])->format('H:i:s')
                        ]);
                    } else {

                    }

                }

            }

            if ($request->wednesday) {
                if (!empty($request->wednesday['day_category'])) {
                    if ($request->wednesday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->wednesday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->wednesday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->wednesday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->wednesday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->wednesday['day'],
                            '_from' => Carbon::parse($request->wednesday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->wednesday['_to'])->format('H:i:s')
                        ]);
                    } else {
                    }
                }

            }

            if ($request->thursday) {
                if (!empty($request->thursday['day_category'])) {
                    if ($request->thursday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->thursday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->thursday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->thursday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->thursday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->thursday['day'],
                            '_from' => Carbon::parse($request->thursday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->thursday['_to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }
            }

            if ($request->friday) {
                if (!empty($request->friday['day_category'])) {
                    if ($request->friday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->friday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->friday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->friday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->friday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->friday['day'],
                            '_from' => Carbon::parse($request->friday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->friday['_to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }


            }

            if ($request->saturday) {
                if (!empty($request->saturday['day_category'])) {
                    if ($request->saturday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->saturday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->saturday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->saturday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->saturday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->saturday['day'],
                            '_from' => Carbon::parse($request->saturday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->saturday['_to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }

            }

            if ($request->sunday) {
                if (!empty($request->sunday['day_category'])) {
                    if ($request->sunday['day_category'] == 'close_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->sunday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->sunday['day_category'] == 'open_day') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->sunday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->sunday['day_category'] == 'enter_time') {
                        Timing::create([
                            'business_id' => $business->id,
                            'day' => $request->sunday['day'],
                            '_from' => Carbon::parse($request->sunday['_from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->sunday['_to'])->format('H:i:s')
                        ]);
                    } else {

                    }

                }
            }
        }


        Address::create([

            'business_id' => $business->id,
            'main_country_id' => $request->main_country_id,
            'main_state_id' => $request->main_state_id,
            'main_city_id' => $request->main_city_id,
            'address' => $request->address
        ]);


        if (isset($request->hourly_price) && $request->hourly_price != '') {
            Rate::create([
                'price_type' => 'Hourly Base',
                'rate' => $request->hourly_price,
                'business_id' => $business->id,
            ]);
        }

        if (isset($request->project_price) && $request->project_price != '') {
            Rate::create([
                'price_type' => 'Project Base',
                'rate' => $request->project_price,
                'business_id' => $business->id,
            ]);
        }

    }


//--------------------- get user business ----------------------------//
    public function getAllBusinessDataUserAdmin($user, $request)
    {

        if ($user->role->name == 'Agent') {
            $data['all_business'] = $user->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc');
            $data['total_pages'] = $user->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc');
            $data['all_business_count'] = $user->agentAdminBusinesses()->withoutGlobalScopes()->orderBy('id', 'desc');
        } else {
            $data['all_business'] = $user->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');
            $data['total_pages'] = $user->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');
            $data['all_business_count'] = $user->businesses()->withoutGlobalScopes()->orderBy('id', 'desc');
        }


        if ($request->filled('search')) {
            $data['all_business'] = $user->where('title', 'like', '%' . $request->search . '%');
            $data['total_pages'] = $user->where('title', 'like', '%' . $request->search . '%');
            $data['all_business_count'] = $user->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_business'] = $user->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_pages'] = $user->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_business_count'] = $user->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_business'] = $user->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_pages'] = $user->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_business_count'] = $user->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_business'] = $user->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_pages'] = $user->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_business_count'] = $user->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_business'] = $user->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_pages'] = $user->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_business_count'] = $user->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_business'] = $data['all_business']->simplePaginate($this->businessPagination);
        $data['total_pages'] = $data['total_pages']->paginate($this->businessPagination);
        $data['all_business_count'] = $data['all_business_count']->count();

        $request->flash();
        return $data;
    }


    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


    ///////////             FUNCTION HELPERS


    public function availableNow($data)
    {
        $data['all_business'] = $data['all_business']->whereHas('timings', function ($query) {
            $query->where([
                ['day', '=', Carbon::today()->format('l')],
                ['_from', '=', 'Open']
            ])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));

        });

        $data['all_business'] = $data['all_business']->whereHas('timings', function ($query) {
            $query->where([['day', '=', Carbon::today()->format('l')], ['_from', '=', 'Open']])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));
        });


        return $data;
    }

    public static function sortByDate($data, $request)
    {
        if ($request->sort_by == 'newer') {
            $data['all_business'] = $data['all_business']->withoutGlobalScopes()->latest("id");
        }
        if ($request->sort_by == 'older') {
            $data['all_business'] = $data['all_business']->withoutGlobalScopes()->oldest("id");
        }
        return $data;
    }

    public static function sortByOnApi($businessData, $request)
    {
        if ($request->sort_by == 'a-z') {
            return SetupsHelper::sortArrayAsc($businessData);
        }
        if ($request->sort_by == 'z-a') {
            return SetupsHelper::sortArrayDesc($businessData);
        }
        return $businessData;
    }

    public static function businessApi($data, $businessData)
    {
        foreach ($data['all_business'] as $business) {

            $approveHtml = '';
            $rateeHtml = '0.0';

            if ($business->is_approve == "Approve") {
                $approveHtml = 'Approved';
            } else {
                $approveHtml = 'Not Approve';
            }

            $rate = $business->rates->where('price_type', 'Hourly Base')->first();
            if ($rate) {
                $rateeHtml = "<i class='fas fa-dollar-sign'></i> $rate->rate  / h";
            }
            $priceType = ``;
            foreach ($business->rates as $rate) {
                $priceType = '<div > Houry price ' . $rate->rate . '</div >';
            }
            if ($rate->price_type == "Project Base") {
                $priceType = '<div> Project price ' . $rate->rate . '</div >';
            }

            $website = "N/A";
            if (!empty($business->website_url)) {
                $website = $business->website_url;
            }


            if (!empty($business->founded_in)) {
                $foundedIn = $business->founded_in;
            } else {
                $foundedIn = "N/A";
            }

            if ($business->created_by_status == "Posted By Me") {
                $createdByStatus = '<span class="badge" style="float:right; background-color: #fb397d !important;"> Posted By Me</span>';
            }else{
                $createdByStatus = "";
            }


            $tagsService = "<div class=\"work-links-div3\">";

            foreach($business->tags as $tag){
                $tagsService = $tagsService."<a href=\"javascript: void(0)\">".$tag->name."</a>";
            }
            $tagsService = $tagsService."</div>";
            $businessData[] = [
                'tags_html' => $tagsService,
                'created_by_status_html' => $createdByStatus,
                'employees' => $business->employeeCount->name,
                'founded_in' => $foundedIn,
                'services' => $business->services()->count() . " services",
                'verified' => true,
                'website' => $website,
                'phone' => $business->phone,
                'email' => $business->email,
                'stars' => ReviewHelper::reviewStars($business),
                'business_id' => $business->id,
                'title' => $business->title,
                'price_type' => $priceType,
                'email' => $business->email,
                'phone' => $business->phone,
                'is_active' => $business->is_active,
                'created_by' => $business->created_by,
                'agent_admin_id' => $business->agent_admin_id,
                'profile_image' => $business->profile_image,
                'is_approve' => $business->is_approve,
                'description' => $business->description,
                'twitter_url' => $business->twitter_url,
                'gmail_url' => $business->gmail_url,
                'facebook_url' => $business->facebook_url,
                'lat' => $business->lat,
                'long' => $business->long,
                'country_url' => route('user.front-business', ['country_id' => $business->address->main_country_id]),
                'city_url' => route('user.front-business', ['city_id' => $business->address->main_city_id]),
                'country_name' => $business->address->country->name,
                'city_name' => $business->address->city->name,
                'reviews_avg' => number_format($business->reviews()->avg('rating'), 1),
                'approve_html' => $approveHtml,
                'rate_html' => $rateeHtml,
                'timing_status' => $business->TimingStatus,
                'business_detail_url' => route('front-business.detail', [$business->id]),
                'stars_html' => \App\Helpers\ReviewHelper::reviewStars($business)
            ];
        }


        return $businessData;
    }

    public static function searchLocation($data, $request)
    {
        $resultsData = [];
        $googleApiAddress = "https://maps.googleapis.com/maps/api/geocode/json?key=" . env('GOOGLE_KEY') . "&address=" . $request->search_location;
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $googleApiAddress);
        $response = json_decode($response->getBody());

        if ($response->status == 'OK') {

            if ($request->filled('category_id')) {
                $keyword = Category::find($request->category_id)->name;
            } else {
                $keyword = "Resturent";
            }

            $data['all_business'] = $data['all_business']->where('lat', $response->results[0]->geometry->location->lat)->where('long', $response->results[0]->geometry->location->lng);

            $googleNearBy = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?radius=2000&keyword=" . $keyword . "&location=" . $response->results[0]->geometry->location->lat . "," . $response->results[0]->geometry->location->lng . "&key=" . env('GOOGLE_KEY');


            $clientNearBy = new \GuzzleHttp\Client();

            $response = $clientNearBy->request('GET', $googleNearBy);

            $response = json_decode($response->getBody());

            if (count($response->results) != 0) {
                foreach ($response->results as $nearBy) {
                    $openingHours = '';
                    $approveHtml = 'Not Approved';
                    $rateeHtml = 'Not Verified';
                    $priceType = "Not Verified";
                    $photos = "";

                    if (!empty($nearBy->photos)) {
                        $photos = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=" . $nearBy->photos[0]->photo_reference . '&key='.env('GOOGLE_KEY');
                    } else {
                        $photos = "https://ksr-ugc.imgix.net/assets/012/314/182/46df2b71877ac0fe26efbbc3d406667e_original.jpg?ixlib=rb-1.1.0&crop=faces&w=1552&h=873&fit=crop&v=1463755491&auto=format&frame=1&q=92&s=88993dfc60d93297e19de2071344c377";
                    }


                    if (!empty($nearBy->opening_hours)) {
                        if (!empty($nearBy->opening_hours->open_now)) {
                            if ($nearBy->opening_hours->open_now == true) {
                                $openingHours = 'Open';
                            } else {
                                $openingHours = 'Close';
                            }
                        } else {
                            $openingHours = "NA";
                        }

                    } else {
                        $openingHours = "NA";
                    }
                    $website = "N/A";
                    $foundedIn = "N/A";

                    $resultsData[] = [
                        'created_by_status_html' => 'No By Me',
                        'phone' => 'N/A',
                        'email' => 'N/A',
                        'services' => '0 Services',
                        'founded_in' => $foundedIn,
                        'employees' => '0 employees',
                        'lat' => $nearBy->geometry->location->lat,
                        'long' => $nearBy->geometry->location->lng,
                        'verified' => false,
                        'website' => $website,
                        'stars' => ReviewHelper::reviewStars($nearBy->rating, 'unverified'),
                        'business_id' => $nearBy->place_id,
                        'title' => $nearBy->name,
                        'price_type' => $priceType,
                        'profile_image' => $photos,
                        'is_approve' => 'Not Approve',
                        'description' => '....',
                        'location' => $nearBy->vicinity,
                        'location_url' => route('user.front-business', ['search_location' => $nearBy->vicinity]),
                        'reviews_avg' => $nearBy->rating,
                        'approve_html' => $approveHtml,
                        'rate_html' => $rateeHtml,
                        'timing_status' => $openingHours,
                        'business_detail_url' => route('user.front-business.detail-unverified', ['placeId' => $nearBy->place_id]),
                        'stars_html' => ReviewHelper::reviewStars($nearBy->rating, 'unverified')
                    ];
                }

            }


        }

        return ['all_business' => $data['all_business'], 'result_data' => $resultsData];
    }

    public function countrySearch($data, $request)
    {
        $countryId = $request->country_id;
        $data['all_business'] = $data['all_business']->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });
        return $data;
    }

    public function citySearch($data, $request)
    {
        $cityId = $request->city_id;
        $data['all_business'] = $data['all_business']->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });
        return $data;
    }

    public static function categorySearch($data, $request)
    {
        $categoryId = $request->category_id;
        $data['all_business'] = $data['all_business']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->whereIn('category_id', $categoryId);
        });
        return $data;
    }

    public static function addressSearch($data, $request)
    {
        $address = $request->address;
        $data['all_business'] = $data['all_business']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });
        return $data;
    }


    public static function keywordSearch($data, $request)
    {
        $data['all_business'] = $data['all_business']->where('title', 'like', '%' . $request->search . '%');
        return $data;
    }

    public static function postedByMe($data)
    {
        $data['all_business'] = $data['all_business']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);

        return $data;
    }

    public static function nearMe($radius, $lat, $lng)
    {
        $lat = $lat;
        $lng = $lng;

        $data['all_business'] = Business::select('businesses.*', DB::raw('( 6371 * acos( cos( radians(' . $lat . ') )
						* cos( radians( businesses.lat ) ) * cos( radians( businesses.long ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * 
						sin( radians( businesses.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < ' . ($radius + 1))->orderBy('distance', 'asc');


        return $data;
    }

    public static function dayLimit($data, $request)
    {
        $dayLimit = Carbon::today()->subDays($request->day_limit);
        $data['all_business'] = $data['all_business']->withoutGlobalScopes()->where("created_at", ">=", $dayLimit);
        return $data;
    }

    public static function employeeCountFilter($data, $request)
    {
        $data['all_business'] = $data['all_business']->withoutGlobalScopes()->where("employee_count_id", "=", $request->employee_count);
        return $data;
    }

    public static function hourlyPriceFilter($data, $request)
    {
        $reqVal = explode("-", $request->hourly_price);
        $minVal = $reqVal[0];
        $maxVal = $reqVal[1];
        $data['all_business'] = $data['all_business']->withoutGlobalScopes()->whereHas('rates', function ($query) use ($minVal, $maxVal) {
            $query->where('price_type', '=', 'Hourly Base');
            $query->where('rate', '>=', $minVal);
            if ($maxVal != "more") {
                $query->where('rate', '<=', $maxVal);
            }
        });
        return $data;
    }

    public static function projectPriceFilter($data, $request)
    {
        $reqVal = explode("-", $request->project_price);
        $minVal = $reqVal[0];
        $maxVal = $reqVal[1];
        $data['all_business'] = $data['all_business']->withoutGlobalScopes()->whereHas('rates', function ($query) use ($minVal, $maxVal) {
            $query->where('price_type', '=', 'Project Base');
            $query->where('rate', '>=', $minVal);
            if ($maxVal != "more") {
                $query->where('rate', '<=', $maxVal);
            }
        });
        return $data;
    }

}
