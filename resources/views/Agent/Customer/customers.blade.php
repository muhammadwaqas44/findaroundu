@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('layout-admin.header')
        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="menu-setup-main">
                <span class="all-setup-text">Menu Main Company</span>
                <div class="menu-setup-left">
                    <div class="setup-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Actions"><i class="fas fa-cog"></i> General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " onclick="getSetupsData('all-users')" data-toggle="tab" href="#all-users"><i class="fas fa-cog"></i> Users</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="Actions" class="container tab-pane active">
                                <ul class="setup-ul">
                                    <li><a href="#"><strong>Countries</strong></a></li>
                                    <li><a href="#">Cities</a></li>
                                    <li><a href="#">Business Category</a></li>
                                    <li><a href="#">Individual Category</a></li>
                                    <li><a href="#">Footer Settings</a></li>
                                </ul>
                            </div>
                            <div id="all-users" class="container tab-pane fade">
                                <ul class="setup-ul">
                                    <li><a href="#" onclick="getSetupsData('all-users')"><strong>All Users</strong></a></li>
                                    <li><a href="#">Blocked Users</a></li>
                                    <li><a href="#">Active Users</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="menu-setup-right3">
                    <div class="border-box" style="margin-top:0px;">
                        <div class="tab-content" id="setups-tab-content">
                            <div class="tab-pane active" id="setups">

                                <div id="setup-table"> </div>
                            </div>


                        </div>


                    </div>
                </div>
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