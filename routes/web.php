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
//
use App\Subscription\Site;
use App\Subscription\Subscription;

Route::get('abc', function () {

dd(Session::has('location'));
    $data = Subscription::with(['addons' => function ($query) {

        $query ->select( DB::raw("sum(total_price) as sum"));

    }]);
    dd($data->find(2)->addons);
//dd(Auth::user()->subscriptions()->where('active','active')->first()->addons()->get());

    $data = Auth::user()->subscriptions()->where('active','active')->with(['addons']);

dd($data->first()->addons);
    dd(Auth::user()->subscriptions()->where('active','active')->first()->addons->find(4)->addonFeatures);
    dd( $join = Auth::user()->subscriptions()->where('active','active')->first()
        ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
        ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
        ->select( DB::raw("sum(subscription_plan_features.quantity) as sum"))
        ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
        ->get());


    dd(\App\Subscription\SubscriptionPlan::where('name', 'Free')->whereHas('pricingModel', function ($query) {
        $query->where('price', 0);
    })->first()->packages->first()

    );
    dd(\App\Subscription\SubscriptionPlan::first()->pricingModel()->wherePivot('price', 0)->get()
    );
});
//Route::get('abc',function (){
//
//    $startDate = Carbon\Carbon::parse('2019-03-06');
//
//    $currentDate = Carbon\Carbon::now()->format('Y-m-d');
//
//    $diff = $startDate->diffInMonths($currentDate);
//lo
//    //custom month start and end date
//
//    $monthStart = $startDate->format('d');
//    $monthEnd =  $startDate->subDay()->format('d');
//    $now = \Carbon\Carbon::now();
//
//    $month_start_date = Carbon\Carbon::create($now->format('Y'), $now->format('m'), $monthStart);
//    $month_end_date = Carbon\Carbon::create($now->format('Y'), $now->addMonth()->format('m'), $monthEnd);
//
//    dd($month_start_date,$month_end_date);
//
//    $month_end_date = $monthStart->addMonth();
//
//
//    dd($monthStart,$month_end_date);
//
//
//    $currentdayNumber = $startDate->copy()->dayOfWeek;
//
//    dd(Carbon\Carbon::setWeekStartsAt($currentdayNumber));
//    Carbon::setWeekEndsAt();
//
//    $monthStartDate = $startDate->copy()->addWeek($diff)->startOfMonth()->format('Y-m-d');
//    $monthEndDate = $startDate->copy()->addWeek($diff)->startOfMonth()->format('Y-m-d');
//
//    dd($weekStartDate,$monthStartDate,$monthEndDate,$weekEndDate,$currentdayNumber,$beforedayNumber);
//});


Route::get('/save-user-into-other', 'Subscription\SubscribersController@enterUser');


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'CheckUser'])->group(function () {


    ///////////           USER  ADDONS ROUTES           ///////////

    Route::get('user/addons', 'Subscription\AddonController@frontAddons')->name('user.front-addons');
    Route::post('user/apply-addons', 'Subscription\AddonController@applyAddon')->name('user.apply-addon');

    ///////////            END ADDON ROUTES             ///////////


    //////////             USER ROUTES

    Route::post('user/apply-subscription', 'Subscription\SubscriptionController@applySubscription')->name('user.apply-subscription');

    Route::get('/in-progress', 'HomeController@progress')->name('in-progress');
    Route::get('user/profile/{id}', 'User\UserController@userProfile')->name('user.profile');
    Route::get('/user-dashboard', 'User\DashboardController@userDashboard')->name('user.dashboard');
    // Route::post('user/add-address','User\UserController@addAddress')->name('user.add-address');
    Route::post('user/edit-user', 'User\UserController@editUser')->name('user.edit-user');


//    Route::get('update-user-location','User\UserController@updateLocation')->name('user.update-location');


    /////////           SERVICES ROUTES

    Route::get('user/delete-image-service/{service_id}', 'ServicesController@deleteGalleryImage')->name('user.delete-gallery-image-services');
    Route::get('user/delete-services/{serviceId}', 'ServicesController@deleteService')->name('user.delete-service');
    Route::get('user/all-services', 'ServicesController@userServices')->name('user.all-services');
    Route::get('user/add-service', 'ServicesController@addService')->name('user.add-service')->middleware('can:user.add-service');

    Route::post('user/post-service', 'ServicesController@postService')->name('user.post-service');


    Route::get('user/services-detail/{serviceId}', 'ServicesController@servicesDetails')->name('user.services.detail');

    /////////           SERVICES ROUTE DATA  TABLE

    Route::get('user/all-services-data/data', 'ServicesController@getAllServicesData')->name('user.all-services.data');
    Route::get('user/change-status/service/{serviceId}', 'ServicesController@changeServiceStatus')->name('user.change-status.service');

    ////////            END SERVICES ROUTE


    /////////           ADDS ROUTES

    Route::get('user/delete-image-add/{add_id}', 'AddsController@deleteGalleryImage')->name('user.delete-gallery-image-adds');

    Route::get('user/change-status/add/{addId}', 'AddsController@changeAddStatus')->name('user.change-status.add');
    Route::get('user/delete-adds/{serviceId}', 'AddsController@deleteAdds')->name('user.delete-add');
    Route::get('user/all-adds', 'AddsController@userAdds')->name('user.all-adds');
    Route::get('user/new-add', 'AddsController@newAdd')->name('user.new-add')->middleware('can:user.new-add');
    Route::post('user/add-post', 'AddsController@postAdd')->name('user.add-post');
    Route::get('user/adds-detail/{addId}', 'AddsController@addsDetail')->name('user.adds.detail');




    Route::get('country','AddsController@getCountries')->name('user.getCountries');

    /////////           ADD ROUTE DATA  TABLE

    Route::get('user/all-adds-data/data', 'AddsController@getAllAddsData')->name('user.all-adds.data');

    ////////            END ADD ROUTE


    ////////      REVIEW ROUTES


    Route::post('user/give-business-review', 'ReviewController@giveBusinessReview')->name('user.give-business-review');
    Route::post('user/give-add-review', 'ReviewController@giveAddReview')->name('user.give-add-review');
    Route::get('user/review-comment/{commentId}/like', 'ReviewController@likeReviewComment')->name('user.like-review-comment');
    Route::get('user/review/{reviewId}/like', 'ReviewController@likeReview')->name('user.like-review');
    Route::get('user/delete-review/{addId}', 'AddsController@deleteReview')->name('user.review-delete');
    Route::post('user/give-review', 'ReviewController@giveServiceReview')->name('user.give-review');
    Route::get('user/review/{reviewId}/load-comments', 'ReviewController@loadComments')->name('user.load-comments');
    Route::get('user/review/{reviewId}/comment', 'ReviewController@giveComment')->name('user.give-comments');


    ///////     END REVIEW""


    /////////           BUSINESS ROUTES


    Route::any('user/business/load-categories/{businessId}', 'Admin\CategoriesController@loadCategories');
    Route::any('user/business/add-categories/{businessId}', 'BusinessController@addCategories')->name('user.add-categories.business');
    Route::any('user/add-portfolio/businesses/{businessId}', 'PortfolioController@addPortfolio')->name('user.add-portfolio.business');
    Route::any('user/delete-portfolio/{portfolioId}', 'PortfolioController@deletePortfolio')->name('user.delete-portfolio');
    Route::get('user/change-status/business/{serviceId}', 'BusinessController@changeBusinessStatus')->name('user.change-status.business');
    Route::get('user/delete-business/{businessId}', 'BusinessController@deleteBusiness')->name('user.delete-business');
    Route::get('user/all-business', 'BusinessController@userBusinesses')->name('user.all-business');
    Route::get('user/new-business', 'BusinessController@addBusiness')->name('user.new-business')->middleware('can:user.new-business');
    Route::post('user/business-post', 'BusinessController@postBusiness')->name('user.business-post');
    Route::get('user/business-detail/{businessId}', 'BusinessController@businessDetail')->name('user.business.detail');
    Route::post('user/business-detail/{businessId}/add-services', 'BusinessController@addServices')->name('user.add-services');
    Route::get('user/delete-image-business/{business_id}', 'BusinessController@deleteGalleryImage')->name('user.delete-gallery-image-business');

    Route::post('user/business-detail/{businessId}/add-jobs','BusinessController@addJobs')->name('user.addJobs');


    //////////          END ADD ROUTES

    /////////           PAKCKAGES ROUTES

    Route::get('user/front-packages', 'Subscription\PackageController@frontPackages')->name('user.front-packages');


    /////////           END PACKAGES ROUTES


    /////////           BUSINESS ROUTES


    Route::get('user/business', 'BusinessController@userBusinesses')->name('user.business');
    Route::post('user/add-business', 'BusinessController@postBusiness')->name('user.add-business');

    /////////           BUSINESS ROUTE DATA  TABLE

    Route::get('user/all-business-data/data', 'BusinessController@getAllBusinessData')->name('user.all-business.data');
    Route::get('user/change-status/business/{addId}', 'BusinessController@changeBusinessStatus')->name('user.change-status.business');

    ////////            END BUSINESS ROUTE


    /////////           Message ROUTES

    Route::get('user/chat', 'User\ChatController@index')->name('user.front-message');
    Route::post('user/get-message', 'User\ChatController@getMessage')->name('user.get-messages');
    Route::get('/set_time_zone', 'User\ChatController@setTimeZone')->name('time_zone');

    Route::post('user/save-message', 'User\ChatController@saveMessage')->name('user.save-messages');

    Route::any('user/is-typing','User\ChatController@saveUserStatus')->name('user.is-typing');


    /////////           END Message ROUTES


});


Route::middleware(['auth', 'CheckAdmin'])->group(function () {


    ///////     ADDONS      //////

    Route::any('admin/add-addon', 'Subscription\AddonController@addAddon')->name('admin.add-addon');
    Route::get('admin/all-addons', 'Subscription\AddonController@allAddons')->name('admin.all-addons');
    Route::get('admin/addon-detail/{addonId}', 'Subscription\AddonController@addonDetail')->name('admin.addon-detail');
    Route::post('admin/{addonId}/add-invoice-notes', 'Subscription\AddonController@addInvoiceNotes')->name('admin.addon-invoice-note');
    Route::get('admin/{addonId}/addon-delete-invoice-notes', 'Subscription\AddonController@deleteInvoiceNotes')->name('admin.addon-delete-invoice-note');
    Route::get('admin/{addonId}/addon-delete-comments-notes', 'Subscription\AddonController@deleteCommentNotes')->name('admin.addon-delete-comments-note');
    Route::any('admin/{addonId}/edit-addons', 'Subscription\AddonController@editAddon')->name('admin.edit-addon');
    Route::post('admin/{addonId}/addon-comments-notes', 'Subscription\AddonController@addCommentsNotes')->name('admin.addon-comment-note');
    Route::post('admin/update-addons','Subscription\AddonController@updateAddOn')->name('admin.post-edit-addons');

    Route::get('admin/{addonId}/delete-addon', 'Subscription\AddonController@deleteAddon')->name('admin.delete-addon');


    Route::post('admin/customer/change-password/{userId}', 'Admin\UserController@changeCustomerPassword')->name('admin.customer.change-password');
    Route::post('admin/edit-customer/{userId}', 'Admin\UserController@editUser')->name('admin.edit-customer');

    Route::get('/admin-dashboard', 'Admin\DashboardController@adminDashboard')->name('admin.dashboard');
    Route::get('/admin/create-user', 'Admin\UserController@addUser')->name('admin.create-user');
    Route::post('/admin/add-user', 'Admin\UserController@postAddUser')->name('admin.add-user');


    //////////          BUSINESS ROUTES

    Route::post('admin/add-business', 'Admin\BusinessController@postBusiness')->name('admin.business-post');
    Route::get('admin/new-business', 'Admin\BusinessController@addBusiness')->name('admin.new-business');
    Route::get('admin/all-business', 'Admin\BusinessController@adminBusinesses')->name('admin.all-business');
    Route::get('admin/business-detail/{businessId}', 'Admin\BusinessController@businessAdminDetail')->name('admin.business.detail');
    Route::get('admin/reject-business/{businessId}', 'BusinessController@rejectBusiness')->name('admin.reject-business');
    Route::get('admin/approve-business/{businessId}', 'BusinessController@approveBusiness')->name('admin.approve-business');
    Route::get('admin/approve-all/business/', 'BusinessController@approveAllBusiness')->name('admin.approve-all-businesses');

    Route::get('admin/delete-business/{businessId}', 'BusinessController@deleteBusiness')->name('admin.delete-business');


    /////////           SERVICES ROUTE

    Route::post('admin/post-service-admin', 'Admin\ServiceController@postServiceAdmin');

    Route::get('admin/new-service', 'Admin\ServiceController@addService')->name('admin.new-service');
    Route::get('admin/reject-service/{serviceId}', 'ServicesController@rejectService')->name('admin.reject-service');
    Route::get('admin/approve-service/{serviceId}', 'ServicesController@approveService')->name('admin.approve-service');
    Route::get('admin/services', 'Admin\ServiceController@adminServices')->name('admin.services');
    Route::get('admin/all-services-data/data', 'ServicesController@getAllServicesData')->name('admin.all-services.data');
    Route::get('admin/approve-status/service/{serviceId}', 'ServicesController@approveServiceStatus')->name('admin.change-status.service');
    Route::get('admin/approve-all/service/', 'ServicesController@approveAllServicesStatus')->name('admin.approve-all-services');
    Route::get('admin/delete-service/{serviceId}', 'ServicesController@deleteService')->name('admin.delete-service');

    ////////            END SERVICES ROUTE


    /////////           Add ROUTE

    Route::get('admin/adds', 'Admin\AddsController@adminAdds')->name('admin.adds');
    Route::get('admin/all-adds-data/data', 'AddsController@getAllAddsData')->name('admin.all-adds.data');
    Route::get('admin/approve/add/{addId}', 'AddsController@approveAddStatus')->name('admin.approve-add');
    Route::get('admin/reject-add/{addId}', 'AddsController@rejectAdd')->name('admin.reject-add');
    Route::get('admin/approve-all/add/', 'AddsController@approveAllAdds')->name('admin.approve-all-adds');
    Route::get('admin/delete-add/{addId}', 'AddsController@deleteAdds')->name('admin.delete-add');

    Route::get('admin/new-add', 'Admin\AddsController@newAdd')->name('admin.new-add');
    Route::post('admin/add-post', 'Admin\AddsController@postAdd')->name('admin.add-post');

    Route::post('admin/get-user-address', 'AddressController@getUserAddress')->name('admin-get-user-address');




    ////////            END ADD ROUTE


    //////////      USERS DATA TABLES  ROUTES

    Route::get('admin/all-users/data', 'Admin\UserController@getAllUsersData')->name('get.all-users.data');
    Route::get('admin/change-status/user/{userId}', 'Admin\UserController@changeUserStatus')->name('admin.change-status.user');


    /////////       PLAN ROUTES


    Route::get('admin/plan/{planId}/delete', 'Admin\Subscription\PlanController@planDelete')->name('admin.plan-delete');
    Route::get('admin/plans/{planId}/delete-invoice-note', 'Admin\Subscription\PlanController@deleteInvoiceNote')->name('admin.plan.delete-invoice-note');
    Route::get('admin/plan-detail/{planId}', 'Admin\Subscription\PlanController@planDetail')->name('admin.plan-detail');
    Route::post('admin/plan/{planId}/add-invoice', 'Admin\Subscription\PlanController@addInvoiceNotes')->name('admin.plan.add-invoice');
    Route::post('admin/plan/{planId}/add-comment', 'Admin\Subscription\PlanController@addComments')->name('admin.plan.add-comment');
    Route::get('admin/plan/{planId}/delete-comment', 'Admin\Subscription\PlanController@deleteComments')->name('admin.plan.delete-comment');

    Route::get('admin/all-plans', 'Admin\Subscription\PlanController@allPlans')->name('admin.all-plans');
    Route::get('admin/add-new-plan', 'Admin\Subscription\PlanController@addNewPlan')->name('admin.add-new-plan');
    Route::post('admin/add-new-plan', 'Admin\Subscription\PlanController@postAddNewPlan')->name('admin.post-add-new-plan');


    //////      CATEGORIES SETTINGS

    Route::get('admin/categories', 'Admin\CategoriesController@categoriesLayout')->name('admin.categories');
    Route::get('admin/individuals-categories/data', 'Admin\CategoriesController@getAllIndividualsCategoriesData')->name('get.all-individuals-categories.data');
    Route::get('admin/company-categories/data', 'Admin\CategoriesController@getAllCompanyCategoriesData')->name('get.all-company-categories.data');
    Route::get('admin/change-status/category/{categoryId}', 'Admin\CategoriesController@changeCategoryStatus')->name('admin.change-status.category');

    Route::get('admin/country-wise-categories/{countryId}', 'Admin\CategoriesController@countryWiseCategory')->name('admin.countriesCategories');
    Route::post('admin/category-data-update', 'Admin\CategoriesController@updateCategoryData')->name('admin.category-data-update');
    Route::post('admin/country-selected-category-update', 'Admin\CategoriesController@updateCountrySelectedCategory')->name('admin.country-selected-category-update');


    //////      COUNTRIES ROUTES
    Route::get('admin/country-wise-cities/{countryId}', 'Admin\AddressController@countryWiseCities')->name('admin.countriesCities');
    Route::post('admin/city-data-update', 'Admin\AddressController@updateCityData')->name('admin.city-data-update');
    Route::post('admin/country-selected-cities-update', 'Admin\AddressController@updateCountrySelectedCity')->name('admin.country-selected-city-update');


    //////      ADD CUSTOMERS ROUTES

    Route::get('/admin/all-users', 'Admin\UserController@allUsers')->name('admin.all-users');
    Route::get('/admin/delete-user/{customerId}', 'Admin\UserController@deleteUser')->name('admin.delete-user');
    Route::get('/admin/user-detail/{userId}', 'Admin\UserController@userDetail')->name('admin.user-detail');
    Route::get('admin/all-subscribers', 'Subscription\SubscribersController@allSubscribers')->name('admin.all-subscribers');
    Route::get('admin/add-new-subscriber', 'Subscription\SubscribersController@addNewSubscriber')->name('main-admin.add-new-subscriber');
    Route::post('admin/add-new-subscriber', 'Subscription\SubscribersController@addPostNewSubscriber')->name('main-admin.post-add-new-subscriber');
    Route::post('admin/edit-new-subscriber/{customerId}', 'Subscription\SubscribersController@editSubscriber')->name('main-admin.post-edit-Customer');
    Route::get('admin/subscriber-detail/{customerId}', 'Subscription\SubscribersController@subscriberDetail')->name('main-admin.subscriber-detail');
    Route::post('admin/subscriber/{customerId}/add-invoice-note', 'Subscription\SubscribersController@addInvoiceNote')->name('main-admin.Customer.add-invoice-note');
    Route::get('admin/subscriber-detail/{customerId}/delete-invoice-note', 'Subscription\SubscribersController@deleteInvoice')->name('main-admin.subscriber.delete-invoice-note');
    Route::post('admin/subscriber/{customerId}/add-comments', 'Subscription\SubscribersController@addComments')->name('main-admin.subscriber.add-comments');
    Route::get('admin/subscriber-detail/{customerId}/delete-comments', 'Subscription\SubscribersController@deleteComments')->name('main-admin.subscriber.delete-comments');
    Route::post('admin/subscriber/{customerId}/add-contact', 'Subscription\SubscribersController@addContact')->name('main-admin.subscriber.add-contact');
    Route::get('admin/subscriber/delete-contact/{contactId}', 'Subscription\SubscribersController@deleteContact')->name('main-admin.subscriber.delete-contact');
    Route::get('admin/subscriber/disable-contact/{contactId}', 'Subscription\SubscribersController@disableContact')->name('main-admin.subscriber.disable-contact');
    Route::get('admin/subscriber/enable-contact/{contactId}', 'Subscription\SubscribersController@enableContact')->name('main-admin.subscriber.enable-contact');
    Route::post('admin/subscriber/edit-contact/{contactId}', 'Subscription\SubscribersController@editContact')->name('main-admin.subscriber.edit-contact');


    /////       END CUSTOMERS ROUTES


    //////    Agent Routes

    Route::get('/admin/all-agents', 'Admin\AgentController@index')->name('admin.all-agents');
    Route::get('/admin/create-agent', 'Admin\UserController@addUser')->name('admin.create-agent');
    Route::post('/admin/add-agent', 'Admin\UserController@postAddUser')->name('admin.add-agent');


    //////      SUBSCRIPTION  ROUTES

    Route::any('admin/{customerId}/create-new-subscription', 'Subscription\SubscriptionController@createNewSubscription')->name('admin.subscriber.create-new-subscription');
    Route::any('admin/all-subscription', 'Subscription\SubscriptionController@allSubscription')->name('admin.all-subscription');
    Route::any('admin/subscription-detail/{subscriptionId}', 'Subscription\SubscriptionController@subscriptionDetail')->name('admin.subscription.subscription-detail');
    Route::get('admin/subscription-delete/{subscriptionId}', 'Subscription\SubscriptionController@deleteSubscription')->name('admin.subscription.delete-subscription');
    Route::get('admin/cancel-subscription/{subscriptionId}', 'Subscription\SubscriptionController@cancelSubscription')->name('admin.subscription.cancel-subscription');
    Route::get('admin/activate-subscription/{subscriptionId}', 'Subscription\SubscriptionController@activateSubscription')->name('admin.subscription.activate-subscription');
    //Route::get('admin/add-billing/{subscriptionId}', 'Subscription\SubscriptionController@addBilling')->name('admin.subscription.activate-subscription');

    //////      END SUBSCRIPTIONS ROUTES


////////   MENU AND MODULE ROUTES

    Route::any('admin/create-menues', 'Admin\Subscription\MenuController@createMenues')->name('admin.create-menues');
    Route::any('admin/all-menues', 'Admin\Subscription\MenuController@allMenu')->name('admin.all-menues');

    Route::any('admin/add-module', 'Admin\Subscription\ModuleController@addModule')->name('admin.add-module');
    Route::any('admin/all-modules', 'Admin\Subscription\ModuleController@allModules')->name('admin.all-modules');
    Route::any('admin/module-detail/{moduleId}', 'Admin\Subscription\ModuleController@moduleDetail')->name('admin.module-detail');
    Route::any('admin/add-module-functions/{moduleId}', 'Admin\Subscription\ModuleController@addModuleFunctions')->name('admin.add-module-functions');
    Route::get('admin/delete-module/{moduleId}', 'Admin\Subscription\ModuleController@deleteModule')->name('admin.delete-module');

    ////////    END MENU MODULES


    /////////       PACKAGES       ///////////

    Route::get('admin/add-new-package', 'Subscription\PackageController@addNewPackage')->name('admin.add-new-package');
    Route::post('admin/add-new-package', 'Subscription\PackageController@postAddNewPackage')->name('admin.post-add-new-package');
    Route::get('admin/all-packages', 'Subscription\PackageController@allPackages')->name('admin.all-packages');


    ///for testing
    Route::get('/plan-packages', 'Subscription\PackageController@plan_packages')->name('plan-packages');

    /////////       END PACKAGES

    //////       For Categories Import And Export

    Route::get('/admin/import-categories','Admin\CategoriesController@importCategories')->name('admin.import-categories');
    Route::get('/admin/export-categories','Admin\CategoriesController@exportSampleCategories')->name('admin.export-categories');
    Route::post('/admin/category/Import','Admin\CategoriesController@importExcelCategories')->name('admin.importing-categories');
    Route::get('admin/delete-import-category/{importCatId}', 'Admin\CategoriesController@deleteImportCategory')->name('admin.delete-import-category');

    /////////       END Categories Import And Export

});


////////        ROUTES OF SERVICEES WITHOUT LOGIN
///
Route::get('services', 'ServicesController@userServices')->name('user.front-services');
Route::get('services/data', 'ServicesController@userServicesData')->name('user.front-services.data');
Route::get('service-detail/{serviceId}', 'ServicesController@serviceDetail')->name('user.front-services.detail');
Route::get('service-detail', 'ServicesController@serviceDetailUnVerified')->name('user.front-services.detail-unverified');

///////         END SERVICES ROUTES


/////    ROUTES OF ADDS WITHOUT LOGIN

Route::get('adds/data', 'AddsController@addsData')->name('user.front-adds.data');
Route::get('adds', 'AddsController@viewAdds')->name('user.front-adds');
Route::get('add-detail/{addId}', 'AddsController@viewAddDetail')->name('user.front-add.detail');
Route::post('add-gallery-save','AddsController@gallery')->name('user.front-add.gallery');

Route::post('edit-add-description','AddsController@editDescription')->name('editAddDescription');
Route::post('edit-add-price','AddsController@editPrice')->name('editAddPrice');


/// END ADDS ROUTES


////////        ROUTES OF BUSINESS WITHOUT LOGIN

Route::get('business/data', 'BusinessController@userBusinessesData')->name('user.front-business.data');
Route::get('business', 'BusinessController@userBusinesses')->name('user.front-business');
Route::get('business-detail/{businessId}', 'BusinessController@viewBusinessDetail')->name('front-business.detail');
Route::get('business-detail', 'BusinessController@businessDetailUnVerified')->name('user.front-business.detail-unverified');

Route::post('edit-business-description','BusinessController@editDescription')->name('editBusinessDescription');

Route::post('edit-add-phone','BusinessController@editPhone')->name('editBusinessPhone');

///////         END BUSINESS ROUTES


///////         ROUTES OF REVIEWS

Route::get('user/service/{serviceId}/reviews', 'ReviewController@getServiceReviews')->name('user.get-review');
Route::get('user/business/{businessId}/reviews', 'ReviewController@getBusinessReviews')->name('user.get-review');
Route::get('user/adds/{addId}/reviews', 'ReviewController@getAddsReviews')->name('user.get-review');

///////         END REVIEWS ROUTES

///////         Setting

Route::get('admin/all-settings', 'Admin\SettingsController@allSettings')->name('admin.all-settings');
Route::get('admin/add-new-settings', 'Admin\SettingsController@addNewSettings')->name('admin.add-new-settings');
Route::post('admin/save-settings', 'Admin\SettingsController@postNewSettings')->name('admin.post-add-new-setting');
Route::get('admin/change-settings-status/{id}', 'Admin\SettingsController@changeStatus')->name('admin.change_status');
Route::get('admin/delete-setting/{id}', 'Admin\SettingsController@deleteSetting')->name('admin.delete_setting');


Route::get('admin/get-setups-data', 'Admin\SetupsController@getSetups')->name('get-setups');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@loginView')->name('login');
Route::post('/login-user', 'Auth\LoginController@loginPost')->name('login-user');
Route::get('/register', 'Auth\RegisterController@registerView')->name('register');

///////         ROUTES OF CATEGORIES
Route::get('/admin/sub-categories/{categoryId}', 'Admin\CategoriesController@subCategories')->name('admin.sub-categories');
Route::get('/admin/all-categories/{categoryType}', 'Admin\CategoriesController@allCategories')->name('admin.all-categories');
Route::get('/admin/create-category', 'Admin\CategoriesController@addCategory')->name('admin.create-category');
Route::get('/admin/edit-category/{categoryId}', 'Admin\CategoriesController@editCategory')->name('admin.edit-category');
Route::post('/admin/update-category', 'Admin\CategoriesController@updateCategory')->name('admin.update-category');
Route::post('/admin/add-category', 'Admin\CategoriesController@postCategory')->name('admin.add-category');
Route::get('admin/delete-category/{categoryId}', 'Admin\CategoriesController@deleteCategory')->name('admin.delete-category');
Route::get('admin/change-status/category/{categoryId}', 'Admin\CategoriesController@changeCategoryStatus')->name('admin.change-status.category');
Route::get('admin/category-detail/{categoryId}', 'Admin\CategoriesController@categoryDetail')->name('admin.category-detail');


///////         END CATEGORIES ROUTES


///////         ROUTES OF STATS
Route::get('/admin/all-stats', 'Admin\StatsController@allStats')->name('admin.all-stats');
Route::get('/admin/create-stat', 'Admin\StatsController@addStat')->name('admin.create-stat');
Route::post('/admin/add-stat', 'Admin\StatsController@postStat')->name('admin.add-stat');
Route::get('admin/delete-stat/{statId}', 'Admin\StatsController@deleteStat')->name('admin.delete-stat');
Route::get('admin/change-status/stat/{statId}', 'Admin\StatsController@changeStatStatus')->name('admin.change-status.stat');
Route::post('admin/change-image', 'Admin\UserController@user_image')->name('admin.change-image');

///////         END STATS ROUTES


Route::post('admin/apply-subscription', 'Admin\Subscription\SubscriptionController@applySubscription')->name('admin.apply-subscription');


Route::get('get-cities/{countryId}', 'AddressController@getCities')->name('get-cities');


Route::post('get-selected-categories-tags','Job\JobController@getSelecetdCateTag');
Route::post('get-categories-tags','Job\JobController@getCateTag');
Route::get('get-tag/{id}','Job\JobController@getTag');
Route::get('get-sub-category/{id}','Job\JobController@getSubCategory');
Route::get('get-inventory_unit','Job\JobController@getInventoryUnit');
Route::post('create-quote','Job\JobController@createQuote')->name('createQuote');


Route::post('create-job','Job\JobController@createJob')->name('createJob');


Route::post('change-country','Job\JobController@changeCountry')->name('changeCountry');


Route::get('jobs','Job\JobController@index')->name('jobs');
Route::get('jobs/data', 'Job\JobController@jobsData')->name('jobs.front-jobs.data');

Route::get('job-detail/{id}','Job\JobController@jobDetail')->name('job-details');


Route::get('profile-wizard','ProfileWizardController@showForm')->name('profile-wizard');
Route::post('user-location-session','User\UserController@createSession')->name('user.create-session');

Route::post('saveProfileWizardForm','ProfileWizardController@saveProfileWizardForm')->name('saveProfileWizardForm');



Route::get('user/getAdsCategories','AddsController@getCategories')->name('user.getAdsCategories');
Route::get('user/getAdsSubCategories/{id}','AddsController@getSubCategories')->name('user.getAdsSubCategories');
Route::get('user/getAdsMaker/{id}','AddsController@getMaker')->name('user.getAdsMaker');

Route::post('user/saveAds','AddsController@saveAds')->name('user.saveAds');
