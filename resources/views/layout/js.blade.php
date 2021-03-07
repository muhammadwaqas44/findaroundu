





<script src="{{asset('main-assets/js/jquery.flexisel.js')}}" type="text/javascript"></script>
<script src="{{asset('main-assets/js/jquery-ui.js')}}" type="text/javascript"></script>
<script src="{{asset('main-assets/js/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{asset('main-assets/js/jquery.uploadfile.js')}}" type="text/javascript"></script>
<script src="{{asset('main-assets/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('main-user/js/jquery.validate.js')}}"></script>







<script>
        $("#flexiselDemo3").flexisel({
            visibleItems: 7,
            itemsToScroll: 3,
            animationSpeed: 1000,
            infinite: true,
            navigationTargetSelector: null,
            autoPlay: {
                enable: true,
                interval: 5000,
                pauseOnHover: true
            },
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1,
                    itemsToScroll: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3,
                    itemsToScroll: 3
                }
            },

        });



        $("#flexiselDemo4").flexisel({
            visibleItems: 4,
            itemsToScroll: 3,
            animationSpeed: 1000,
            infinite: true,
            navigationTargetSelector: null,
            autoPlay: {
                enable: true,
                interval: 5000,
                pauseOnHover: true
            },
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1,
                    itemsToScroll: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 2,
                    itemsToScroll: 3
                }
            },

        });




    </script>
<script>
    $(document).ready(function(){

        $('.show-menu-drop').click( function(e) {

            e.preventDefault(); // stops link from making page jump to the top
            e.stopPropagation(); // when you click the button, it stops the page from seeing it as clicking the body too
            $('.menu-drop4').toggle();

        });

        $('.menu-drop4').click( function(e) {

            e.stopPropagation(); // when you click within the content area, it stops the page from seeing it as clicking the body too

        });

        $('body').click( function() {

            $('.menu-drop4').hide();

        });

    });
</script>
<script>
    $(document).ready(function(){
        $('#click-btnn').click(function(){
            $('.input-showclick').toggle();
        });
    });
</script>
<script>

    $(document).ready(function() {

        $(window).scroll(function() {
            //alert(jQuery(this).scrollTop());

            if($(this).scrollTop() > 150)
            {
                $(".hide-li").hide();
                $(".search-bar").show();
            }
            if($(this).scrollTop() < 150)
            {
                $(".hide-li").show();
                $(".search-bar").hide();
            }
        });

    });

</script>





{{--<script src="{{asset('project-assets/js/materialize.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('project-assets/js/custom.js')}}"></script>--}}


