@extends('layout-user.app')
{{--@section('user-portal-heading','My Dashboard')--}}
@section('content')


{{--    @include('layout-user.user-portal-heading')--}}

    <div class="body-container">
        @include('layout-user.header')
        <div class="dashboard-main">
            @include('layout-user.sidebar')
        </div>
        <div class="wizard-page-main">
            <div class="container">
                <form method="post" action="{{route('saveProfileWizardForm')}}" enctype="multipart/form-data">
                    @csrf
                    <!--step1-->
                    <div class="profile-wizard-page" id="step1-wizard">
                       @include('ProfileWizard.Partials.step1')
                    </div>
                    <!--step1-->
                    <!--step2-->
                    <div class="profile-wizard-page" id="step2-wizard">
                       @include('ProfileWizard.Partials.step2')
                    </div>
                    <!--step2-->
                    <!--step3-->
                    <div class="profile-wizard-page" id="step3-wizard">
                       @include('ProfileWizard.Partials.step3')
                    </div>
                    <!--step4-->
                    <div class="profile-wizard-page" id="step4-wizard">
                        @include('ProfileWizard.Partials.step4')
                    </div>
                    <!--step4-->
                    <!--step5-->
                    <div class="profile-wizard-page" id="step5-wizard">
                       @include('ProfileWizard.Partials.step5')
                    </div>
                    <!--step5-->
                    <!--step6-->
                    <div class="profile-wizard-page" id="step6-wizard">
                       @include('ProfileWizard.Partials.step6')
                    </div>
                    <!--step6-->
                </form>
            </div>
        </div>


    </div>




<script>


    var category_array = [];
    var i =0;
    var j= 0;

    $(document).ready(function() {
        $('.mega-container .border-lft a').hover(function(){
            var target=$(this).attr('href');
            $(this).parents('.mega-container').find('.novis-img').hide();
            $('#'+target).show();
        });
        $('.menu').click(function(){
            $('.navigation-main').slideToggle(700);
        });
        $('.tggl-icon').click(function(e) {
            $('.new-active.db-left-ul, .tggl-icon, .body-container').toggleClass('new-active');
        });
        ////select2
//        $(".form-control").select2({
//        });
        $('body').on('DOMNodeInserted', '#tag_id', function () {
            $(this).select2();
        });
        $("#tag_id").select2();
        ///form step

        $('#pre-one').click(function(){
            $('#step1-wizard').show(0);
            $('#step2-wizard').hide(0);
        });

        $('#pre-two').click(function(){
            $('#step2-wizard').show(0);
            $('#step3-wizard').hide(0);
        });

        $('#pre-four').click(function(){
            $('#step3-wizard').show(0);
            $('#step4-wizard').hide(0);
        });
        $('#pre-five').click(function(){
            $('#step4-wizard').show(0);
            $('#step5-wizard').hide(0);
        });

        $('#pre-six').click(function(){
            $('#step5-wizard').show(0);
            $('#step6-wizard').hide(0);
        });
        initSelect2Widgets();

    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputFile").change(function () {
        readURL(this);
    });

    var initSelect2Widgets = function(){
//        console.log('ssa');
        $(".form-control").select2();
    }
</script>

@endsection