<?php

namespace App\Providers;

use App\Add;
use App\Services\GatesServices;
use App\Subscription\Site;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('user.new-add', function ($user) {
            $ads = GatesServices::ads($user);

            if($ads == true)
            {
                return true;
            }
            else{
                return false;
            }

        });


        Gate::define('user.add-service', function ($user) {
            $service = GatesServices::services($user);

            if($service == true)
            {
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('user.new-business', function ($user) {

            $business = GatesServices::business($user);

            if($business == true)
            {
                return true;
            }
            else{
                return false;
            }
        });


    }

}
