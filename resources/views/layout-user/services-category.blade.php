<div class="listing-grid-view-slider only-forlist-page">
    <div id="owl-demo2" class="owl-carousel">


        @foreach($data['professionals'] as $serviceCategory)
            <div class="item">
                <div class="sliderlisting-pad">
                    <div class="listing-grid-slider @if(app('request')->input('category_id') == $serviceCategory->id) active @endif">
								<span class="listing-grid-img">
									<img src="{{asset('main-assets/images/dumy.png')}}" alt="no img">
								</span>
                        <span class="listing-grid-title"><a href="{{route('user.front-services',['category_id'=>$serviceCategory->id])}}">{{$serviceCategory->name}}</a></span>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    <script src="main-assets/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo2");

            owl.owlCarousel({

                itemsCustom : [
                    [0, 1],
                    [450, 1],
                    [600, 1],
                    [700, 2],
                    [1000, 3],
                    [1200, 12],
                    [1400, 12],
                    [1600, 12]
                ],
                navigation : true,
                autoPlay: false, //Set AutoPlay to 3 seconds

            });

        });
    </script>
</div>