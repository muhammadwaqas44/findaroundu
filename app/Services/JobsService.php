<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/17/2019
 * Time: 4:27 PM
 */

namespace App\Services;


use App\FauJob;
use App\Helpers\ImageHelpers;
use App\Helpers\ReviewHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JobsService
{
    private $addsPagination = 5;

    public function getAllJobs($request)
    {

        $data['all_jobs'] = FauJob::activeUserJobs()->orderBy('id', 'desc');
        $data['total_jobs'] = FauJob::activeUserJobs()->orderBy('id', 'desc');
        $data['all_jobs_count'] = FauJob::activeUserJobs()->orderBy('id', 'desc');


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

            $data = Self::categorySearch($data,$request);
        }

        if ($request->filled('city_id')) {

            $data = Self::citySearch($data, $request);
        }

        if ($request->filled('country_id')) {

            $data = Self::countrySearch($data, $request);
        }

        $data['all_jobs'] = $data['all_jobs']->get();

        $jobData = [];

        $resultsData = [];

        $jobData = Self::jobApi($data, $jobData);

        if ($request->filled('sort_by')) {
            $jobData = Self::sortByOnApi($jobData, $request);
        }

        $data['all_jobs'] = $jobData;


        return $data;

    }


    public static function jobApi($data, $jobData)
    {
        foreach ($data['all_jobs'] as $job) {
            $jobData[] = [
                'stars' => ReviewHelper::reviewStars($job),
                'job_id' => $job->id,
                'task' => $job->task,
                'video' => $job->video,
                'audio' => $job->audio,
                'type' => $job->type,
                'lat' => $job->lat,
                'lng' => $job->lng,
                'date' => $job->date,
                'number_of_people' => $job->number_of_people,
                'budget' => $job->budget,
                'city_url' => route('user.front-adds', ['city_id' => $job->city_id]),
                'city_name' => $job->city->name,
                'reviews_avg' => number_format($job->reviews()->avg('rating'), 1),
                'job_detail_url' => route('user.front-add.detail', [$job->id]),
                'stars_html' => \App\Helpers\ReviewHelper::reviewStars($job),
                'category' => $job->categories->first()->name,
                'profile_image' =>$job->user->userInfo->image == null ? asset('main-admin/images/default.png'):Auth::user()->userInfo->image,
                'fullName' => ImageHelpers::fullName($job->user->userInfo->first_name,$job->user->userInfo->last_name),
                'created_at'=>$job->created_at->diffForHumans(),
                'description'=>ImageHelpers::trim_word($job->description,20),
                'task_time'=>Carbon::now()->diffInDays(Carbon::parse($job->date)),
                'tags' => $job->fauTags,
                'location'=>$job->location

            ];
        }

        return $jobData;
    }

    public static function nearMe()
    {
        $lat = '';
        $lng = '';
        if(!empty(Auth::user()->userinfo->lat) &&  !empty(Auth::user()->userinfo->long) )
        {
            $lat = Auth::user()->userinfo->lat;
            $lng = Auth::user()->userinfo->long;
        }

        $data['all_jobs'] =  FauJob::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        $data['total_jobs'] = FauJob::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        $data['all_jobs_count'] = FauJob::select('fau_jobs.*',DB::raw('( 3959 * acos( cos( radians('.$lat.') )
						* cos( radians( fau_jobs.lat ) ) * cos( radians( fau_jobs.lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * 
						sin( radians( fau_jobs.lat ) ) ) ) AS distance'))
            ->havingRaw('distance < 10 ')->orderBy('distance','asc');

        return $data;
    }

    public static function postedByMe($data)
    {
        $data['all_jobs'] = $data['all_jobs']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        $data['total_jobs'] = $data['total_jobs']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        $data['all_jobs_count'] = $data['all_jobs_count']->withoutGlobalScopes()->where('created_by','=',Auth::user()->id);
        return $data;
    }

    public static function keywordSearch($data, $request)
    {
        $data['all_jobs'] = $data['all_jobs']->where('task', 'like', '%' . $request->search . '%');
        $data['total_jobs'] = $data['total_jobs']->where('task', 'like', '%' . $request->search . '%');
        $data['all_jobs_count'] = $data['all_jobs_count']->where('task', 'like', '%' . $request->search . '%');
        return $data;
    }

    public static function addressSearch($data, $request)
    {
        $address = $request->address;

        $data['all_jobs'] = $data['all_jobs']->where('location', 'like', '%' . $request->search . '%');


        $data['total_jobs'] = $data['total_jobs']->where('location', 'like', '%' . $request->search . '%');

        $data['all_jobs_count'] = $data['all_jobs_count']->where('location', 'like', '%' . $request->search . '%');

        return $data;
    }

    public static function categorySearch($data, $request)
    {

        $categoryId = $request->category_id;

        $data['all_jobs'] = $data['all_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', 'like', '%' . $categoryId . '%');
        });


        $data['total_jobs'] = $data['total_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        $data['all_jobs_count'] = $data['total_jobs']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });

        return $data;
    }

    public function citySearch($data, $request)
    {

        $cityId = $request->city_id;

        $data['all_jobs'] = $data['all_jobs']->with(['city']);


        $data['total_jobs'] = $data['total_jobs']->with(['city']);

        $data['all_jobs_count'] = $data['all_jobs_count']->with(['city']);


        return $data;
    }

    public function countrySearch($data, $request)
    {
        $countryId = $request->country_id;

        $data['all_jobs'] = $data['all_jobs']->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['total_jobs'] = $data['total_jobs']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        $data['all_jobs_count'] = $data['all_jobs_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
            $query->where('main_country_id', $countryId);
        });

        return $data;
    }


    public static function sortByOnApi($jobData, $request)
    {
        if ($request->sort_by == 'a-z') {
            return SetupsHelper::sortArrayAsc($jobData);
        }
        if ($request->sort_by == 'z-a') {
            return SetupsHelper::sortArrayDesc($jobData);
        }
    }





}