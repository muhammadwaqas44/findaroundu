@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('layout-admin.header')
        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="menu-setup-main">
                <span class="all-setup-text">Dashboard</span>

            </div>
        </div>
    </div>


    <script>
        $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file2');
            file.trigger('click');
        });
        $(document).on('change', '.file2', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>

    @include('layout-admin.setup-js')
@endsection