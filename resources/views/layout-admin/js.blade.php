


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

    function showLoader(){
        $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            } });
    }

    function hideLoader(){
        $.unblockUI();
    }

    function successMsg(_msg){
        window.toastr.success(_msg);
    }

    function errorMsg(_msg){
        window.toastr.error(_msg);
    }

    function warningMsg(_msg){
        window.toastr.warning(_msg);
    }
</script>

<script src="{{asset('main-admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('main-admin/js/select2.full.min.js')}}"></script>
<script src="{{asset('main-admin/js/block_ui.min.js')}}"></script>
<script src="{{asset('main-admin/js/toastr.min.js')}}"></script>
