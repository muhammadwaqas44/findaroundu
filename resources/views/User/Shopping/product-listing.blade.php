@extends('layout-user.app')
@section('title','Products Listing')

@section('content')

    <header class="header-container">
        @include('layout-user.header')
        @include('User.Shopping.Partials.filter')
    </header>]

    <div class="body-container gray-bg">

        <div class="custom-container">
            <div class="main-products">
                <div class="listing-grid-view-main2">

                    <div class="row">
                        @include('User.Shopping.Partials.categories_listing')

                        @include('User.Shopping.Partials.product_list')
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
