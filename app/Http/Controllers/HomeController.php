<?php

namespace App\Http\Controllers;

use App\Category;
use App\Add;
use App\MainCity;
use App\MainState;
use App\Services\AddressService;
use App\Services\CategoryService;
use App\Stat;
use App\Tag;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function progress(){
        return view('progress');
    }

    public function index(CategoryService $categoryService, AddressService $addressService)
    {

        $countryId = Session::get('location')['countryId'];
        $states = MainState::where('country_id', $countryId)->pluck('id');

        $data['city'] = MainCity::whereIn('state_id', $states)->select('id', 'name')->get();
        $data['individual'] = Category::individualLatest(18)->get();
        $data['individual_popular'] = $categoryService->getCategoryCountryWise($countryId,'Professionals');

        $data['top_viewed_adds'] =  Add::TopViewed(8)->get();
        $data['top_ranked_adds'] =  Add::TopRanked(8)->get();
        $data['top_latest_adds'] =  Add::LatestAdds(8)->get();
        $data['companies'] = Category::companyPopularNdLatest(9)->where('parent_id',NULL)->get();
        $data['business_count_city'] = MainCity::withCount('business','adds','services')->orderby('business_count','desc')->first();
        $data['countryCities'] =  $addressService->getCitiesCountryWise($countryId);
        $data['adds_count_city'] = MainCity::withCount('adds','business','services')->orderby('adds_count','desc')->first();
        $data['services_count_city'] = MainCity::withCount('services','business','adds')->orderby('services_count','desc')->first();
        $data['stats'] = Stat::all();
        $data['professional'] = Category::businessType()->where('parent_id',NULL)->get();
        $data['classified'] = Category::Add()->where('parent_id',NULL)->get();
        $data['business'] = Category::BusinessCat()->whereNull('parent_id')->get();
        $data['category'] = Category::businessType()->get();
        $data['categories'] = Category::businessType()->whereNull('parent_id')->get();

        $data['professional'] = Category::businessType()->where('parent_id',NULL)->get();

        $data['classified'] = Category::Add()->where('parent_id',NULL)->get();
        $data['business'] = Category::BusinessCat()->whereNull('parent_id')->get();

        return view('home.index',compact('data'));
    }


}
