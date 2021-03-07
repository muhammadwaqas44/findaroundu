<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Address;
use App\Rate;
use App\Service;
use App\Gallery;
use App\Helpers\ImageHelpers;
use App\Setting;
use App\Timing;
use Exception;
use Auth;
use App\Category;
use Carbon\Carbon;

use App\Helpers\ReviewHelper;

use Illuminate\Support\Facades\DB;

class ServicesService
{

    private $servicePagination = 5;


    public function unverifiedServiceDetail($placeId)
    {


        $googleApiAddress = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $placeId . "&key=" . env('GOOGLE_KEY');
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $googleApiAddress);
        $response = json_decode($response->getBody());
        $website = "N/A";
        $openNowStatus = "";
        $weekText = "";
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
                $photos[] = "https://maps.googleapis.com/maps/api/place/photo?height=".$photo->height."&maxwidth=". $photo->width."&photoreference=" . $photo->photo_reference . '&key='.env('GOOGLE_KEY');
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
            "phone_number" =>$phoneNumber
        ];

        return $response;
    }

    public function getAllServicesDataUser($request)
    {

        $data['all_services'] = Auth::user()->services()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_services'] = Auth::user()->services()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_services_count'] = Auth::user()->services()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_services'] = $data['all_services']->where('title', 'like', '%' . $request->search . '%');
            $data['total_services'] = $data['total_services']->where('title', 'like', '%' . $request->search . '%');
            $data['all_services_count'] = $data['all_services_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_services'] = $data['all_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_services'] = $data['all_services']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_services'] = $data['all_services']->simplePaginate($this->servicePagination);
        $data['total_services'] = $data['total_services']->paginate($this->servicePagination);
        $data['all_services_count'] = $data['all_services_count']->count();


        $request->flash();
        return $data;
    }

    public function getAllServicesDataAdmin($request)
    {
        $data['all_services'] = Service::withoutGlobalScopes();
        $data['total_services'] = Service::withoutGlobalScopes();
        $data['all_services_count'] = Service::withoutGlobalScopes();


        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {
            $data['all_services'] = Service::withoutGlobalScopes();
            $data['total_services'] = Service::withoutGlobalScopes();
            $data['all_services_count'] = Service::withoutGlobalScopes();
        }


        if ($request->filled('user_id')) {
            $data['all_services'] = $data['all_services']->where('created_by', $request->user_id)->orWhere('agent_admin_id', $request->user_id);
            $data['total_services'] = $data['total_services']->where('created_by', $request->user_id)->orWhere('agent_admin_id', $request->user_id);
            $data['all_services_count'] = $data['all_services_count']->where('created_by', $request->user_id)->orWhere('agent_admin_id', $request->user_id);
        }


        $data['all_services'] = $data['all_services']->orderBy('id', 'desc')->simplePaginate($this->servicePagination);
        $data['total_services'] = $data['total_services']->orderBy('id', 'desc')->paginate($this->servicePagination);
        $data['all_services_count'] = $data['all_services_count']->orderBy('id', 'desc')->count();

        $request->flash();

        return $data;
    }


    public function getAllServicesDataAgentAdmin($request)
    {
        $data['all_services'] = Auth::user()->agentAdminServices()->withoutGlobalScopes()->orderBy('id', 'desc')->simplePaginate($this->servicePagination);
        $data['total_services'] = Auth::user()->agentAdminServices()->withoutGlobalScopes()->orderBy('id', 'desc')->paginate($this->servicePagination);
        $data['all_services_count'] = Auth::user()->agentAdminServices()->withoutGlobalScopes()->orderBy('id', 'desc')->count();


        $request->flash();
        return $data;
    }

    public function getAllServicesFront($request)
    {


        $data['all_services'] = Service::activeUserServices()->orderBy('id', 'desc');
        $data['total_services'] = Service::activeUserServices()->orderBy('id', 'desc');
        $data['all_services_count'] = Service::activeUserServices()->orderBy('id', 'desc');



        if ($request->filled('near_me')) {
            $data = Self::nearMe();
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


        $data['all_services'] = $data['all_services']->get();

        $serviceData = [];

        $resultsData = [];
        if ($request->filled('search_location')) {
            $data['all_services'] = Self::searchLocation($data, $request)['all_services'];

            $resultsData = Self::searchLocation($data, $request)['result_data'];

        }


        $serviceData = Self::serviceApi($data, $serviceData);

        if (count($resultsData) != 0) {
            $serviceData = array_merge($serviceData, $resultsData);
        }

        if ($request->filled('sort_by')) {
            $serviceData = Self::sortByOnApi($serviceData, $request);
        }



        $data['all_services'] = $serviceData;



        return $data;

    }

    public function approveServiceStatus($id)
    {
        $service = Service::withoutGlobalScopes()->find($id);
        if ($service->is_approve == 'Not Approve') {
            $service->update(['is_approve' => "Approve"]);
            return;
        }
        if ($service->is_approve == 'Approve') {
            $service->update(['is_approve' => "Not Approve"]);
        }
    }

    public function rejectService($id)
    {
        $service = Service::withoutGlobalScopes()->find($id);
        if ($service->is_approve == 'Not Approve') {
            $service->update(['is_approve' => "Rejected"]);
        }
    }

    public function changeServiceStatus($id)
    {
        $service = Service::withoutGlobalScopes()->find($id);

        if ($service->is_active == 0) {
            $service->update(['is_active' => 1]);
        } else {
            $service->update(['is_active' => 0]);
        }
    }

    public function approveAllServicesStatus()
    {
        $data['service'] = Service::withoutGlobalScopes()->where('is_approve', 'Not Approve')->update(['is_approve' => 'Approve']);


    }

    public function postService($request, $flag = null)
    {
//        dd(Carbon::parse($request->_to)->format('H:i:s'));
        $fileName = time() . "-" . $request->title . ".png";
        ImageHelpers::updateProfileImage('project-assets/images/adds', $request->file('profile_image'), $fileName);


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


        $setting = Setting::where('is_service', '=', 1)->where('is_active', '=', 1)->first();

        if ($flag == "agent") {

            if (isset($request->user_checkbox)) {
                if ($setting) {
                    $service = Service::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds" . $fileName, 'agent_admin_id' => Auth::user()->id, 'is_approve' => 'Approve']));
                } else {
                    $service = Service::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds" . $fileName, 'agent_admin_id' => Auth::user()->id]));
                }
            } else {
                if ($setting) {
                    $service = Service::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds" . $fileName, 'agent_admin_id' => Auth::user()->id, 'is_approve' => 'Approve', 'created_by' => Auth::user()->id]));
                } else {
                    $service = Service::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds" . $fileName, 'agent_admin_id' => Auth::user()->id, 'created_by' => Auth::user()->id]));
                }
            }
        } else if ($flag == "admin") {
            $service = Service::create(array_merge($request->all(), ['long' => $lng, 'lat' => $lat, 'agent_admin_id' => Auth::user()->id, 'profile_image' => "project-assets/images/business" . $fileName, 'is_approve' => 'Approve']));

        } else {
            $service = Service::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds" . $fileName, 'created_by' => Auth::user()->id]));


        }

        foreach ($request->gallery_images as $image) {

            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";
            ImageHelpers::updateProfileImage('project-assets/images/services/', $image, $fileName);
            Gallery::create(['name' => 'project-assets/images/services/' . $fileName, 'service_id' => $service->id]);
        }
        $service->categories()->attach($request->category_id);

        Address::create([

            'service_id' => $service->id,
            'main_country_id' => $request->main_country_id,
            'main_state_id' => $request->main_state_id,
            'main_city_id' => $request->main_city_id,
            'address' => $request->address
        ]);


        if ($flag == 'agent') {
            foreach ($request->timing['day'] as $key => $time) {
                if ($request->timing['day_category'][$key] == 'enter_time') {
                    Timing::create([
                        'service_id' => $service->id,
                        'day' => $time,
                        '_from' => Carbon::parse($request->timing['_from'][$key])->format('H:i:s'),
                        '_to' => Carbon::parse($request->timing['_to'][$key])->format('H:i:s')
                    ]);
                } elseif ($request->timing['day_category'][$key] == 'open_day') {
                    Timing::create([
                        'service_id' => $service->id,
                        'day' => $time,
                        '_from' => 'Open',
                        '_to' => 'Open'
                    ]);
                } elseif ($request->timing['day_category'][$key] == 'close_day') {
                    Timing::create([
                        'service_id' => $service->id,
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
                            'service_id' => $service->id,
                            'day' => $request->monday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->monday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->monday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->monday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->monday['day'],
                            '_from' => Carbon::parse($request->monday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->monday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }

            }

            if ($request->tuesday) {

                if (!empty($request->tuesday['day_category'])) {
                    if ($request->tuesday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->tuesday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->tuesday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->tuesday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->tuesday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->tuesday['day'],
                            '_from' => Carbon::parse($request->tuesday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->tuesday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }

                }

            }

            if ($request->wednesday) {
                if (!empty($request->wednesday['day_category'])) {
                    if ($request->wednesday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->wednesday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->wednesday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->wednesday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->wednesday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->wednesday['day'],
                            '_from' => Carbon::parse($request->wednesday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->wednesday['to'])->format('H:i:s')
                        ]);
                    } else {
                    }
                }

            }

            if ($request->thursday) {
                if (!empty($request->thursday['day_category'])) {
                    if ($request->thursday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->thursday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->thursday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->thursday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->thursday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->thursday['day'],
                            '_from' => Carbon::parse($request->thursday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->thursday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }
            }

            if ($request->friday) {
                if (!empty($request->friday['day_category'])) {
                    if ($request->friday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->friday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->friday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->friday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->friday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->friday['day'],
                            '_from' => Carbon::parse($request->friday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->friday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }


            }

            if ($request->saturday) {
                if (!empty($request->saturday['day_category'])) {
                    if ($request->saturday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->saturday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->saturday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->saturday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->saturday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->saturday['day'],
                            '_from' => Carbon::parse($request->saturday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->saturday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }
                }

            }

            if ($request->sunday) {
                if (!empty($request->sunday['day_category'])) {
                    if ($request->sunday['day_category'] == 'close_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->sunday['day'],
                            '_from' => 'Closed',
                            '_to' => 'Closed'
                        ]);
                    } elseif ($request->sunday['day_category'] == 'open_day') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->sunday['day'],
                            '_from' => 'Open',
                            '_to' => 'Open'
                        ]);
                    } elseif ($request->sunday['day_category'] == 'enter_time') {
                        Timing::create([
                            'service_id' => $service->id,
                            'day' => $request->sunday['day'],
                            '_from' => Carbon::parse($request->sunday['from'])->format('H:i:s'),
                            '_to' => Carbon::parse($request->sunday['to'])->format('H:i:s')
                        ]);
                    } else {

                    }

                }
            }
        }
    }


    public function viewServices($request)
    {
        return Service::paginate(12);
    }


    public function getAllServicesDataUserAdmin($user, $request)
    {
        $data['all_services'] = $user->services()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_services'] = $user->services()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_services_count'] = $user->services()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_services'] = $data['all_services']->where('title', 'like', '%' . $request->search . '%');
            $data['total_services'] = $data['total_services']->where('title', 'like', '%' . $request->search . '%');
            $data['all_services_count'] = $data['all_services_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {
            $address = $request->address;
            $data['all_services'] = $data['all_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_services'] = $data['all_services']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }


        $data['all_services'] = $data['all_services']->simplePaginate($this->servicePagination);
        $data['total_services'] = $data['total_services']->paginate($this->servicePagination);
        $data['all_services_count'] = $data['all_services_count']->count();

//        dd($data);

        $request->flash();
        return $data;
    }


    ///////////             FUNCTION HELPERS


    public function availableNow($data)
    {
        $data['all_services'] = $data['all_services']->whereHas('timings', function ($query) {
            $query->where([
                ['day', '=', Carbon::today()->format('l')],
                ['_from', '=', 'Open']
            ])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));

        });

        $data['all_services'] = $data['all_services']->whereHas('timings', function ($query) {
            $query->where([['day', '=', Carbon::today()->format('l')], ['_from', '=', 'Open']])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));
        });


        $data['total_services'] = $data['total_services']->whereHas('timings', function ($query) {
            $query->where([['day', '=', Carbon::today()->format('l')], ['_from', '=', 'Open']])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));

        });

        $data['all_services_count'] = $data['all_services_count']->whereHas('timings', function ($query) {
            $query->where([['day', '=', Carbon::today()->format('l')], ['_from', '=', 'Open']])
                ->orWhere([['day', '=', Carbon::today()->format('l')]])
                ->where('_from', '<=', Carbon::now()->format('H:i:s'))
                ->where('_to', '>=', Carbon::now()->format('H:i:s'));
        });


        return $data;
    }


    public static function sortByOnApi($serviceData, $request)
    {
        if ($request->sort_by == 'a-z') {
            return SetupsHelper::sortArrayAsc($serviceData);
        }
        if ($request->sort_by == 'z-a') {
            return SetupsHelper::sortArrayDesc($serviceData);
        }
    }

    public static function serviceApi($data, $serviceData)
    {
        foreach ($data['all_services'] as $service) {

            $approveHtml = '';
            $rateeHtml = '0.0';

            if ($service->is_approve == "Approve") {
                $approveHtml = '<span class="prple-doller " style="border-right: 1px solid;
        border-left: 1px solid;border-color: #ececec;">Approved</span>';
            } else {
                $approveHtml = '<span class="prple-doller " style="border-right: 1px solid;
        border-left: 1px solid;border-color: #ececec;color:#f0ad4e;">Not Approved</span>';
            }


            $rateeHtml = " $service->rate <i class='fas fa-dollar-sign'></i> / h";


            $priceType = ``;
            $priceType = '<div > Houry price ' . $service->hourly_price . '</div >';
            $priceType = $priceType . '<div> Project price ' . $service->project_price . '</div >';


            $serviceData[] = [
                'verified' => true,
                'stars' => ReviewHelper::reviewStars($service),
                'service_id' => $service->id,
                'title' => $service->title,
                'price_type' => $priceType,
                'email' => $service->email,
                'phone' => $service->phone,
                'is_active' => $service->is_active,
                'created_by' => $service->created_by,
                'agent_admin_id' => $service->agent_admin_id,
                'profile_image' => $service->profile_image,
                'is_approve' => $service->is_approve,
                'description' => $service->description,
                'twitter_url' => $service->twitter_url,
                'gmail_url' => $service->gmail_url,
                'facebook_url' => $service->facebook_url,
                'lat' => $service->lat,
                'long' => $service->long,
                'country_url' => route('user.front-services.detail', ['country_id' => $service->address->main_country_id]),
                'city_url' => route('user.front-services.detail', ['city_id' => $service->address->main_city_id]),
                'country_name' => $service->address->country->name,
                'city_name' => $service->address->city->name,
                'reviews_avg' => number_format($service->reviews()->avg('rating'), 1),
                'approve_html' => $approveHtml,
                'rate_html' => $rateeHtml,
                'timing_status' => $service->TimingStatus,
                'service_detail_url' => route('user.front-services.detail', [$service->id]),
                'stars_html' => \App\Helpers\ReviewHelper::reviewStars($service)
            ];
        }


        return $serviceData;
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

            $data['all_services'] = $data['all_services']->where('lat', $response->results[0]->geometry->location->lat)->where('long', $response->results[0]->geometry->location->lng);

            $googleNearBy = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?radius=2000&keyword=" . $keyword . "&location=" . $response->results[0]->geometry->location->lat . "," . $response->results[0]->geometry->location->lng . "&key=" . env('GOOGLE_KEY');


            $clientNearBy = new \GuzzleHttp\Client();

            $response = $clientNearBy->request('GET', $googleNearBy);

            $response = json_decode($response->getBody());

            if (count($response->results) != 0) {
                foreach ($response->results as $nearBy) {
                    $openingHours = '';
                    $approveHtml = '<span class="prple-doller " style="border-right: 1px solid;
        border-left: 1px solid;border-color: #ececec;color:#f0ad4e;">Not Approved</span>';
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


                    $resultsData[] = [
                        'lat' => $nearBy->geometry->location->lat,
                        'long' => $nearBy->geometry->location->lng,
                        'verify' => false,
                        'stars' => ReviewHelper::reviewStars($nearBy->rating, 'unverified'),
                        'service_id' => $nearBy->place_id,
                        'title' => $nearBy->name,
                        'price_type' => $priceType,
                        'profile_image' => $photos,
                        'is_approve' => 'Not Approve',
                        'description' => '....',
                        'location' => $nearBy->vicinity,
                        'location_url' => route('user.front-services', ['search_location' => $nearBy->vicinity]),
                        'reviews_avg' => $nearBy->rating,
                        'approve_html' => $approveHtml,
                        'rate_html' => $rateeHtml,
                        'timing_status' => $openingHours,
                        'service_detail_url' => route('user.front-services.detail-unverified', ['placeId' => $nearBy->place_id]),
                        'stars_html' => ReviewHelper::reviewStars($nearBy->rating, 'unverified')
                    ];
                }

            }


        }

        return ['all_services' => $data['all_services'], 'result_data' => $resultsData];
    }

    public function countrySearch($data, $request)
    {
        $countryId = $request->country_id;
        $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });
        return $data;
    }

    public function citySearch($data, $request)
    {
        $cityId = $request->city_id;
        $data['all_services'] = $data['all_services']->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });

        $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });

        $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });
        return $data;
    }

    public static function categorySearch($data, $request)
    {
        $categoryId = $request->category_id;
        $data['all_services'] = $data['all_services']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', 'like', '%' . $categoryId . '%');
        });

        $data['total_services'] = $data['total_services']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        $data['all_services_count'] = $data['all_services_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        return $data;
    }

    public static function addressSearch($data, $request)
    {
        $address = $request->address;
        $data['all_services'] = $data['all_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        $data['total_services'] = $data['total_services']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        $data['all_services_count'] = $data['all_services_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        return $data;
    }


    public static function keywordSearch($data, $request)
    {
        $data['all_services'] = $data['all_services']->where('title', 'like', '%' . $request->search . '%');
        $data['total_services'] = $data['total_services']->where('title', 'like', '%' . $request->search . '%');
        $data['all_services_count'] = $data['all_services_count']->where('title', 'like', '%' . $request->search . '%');
        return $data;
    }

    public static function postedByMe($data)
    {
        $data['all_services'] = $data['all_services']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
        $data['total_services'] = $data['total_services']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
        $data['all_services_count'] = $data['all_services_count']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
        return $data;
    }

    public static function nearMe()
    {
        $lat = '';
        $lng = '';
        if (!empty(Auth::user()->userinfo->lat) && !empty(Auth::user()->userinfo->long)) {
            $lat = Auth::user()->userinfo->lat;
            $lng = Auth::user()->userinfo->long;
        }
        $data['all_services'] = Service::select('services.*', DB::raw('( 3959 * acos( cos( radians(' . $lat . ') )
						* cos( radians( services.lat ) ) * cos( radians( services.long ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * 
						sin( radians( services.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 5 ')->orderBy('distance', 'asc');


        $data['total_services'] = Service::select('services.*', DB::raw('( 3959 * acos( cos( radians(' . $lat . ') )
						* cos( radians( services.lat ) ) * cos( radians( services.long ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * 
						sin( radians( services.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance', 'asc');

        $data['all_services_count'] = Service::select('services.*', DB::raw('( 3959 * acos( cos( radians(' . $lat . ') )
						* cos( radians( services.lat ) ) * cos( radians( services.long ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * 
						sin( radians( services.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance', 'asc');

        return $data;
    }


}