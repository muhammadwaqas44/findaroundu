


<script>
    $(document).ready(function() {
        <!--drop down-->
        $(".form-control").select2({
        });
        <!--scroll-->
        $('.toggle-side-bar').click(function(e) {
            $('.left-side-bar, .body-container').toggleClass('active');
        });
        $('.nav-main li a[data-target]').click(function(e) {

            if($(window).width() < 769 && !$(this).hasClass('collapsed'))
            {
                $('.left-side-bar, .body-container').addClass('active');
            }
        });
    });
</script>
<script src="{{asset('main-admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('main-admin/js/select2.full.min.js')}}"></script>