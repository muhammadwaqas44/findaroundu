<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @include('layout-user.css')

</head>
<body class="body ">


@yield('content')



@if(Route::currentRouteName() != "user.front-addons" && Route::currentRouteName() != "verification.notice" && Route::currentRouteName() != "user.dashboard" && Route::currentRouteName() != "user.front-packages" && Route::currentRouteName() != "user.profile" && Route::currentRouteName() != "user.front-message")

    @include('layout.footer')
@endif



@include('layout-user.js')


<script>

    $(document).on('click', '.selected_category_top', function () {
        var categoryId = $(this).attr('cat-id-top');
        $('#category_id_top').val(categoryId);
        $('#selected-category-text-top').html($(this).attr('cat-name-top'));

    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_KEY')}}&js?sensor=false&libraries=places&extn=.js"></script>
@include('home.Partials.job_popup')
@include('User.Adds.create-add')

@include('layout.map-autocomplete-business-popup-js')
@include('home.Partials.business_popup')




@include('layout.map-autocomplete-js')
@include('layout.map-autocomplete-business-popup-js')
@include('User.Adds.Partials.map-autocomplete-add-popup-js')

<script>
        @if(!Session::has('location'))
            getLocation();
        @else
            getHomePageRecords();
        @endif
            //

</script>





</body>
</html>
