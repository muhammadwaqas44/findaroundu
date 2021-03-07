<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});







Route::middleware(['auth', 'CheckAgent'])->group(function () {


    Route::post('/agent/customer/change-password/{userId}', 'Agent\UserController@changeCustomerPassword')->name('agent.customer.change-password');

    Route::get('/agent/dashboard', 'Agent\DashboardController@agentDashboard')->name('agent.dashboard');
    Route::get('/agent/all-users', 'Agent\UserController@agentUsers')->name('agent.all-users');
    Route::get('/agent/user-detail/{userId}', 'Agent\UserController@userDetail')->name('agent.user-detail');
    Route::post('/agent/add-user', 'Agent\UserController@postAddUser')->name('agent.add-user');
   // Route::get('/agent/all-services', 'Agent\UserController@agentUsers')->name('agent.services');

    ////////////////                 AGENT BUSINESSES

    Route::get('/agent/all-business', 'Agent\BusinessController@agentAdminBusinesses')->name('agent.all-business');
    Route::get('agent/new-business', 'Agent\BusinessController@addBusiness')->name('agent.new-business');
    Route::post('agent/business-post', 'Agent\BusinessController@postBusiness')->name('agent.business-post');
    Route::get('agent/business-detail/{businessId}', 'Agent\BusinessController@businessAgentDetail')->name('agent.business.detail');
    Route::get('agent/reject-business/{businessId}', 'Agent\BusinessController@rejectBusiness')->name('agent.reject-business');
    Route::get('agent/approve-business/{businessId}', 'Agent\BusinessController@approveBusiness')->name('agent.approve-business');
    Route::get('agent/delete-business/{businessId}', 'Agent\BusinessController@deleteBusiness')->name('agent.delete-business');
    Route::post('agent/business-detail/{businessId}/add-services', 'Agent\BusinessController@addServices')->name('agent.add-services');

    Route::post('agent/get-user-address','AddressController@getUserAddress')->name('get-user-address');


    ///////////////                 END AGENT BUSINESSES

    //////////////                  AGENT SERVICES

    Route::get('/agent/all-services', 'Agent\ServiceController@agentAdminServices')->name('agent.all-services');
    Route::get('agent/add-service', 'Agent\ServiceController@addService')->name('agent.add-service');
    Route::post('agent/post-service', 'Agent\ServiceController@postService')->name('agent.post-service');
    Route::get('agent/service-detail/{serviceId}', 'Agent\ServiceController@serviceDetail')->name('agent.front-services.detail');
    Route::get('agent/delete-image-service/{service_id}', 'Agent\ServiceController@deleteGalleryImage')->name('agent.delete-gallery-image-services');
    Route::get('agent/delete-image-service/{service_id}', 'Agent\ServiceController@deleteGalleryImage')->name('agent.delete-gallery-image-services');
    Route::get('agent/delete-services/{serviceId}', 'Agent\ServiceController@deleteService')->name('agent.delete-service');
    Route::get('agent/reject-service/{serviceId}', 'Agent\ServiceController@rejectService')->name('agent.reject-service');
    Route::get('agent/approve-service/{serviceId}', 'Agent\ServiceController@approveService')->name('agent.approve-service');



    /////////////                   END AGENT SERVICES

    Route::post('agent/apply-subscription', 'Agent\SubscriptionController@applySubscription')->name('agent.apply-subscription');



    /////////////                   AGENT ADDS

    Route::get('agent/all-adds', 'Agent\AddsController@agentAdminAdds')->name('agent.all-adds');
    Route::get('agent/new-add', 'Agent\AddsController@newAdd')->name('agent.new-add');
    Route::post('agent/add-post', 'Agent\AddsController@postAdd')->name('agent.add-post');
    Route::get('agent/delete-image-add/{add_id}', 'Agent\AddsController@deleteGalleryImage')->name('agent.delete-gallery-image-adds');
    Route::get('agent/adds-detail/{addId}', 'Agent\AddsController@addsDetail')->name('agent.adds.detail');
    Route::get('agent/add-detail/{addId}', 'Agent\AddsController@viewAddDetail')->name('agent.front-add.detail');
    Route::get('agent/delete-adds/{serviceId}', 'Agent\AddsController@deleteAdds')->name('agent.delete-add');
    Route::get('agent/approve/add/{addId}', 'Agent\AddsController@approveAddStatus')->name('agent.approve-add');




    ////////////                    END AGENT ADDS

    Route::get('/agent/create-user', 'Agent\UserController@createUser')->name('agent.create-user');
   // Route::get('/agent/all-adds', 'Agent\AddsController@agentAdds')->name('agent.adds');w
    //Route::get('/agent/all-business', 'Agent\UserController@agentUsers')->name('agent.all-business');
   // Route::get('/agent/all-business', 'Agent\UserController@agentUsers')->name('agent.all-business');
    Route::get('agent/change-status/user/{userId}', 'Agent\UserController@changeUserStatus')->name('agent.change-status.user');
    Route::get('/agent/delete-user/{customerId}', 'Agent\UserController@deleteUser')->name('agent.delete-user');

    Route::post('agent/change-image','Agent\UserController@user_image')->name('agent.change-image');

    Route::post('agent/edit-customer/{userId}', 'Agent\UserController@editCustomer')->name('agent.edit-customer');

    ////////////                    SUBSCRIPTION ROUTES

    Route::any('agent/all-subscription', 'Subscription\SubscriptionController@allAgentSubscription')->name('agent.subscription.all-subscription');
    Route::any('agent/subscription-detail/{subscriptionId}', 'Subscription\SubscriptionController@agentSubscriptionDetail')->name('agent.subscription.subscription-detail');
    Route::get('agent/cancel-subscription/{subscriptionId}', 'Subscription\SubscriptionController@cancelAgentSubscription')->name('agent.subscription.cancel-subscription');


    ////////////                    END SUBSCRIPTION ROUTES

    ///////////                     PLAN ROUTES

    Route::get('agent/plan-detail/{planId}', 'Admin\Subscription\PlanController@planDetail')->name('agent.plan-detail');


    ///////////                     END PLAN ROUTES

});
