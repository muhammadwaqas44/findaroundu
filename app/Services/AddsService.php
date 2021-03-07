<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Add;
use App\AdsAdditionalField;
use App\Helpers\SetupsHelper;
use App\User;
use App\Gallery;
use App\Helpers\ImageHelpers;
use Exception;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yajra\Datatables\Datatables;
use App\Address;
use App\Helpers\ReviewHelper;
use Carbon\Carbon;

class AddsService
{

    private $addsPagination = 5;

    public function getAllAddsDataUser($request)
    {

        $data['all_adds'] = Auth::user()->adds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_adds'] = Auth::user()->adds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_adds_count'] = Auth::user()->adds()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_adds'] = $data['all_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['total_adds'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_adds_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_adds'] = $data['all_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_adds'] = $data['all_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_adds'] = $data['all_adds']->simplePaginate($this->addsPagination);
        $data['total_adds'] = $data['total_adds']->paginate($this->addsPagination);
        $data['all_adds_count'] = $data['all_adds_count']->count();

        $request->flash();
        return $data;
    }

    public function getAllAddsDataAgentAdmin($request)
    {
        $data['all_adds'] = Auth::user()->agentAdminAdds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_adds'] = Auth::user()->agentAdminAdds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_adds_count'] = Auth::user()->agentAdminAdds()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_adds'] = $data['all_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['total_adds'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_adds_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_adds'] = $data['all_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_adds'] = $data['all_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }


        $data['all_adds'] = $data['all_adds']->simplePaginate($this->addsPagination);
        $data['total_adds'] = $data['total_adds']->paginate($this->addsPagination);
        $data['all_adds_count'] = $data['all_adds_count']->count();


        $request->flash();
        return $data;
    }

    public function getAllAddsFront($request)
    {

        $data['all_adds'] = Add::activeUserAdds();
        $categoryName = null;
//        $data['all_adds'] = Add::activeUserAdds()->orderBy('id', 'desc');
//        $data['total_adds'] = Add::activeUserAdds()->orderBy('id', 'desc');
//        $data['all_adds_count'] = Add::activeUserAdds()->orderBy('id', 'desc');


        if ($request->filled('near_me')) {
            $data = Self::nearMe($request->near_me, $request->lat, $request->lng);
        }

        if ($request->filled('posted_by_me')) {
            $data = Self::postedByMe($data);
        }

        if ($request->filled('search')) {
            $data = Self::keywordSearch($data, $request);
        }

        if ($request->filled('price')) {
            $data = Self::priceFilter($data, $request);
        }

        if ($request->filled('address')) {

            $data = Self::addressSearch($data, $request);
        }

        if ($request->filled('sort_by')) {
            $data = Self::sortByDate($data, $request);
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

        if ($request->filled('day_limit')) {
            $data = Self::dayLimit($data, $request);
        }

        $data['all_adds'] = $data['all_adds']->get();

        $addData = [];

        $resultsData = [];
        if ($request->filled('search_location')) {
            $data['all_adds'] = Self::searchLocation($data, $request)['all_adds'];

            $resultsData = Self::searchLocation($data, $request)['result_data'];

        }

        $addData = Self::addApi($data, $addData);

        if ($request->filled('sort_by')) {
            $addData = Self::sortByOnApi($addData, $request);
        }

        $data['all_adds'] = (array)$addData;

        return $data;
    }

    public function getAllAddsDataAdmin($request)
    { //dd($request->sort_by);
        $data['all_adds'] = Add::withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_adds'] = Add::withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_adds_count'] = Add::withoutGlobalScopes()->orderBy('id', 'desc');
        // dd($data);

        if ($request->filled('search')) {
            $data['all_adds'] = $data['all_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['total_adds'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_adds_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort_by') && $request->sort_by == "latest") {

            $data['all_adds'] = $data['all_adds']->orderBy('id', 'desc');
            $data['total_adds'] = $data['total_adds']->orderBy('id', 'desc');
            $data['all_adds_count'] = $data['all_adds_count']->orderBy('id', 'desc');

        }

        if ($request->filled('sort_by') && $request->sort_by == "oldest") {
            // dd(1);
            $data['all_adds'] = $data['all_adds']->orderBy('id', 'asc');
            $data['total_adds'] = $data['total_adds']->orderBy('id', 'asc');
            $data['all_adds_count'] = $data['all_adds_count']->orderBy('id', 'asc');
            //  dd($data);
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_adds'] = $data['all_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_adds'] = $data['all_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_adds'] = $data['all_adds']->simplePaginate($this->addsPagination);
        $data['total_adds'] = $data['total_adds']->paginate($this->addsPagination);
        $data['all_adds_count'] = $data['all_adds_count']->count();


        $request->flash();
        return $data;
    }

    public function getAllAddsData()
    {
        $adds = Add::withoutGlobalScopes()->get();
        $result['adds'] = [];
        foreach ($adds as $add) {
            $status = 'active';
            $urlForActive = route('admin.change-status.user', [$add->id]);
            $active = "<a class=\"btn btn-xs  btn-danger\"onclick=\"changeStatus(" . $add->id . ",'all-adds')\">Deactive</a>";
            if ($add->is_active == 0) {
                $status = 'deactive';
                $active = "<a class=\"btn btn-xs  btn-success\" onclick=\"changeStatus(" . $add->id . ",'all-adds')\">Active </a>";
            }

            $categoriesHtml = null;
            foreach ($add->categories as $category) {
                $categoriesHtml = $categoriesHtml . "<span class='badge badge-info'>" . $category->name . "</span>";
            }

            $result['adds'][] = [
                'id' => $add->id,
                'action' => $active,
                'title' => $add->title,
                'profile_image' => $add->profile_image,
                'condition' => $add->condition,
                'price' => $add->price,
                'country' => $add->country->name,
                'description' => $add->description,
                'categories' => $categoriesHtml,
                'created_at' => $add->created_at,
                'status' => $status
            ];
        }

        return Datatables::of($result['adds'])->rawColumns(['categories', 'action'])->make(true);

    }

    public function changeAddStatus($id)
    {
        $add = Add::withoutGlobalScopes()->find($id);

        if ($add->is_active == 0) {
            $add->update(['is_active' => 1]);
            session()->flash('degree-status-active', $add->name . " Activated.");

        } else {
            $add->update(['is_active' => 0]);
            session()->flash('degree-status-deactive', $add->name . " DeActivated.");
        }
    }

    public function postAdd($request, $flag = null)
    {
        $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

        ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_image'), $fileName);


        $address = trim($request->address);
        $googleApiAddress = "https://maps.googleapis.com/maps/api/geocode/json?key=" . env('GOOGLE_KEY') . "&address=$address";
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $googleApiAddress);
        $response = json_decode($response->getBody());

        if ($response->status == 'ZERO_RESULTS') {

            throw new Exception('Enter Correct Address');
        }
        $lat = $response->results[0]->geometry->location->lat;
        $lng = $response->results[0]->geometry->location->lng;


        $setting = Setting::where('is_adds', '=', 1)->where('is_active', '=', 1)->first();


        if ($flag == "agent") {
            if (isset($request->user_checkbox)) {

                if ($setting) {
                    $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'agent_admin_id' => Auth::user()->id, 'is_approve' => 'Approve']));
                } else {
                    $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'agent_admin_id' => Auth::user()->id]));
                }
            } else {
                if ($setting) {
                    $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'agent_admin_id' => Auth::user()->id, 'is_approve' => 'Approve', 'created_by' => Auth::user()->id]));
                } else {
                    $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'agent_admin_id' => Auth::user()->id, 'created_by' => Auth::user()->id]));
                }
            }
        } else if ($flag == "admin") {
            $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'is_approve' => 'Approve']));
        } else {
            $add = Add::create(array_merge($request->except('_token'), ['long' => $lng, 'lat' => $lat, 'profile_image' => "project-assets/images/adds/" . $fileName, 'created_by' => Auth::user()->id]));

        }


        $add->categories()->attach($request->category_id);

        foreach ($request->gallery_images as $image) {

            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";
            ImageHelpers::updateProfileImage('project-assets/images/adds/', $image, $fileName);
            Gallery::create(['name' => 'project-assets/images/adds/' . $fileName, 'add_id' => $add->id]);
        }

        Address::create([
            'add_id' => $add->id,
            'main_country_id' => $request->main_country_id,
            'main_state_id' => $request->main_state_id,
            'main_city_id' => $request->main_city_id,
            'address' => $request->address
        ]);
    }

    public function approveAddStatus($id)
    {
        $add = Add::withoutGlobalScopes()->find($id);
        if ($add->is_approve == 'Not Approve') {
            $add->update(['is_approve' => "Approve"]);
            return;
        }
        if ($add->is_approve == 'Approve') {
            $add->update(['is_approve' => "Not Approve"]);
        }
    }

    public function rejectAdd($id)
    {
        $add = Add::withoutGlobalScopes()->find($id);
        if ($add->is_approve == 'Not Approve') {
            $add->update(['is_approve' => "Rejected"]);
        }
    }

    public function approveAllAdds()
    {
        $data['add'] = Add::withoutGlobalScopes()->where('is_approve', 'Not Approve')->update(['is_approve' => 'Approve']);

    }

    public function getAllAddsDataUserAdmin($user, $request)
    {
        $data['all_adds'] = $user->adds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['total_adds'] = $user->adds()->withoutGlobalScopes()->orderBy('id', 'desc');
        $data['all_adds_count'] = $user->adds()->withoutGlobalScopes()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_adds'] = $data['all_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['total_adds'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_adds_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_adds'] = $data['all_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_adds'] = $data['all_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_adds'] = $data['total_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_adds'] = $data['all_adds']->simplePaginate($this->addsPagination);
        $data['total_adds'] = $data['total_adds']->paginate($this->addsPagination);
        $data['all_adds_count'] = $data['all_adds_count']->count();

        $request->flash();
        return $data;
    }

    ///////////             FUNCTION HELPERS

    public static function sortByOnApi($addData, $request)
    {
        if ($request->sort_by == 'a-z') {
            return SetupsHelper::sortArrayAsc($addData);
        }
        if ($request->sort_by == 'z-a') {
            return SetupsHelper::sortArrayDesc($addData);
        }
    }


    public static function priceFilter($data, $request)
    {
        $reqVal = explode("-", $request->price);
        $minVal = $reqVal[0];
        $maxVal = $reqVal[1];
        $data['all_adds'] = $data['all_adds']->withoutGlobalScopes()
            ->where('price', '>=', $minVal);
        if ($maxVal != "more") {
            $data['all_adds'] = $data['all_adds']->where('price', '<=', $maxVal);
        }

        return $data;
    }

    public static function addApi($data, $addData)
    {
        foreach ($data['all_adds'] as $add) {

            $approveHtml = '';
            $rateeHtml = '0.0';

            if ($add->is_approve == "Approve") {
                $approveHtml = '<span class="prple-doller " style="border-right: 1px solid;
        border-left: 1px solid;border-color: #ececec;">Approved</span>';
            } else {
                $approveHtml = '<span class="prple-doller " style="border-right: 1px solid;
        border-left: 1px solid;border-color: #ececec;color:#f0ad4e;">Not Approved</span>';
            }


            if ($add->currency == 'dollar') {
                $rateeHtml = "<i class='fas fa-dollar-sign'></i> $add->price";
            } else {
                $rateeHtml = "Rs $add->price";
            }


            $priceType = ``;
            $priceType = '<div > Price ' . $add->price . '</div >';


            $addData[] = [
                'verified' => true,
                'stars' => ReviewHelper::reviewStars($add),
                'add_id' => $add->id,
                'title' => $add->title,
                'price_type' => $priceType,
                'email' => $add->email,
                'phone_number' => $add->phone_number,
                'maker' => $add->category_maker_id,
                'is_active' => $add->is_active,
                'created_by' => $add->created_by,
                'agent_admin_id' => $add->agent_admin_id,
                'profile_image' => $add->profile_image,
                'is_approve' => $add->is_approve,
                'description' => $add->description,
                'twitter_url' => $add->twitter_url,
                'gmail_url' => $add->gmail_url,
                'facebook_url' => $add->facebook_url,
                'lat' => $add->lat,
                'long' => $add->long,
                'country_url' => route('user.front-adds', ['country_id' => $add->address->main_country_id]),
                'city_url' => route('user.front-adds', ['city_id' => $add->address->main_city_id]),
                'country_name' => $add->address->country->name,
                'city_name' => $add->address->city->name,
                'reviews_avg' => number_format($add->reviews()->avg('rating'), 1),
                'approve_html' => $approveHtml,
                'rate_html' => $rateeHtml,
                'timing_status' => $add->TimingStatus,
                'add_detail_url' => route('user.front-add.detail', [$add->id]),
                'stars_html' => \App\Helpers\ReviewHelper::reviewStars($add)
            ];
        }


        return $addData;
    }

    public function countrySearch($data, $request)
    {
        $countryId = $request->country_id;
        $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });
        return $data;
    }

    public function citySearch($data, $request)
    {
        $cityId = $request->city_id;
        $data['all_adds'] = $data['all_adds']->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });

        $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });

        $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
            $query->where('main_city_id', $cityId);
        });
        return $data;
    }

    public static function categorySearch($data, $request)
    {
        $categoryId = $request->category_id;
        $data['all_adds'] = $data['all_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->whereIn('category_id', $categoryId);
        });

//        $data['all_adds'] = $data['all_business']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
//            $query->whereIn('category_id', $categoryId);
//        });

//        $data['total_adds'] = $data['total_adds']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
//            $query->where('category_id', $categoryId);
//        });
//
//        $data['all_adds_count'] = $data['all_adds_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
//            $query->where('category_id', $categoryId);
//        });

        return $data;
    }


    public function updateDescription($request)
    {
        $add_id = $request->add_id;

        Add::where('id', $add_id)->update(['description' => $request->description]);

        return 'success';
    }


    public function updatePrice($request)
    {
        $add_id = $request->add_id;

        Add::where('id', $add_id)->update(['price' => $request->price]);

        return 'success';
    }


    public static function addressSearch($data, $request)
    {
        $address = $request->address;
        $data['all_adds'] = $data['all_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        $data['total_adds'] = $data['total_adds']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        $data['all_adds_count'] = $data['all_adds_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
            $query->where('address', 'like', '%' . $address . '%');
        });

        return $data;
    }

    public static function keywordSearch($data, $request)
    {
        $data['all_adds'] = $data['all_adds']->where('title', 'like', '%' . $request->search . '%');
        $data['total_adds'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
        $data['all_adds_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        return $data;
    }

    public static function postedByMe($data)
    {
        $data['all_adds'] = $data['all_adds']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
//        $data['total_adds'] = $data['total_adds']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
//        $data['all_adds_count'] = $data['all_adds_count']->withoutGlobalScopes()->where('created_by', '=', Auth::user()->id);
        return $data;
    }

    public static function nearMe($radius, $lat, $lng)
    {
        $lat = $lat;
        $lng = $lng;

        $data['all_adds'] = Add::select('adds.*', DB::raw('( 6371 * acos( cos( radians(' . $lat . ') )
						* cos( radians( adds.lat ) ) * cos( radians( adds.long ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * 
						sin( radians( adds.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < ' . ($radius + 1))->orderBy('distance', 'asc');


        return $data;
    }


    public function saveAds($request)
    {


        $condition = $request->condition_check;
        $make = $request->make;
        $additional = $request->additional_check;

        $fileName = '';

        if ($request->profile_picture != '') {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_picture'), $fileName);

        }

        $ads = new Add();
        if ($fileName != '') {
            $ads->profile_image = "project-assets/images/adds/" . $fileName;
        } else {
            $ads->profile_image = $fileName;
        }

        $ads->lat = $request->lat;
        $ads->long = $request->lng;
        if ($condition == '1') {
            $ads->condition = $request->condition;
        }

        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->currency = $request->currency;
        $ads->price = $request->price;
        $ads->created_by = Auth::user()->id;
        $ads->category_maker_id = $request->maker;
        if ($make == '1') {
            $ads->category_maker_id = $request->category_maker_id;
        }

        if ($ads->save()) {
            if ($additional == '1') {
                if ($request->sub_category_name == 'Vehicle') {
                    foreach ($request->additional['vehicle'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Buses, Vans & Trucks' || $request->sub_category_name == 'Rickshaw & Chingchi' || $request->sub_category_name == 'Tractors & Trailers' || $request->sub_category_name == 'Scooters') {
                    foreach ($request->additional['bus'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Land & Plots' || $request->sub_category_name == 'Shops - Offices - Commercial Space') {
                    foreach ($request->additional['land'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }

                if ($request->sub_category_name == 'Houses') {
                    foreach ($request->additional['houses'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }

                if ($request->sub_category_name == 'Apartments & Flats' || $request->sub_category_name == 'Portions & Floors') {
                    foreach ($request->additional['portion'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Shops - Offices - Commercial Space - Rent') {
                    foreach ($request->additional['commercial'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Roommates & Paying Guests') {
                    foreach ($request->additional['paying_guest'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Vacation Rentals - Guest Houses') {
                    foreach ($request->additional['guest_house'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }


                if ($request->sub_category_name == 'Motorcycles') {
                    foreach ($request->additional['motorcycle'] as $key => $vehicle) {
                        AdsAdditionalField::create(['key' => $key, 'value' => $vehicle, 'ad_id' => $ads->id, 'type' => 'Ads']);
                    }
                }
            }

            foreach ($request->gallery as $gallery) {
                $fileNameGal = time() . "-" . rand(10, 1000000) . $request->title . ".png";

                ImageHelpers::updateProfileImage('project-assets/images/adds/', $gallery, $fileNameGal);

                Gallery::create(['name' => 'project-assets/images/adds/' . $fileNameGal, 'add_id' => $ads->id]);
            }

            $ads->categories()->attach($request->sub_category);

            Address::create([
                'add_id' => $ads->id,
                'main_country_id' => $request->country_id,
                'main_city_id' => $request->city_id,
                'address' => $request->location
            ]);

            return 'true';

        } else {
            return response()->json(['result' => 'error', 'message' => "Unable to save Add"]);
        }


    }


    public static function sortByDate($data, $request)
    {
        if ($request->sort_by == 'newer') {
            $data['all_adds'] = $data['all_adds']->withoutGlobalScopes()->latest("id");
        }
        if ($request->sort_by == 'older') {
            $data['all_adds'] = $data['all_adds']->withoutGlobalScopes()->oldest("id");
        }
        return $data;
    }

    public static function dayLimit($data, $request)
    {
        $dayLimit = Carbon::today()->subDays($request->day_limit);
        $data['all_adds'] = $data['all_adds']->withoutGlobalScopes()->where("created_at", ">=", $dayLimit);
        return $data;
    }

    public function gallery($request)
    {

        $ads = Add::find($request->add_id);


        if ($request->file('profile_picture')) {
            $fileName = time() . "-" . rand(10, 1000000) . 'profile_picture' . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_picture'), $fileName);

            $adds = Add::update(['profile_image' => "project-assets/images/adds/" . $fileName])->where('id', $request->add_id);
        }

        if ($request->file('gallery-1')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/', $request->file('gallery-1'), $fileName);


            if ($ads->gallery->first()) {
                $adds = Gallery::where('id', $ads->gallery->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $adds = Gallery::create(['name' => "project-assets/images/" . $fileName, 'add_id' => $request->add_id]);
            }

        }

        if ($request->file('gallery-2')) {
            $fileName = time() . "-" . rand(10, 1000000) . 'gallery' . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/', $request->file('gallery-2'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(1)->first()) {
                $adds = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(1)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $adds = Gallery::create(['name' => "project-assets/images/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-3')) {
            $fileName = time() . "-" . rand(10, 1000000) . 'gallery' . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('gallery-3'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(2)->first()) {
                $adds = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(2)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $adds = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-4')) {
            $fileName = time() . "-" . rand(10, 1000000) . 'gallery' . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('gallery-4'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(3)->first()) {
                $adds = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(2)->first()->id)->update(['profile_image' => "project-assets/images/adds/" . $fileName]);
            } else {
                $adds = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-5')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_picture'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(4)->first()) {
                $ads = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(4)->first()->id)->update(['profile_image' => "project-assets/images/adds/" . $fileName]);
            } else {
                $ads = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-6')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('gallery-6'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(5)->first()) {
                $ads = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(5)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $ads = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-7')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('gallery-7'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(6)->first()) {
                $ads = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(6)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $ads = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-8')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_picture'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(7)->first()) {
                $ads = Gallery::where('id', Gallery::where('add_id', '=', $ads->id)->skip(7)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $ads = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        if ($request->file('gallery-9')) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";

            ImageHelpers::updateProfileImage('project-assets/images/adds/', $request->file('profile_picture'), $fileName);

            if (Gallery::where('add_id', '=', $ads->id)->skip(8)->first()) {
                $ads = Gallery::where('id', '=', Gallery::where('add_id', '=', $ads->id)->skip(8)->first()->id)->update(['name' => "project-assets/images/adds/" . $fileName]);
            } else {
                $ads = Gallery::create(['name' => "project-assets/images/adds/" . $fileName, 'add_id' => $request->add_id]);
            }
        }

        return true;

    }

}