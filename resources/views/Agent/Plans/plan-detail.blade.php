    @extends('layout-agent.app')
    @section('title','Plan Detail')

    @section('content')
        <div class="body-container">
            @include('agent.Plans.Partials.plan-detail-menu-partial')
            @include('agent.Plans.Partials.plan-detail-partial')
        </div>
        <style>.body {
                background-color: #fff !important;
            }</style>
    @endsection
