    @extends('layout-admin.app')
    @section('title','Plan Detail')

    @section('content')
        <div class="body-container">
            @include('admin.Plans.Partials.plan-detail-menu-partial')
            @include('admin.Plans.Partials.plan-detail-partial')
        </div>
        <style>.body {
                background-color: #fff !important;
            }</style>
    @endsection
