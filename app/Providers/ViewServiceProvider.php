<?php

namespace App\Providers;

use App\FauTag;
use App\FooterLinks;
use App\EmployeeCount;
use App\Category;
use App\MainCity;
use App\MainCountry;
use Illuminate\Support\ServiceProvider;
use App\FooterSettings;
use App\MainState;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tag;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout-user.header', function ($view) {
            $view->with(['serviceCategoriesPopular' => \App\Category::serviceCategoryPopular(8)->get(),
                'businessCategoriesPopular' => \App\Category::businessCategoryPopular(8)->get(),
                'addCategoriesPopular' => \App\Category::addCategoryPopular(8)->get()
            ]);
        });

        view()->composer('layout.footer', function ($view) {
            $view->with('footerSetting', [
                "footer_seetings" => FooterSettings::where('is_active', 1)->first(),
                "footer_links" => FooterLinks::where('is_active', '1')->first()
            ]);
        });


        view()->composer('home.Partials.request_quote_popup', function ($view) {
            $view->with('data', [
                'category' =>Category::BusinessType()->get(),
                "categories" => Category::BusinessType()->get(),
                "city" =>MainCity::whereIn('state_id',
                    MainState::where('country_id', Session::get('location')['countryId']
                    )->pluck('id'))->select('id', 'name')->get(),
            ]);
        });

        view()->composer('home.Partials.job_popup', function ($view) {
            $view->with('data', [
                'category' =>Category::BusinessType()->get(),
                'tags' => FauTag::with('categories')->wherehas('categories',function($q){$q->where('type','Business');})->get(),


                "city" =>MainCity::whereIn('state_id',
                    MainState::where('country_id', Session::get('location')['countryId']
                    )->pluck('id'))->select('id', 'name')->get(),
            ]);
        });


        view()->composer('home.Partials.business_popup', function ($view) {
            $view->with('data', [
                'category' =>Category::BusinessType()->get(),
                "employee_count" =>EmployeeCount::all(),
                'country' => MainCountry::all(),
                "city" =>MainCity::whereIn('state_id',
                    MainState::where('country_id', Session::get('location')['countryId']
                    )->pluck('id'))->select('id', 'name')->get(),
            ]);
        });



        view()->composer('home.Partials.front-search-partial', function ($view) {
            $view->with('dataTop', [
                'category' =>Category::BusinessType()->get(),
                "categories" => Category::BusinessType()->get(),
                "city" =>MainCity::whereIn('state_id',
                    MainState::where('country_id', Session::get('location')['countryId']
                    )->pluck('id'))->select('id', 'name')->get(),
            ]);
        });



        view()->composer('home.Partials.request_quote_popup', function ($view) {
            $view->with('data', [
                'category' =>Category::BusinessType()->get(),
                "categories" => Category::BusinessType()->get(),
                "city" =>MainCity::whereIn('state_id',
                    MainState::where('country_id', Session::get('location')['countryId']
                    )->pluck('id'))->select('id', 'name')->get(),
            ]);
        });






    }















    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
