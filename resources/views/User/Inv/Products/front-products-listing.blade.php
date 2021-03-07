@extends('layout.app')

@section('content')
    @include('layout-user.front-top-menu')
    @component('layout-user.search-header-products',['data'=>$data])
    @endcomponent

    <div class="body-container">
        <div class="custom-container">
            <div class="main-products">
                <div class="tab-content">
                    <div id="All-Products" class="tab-pane active">
                        <div class="index-tab-in-main">
                            <div class="row">
                                @foreach($data['all_products']['all_products'] as $product)
                                    @component('User.Inv.Products.Partials.front-listing-products-partial',['product' => $product])
                                    @endcomponent
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









@endsection