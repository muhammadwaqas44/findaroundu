@extends('layout-user.app')

@section('title')
    Chat
@endsection

@section('content')


    @include('layout-user.header')
    @include('layout-user.sidebar')

    <div class="msg-page-main">
        <div class="msg-container">
            <div class="height-newmx">
               @include('User.Chat.Partials.chat-left-section')
                <div class="msg-right-main-div">
                    <div class="top-right-first-msg">

                    </div>
                    <ul class="start-chat-ul">

                    </ul>
                    <div class="abslute-text-div" style="display: none">
                        <form class="message_send_form">
                            <div class="min-iddiv">

                            </div>
                            <div class="min-iddiv2">
                                <span>User is typing...</span>
                            </div>

                            <span class="user_is_typing"></span>
                            <label class="upload-lbel">
                                <span class="paperclip-span"><i class="fas fa-paperclip"></i></span>
                                <input  id="inputFile" name="attachment"  type="file" >
                            </label>
                                @csrf
                                <input type="hidden" name="receiver_id" id="receiver_id">
                                <input class="input-textarea messages" type="text" name="messages" onkeyup="userTyping()">
                                <input  type="button" class="snd-text send_msg_btn" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <img id="loading-image" src="{{asset('main-assets/images/loading_1.gif')}}" style="display: none">


    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

        function userTyping()
        {
            var conversation_id = $('.conversation_id').val();
            var receiver_id =$('#receiver_id').val();
{{--            var url = '{{route('user.is-typing')}}';--}}
{{--var url = "{{url('user/is-typing?receiver_id=4&conversation_id=1')}}";--}}
            $.ajax({

                type: "POST",
                url: "{{route('user.is-typing')}}",
                data: {
                    "_token": "{!! csrf_token() !!}",
                    'conversation_id' : conversation_id,
                    'receiver_id':receiver_id
                },

                success: function (response, status) {
                    if(response.result == 'success')
                    {
//                        clearTimerId = false;
//                        clearInterval = 3000;
//                        console.log(clearTimerId);
//                        alert(clearTimerId);
                        keyupPusher1();
                    }
                }


            });
        }


        var clearInterval = 3000; //0.9 seconds
        var clearTimerId;
        var flag = false;

        function keyupPusher1() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('37ec9026de0559a1e493', {
                cluster: 'ap2',
                forceTLS: true
            });

            var conversation = $('.conversation_id').val();

            var channel_id = '{{Auth::user()->id}}' + "-" + conversation;

//            console.log(clearTimerId);

            var channel = pusher.subscribe(channel_id);
            channel.bind('user_typing', function (data) {
//                alert(JSON.stringify(data));
//                console.log(clearTimerId,flag);
                if(!flag) {

                    $('.min-iddiv2').show();


//                clearTimeout(clearTimerId);

                //restart timeout timer
                    clearTimeout(clearTimerId);
                    clearTimerId = setTimeout(function () {
                        //clear user is typing message
//                        $('.user_is_typing').text('');
                        $('.min-iddiv2').hide();
                    }, clearInterval);
                }
            });
        }

        function pusher() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('37ec9026de0559a1e493', {
                cluster: 'ap2',
                forceTLS: true
            });

            var conversation = $('.conversation_id').val();

            var channel_id = '{{Auth::user()->id}}' + "-" + conversation;

            var channel = pusher.subscribe(channel_id);
            channel.bind('send-chat', function (data) {
//                alert(JSON.stringify(data));
                var dataString = JSON.stringify(data);


                var html = '<li>';
                html += '<span class="chat-start-img2"><img src="' + data.profile_image + '" alt="no img"></span>';
                html += '<div class="online-chat-right2">';
                if (data.type == 'File') {
                    html += '<span class="coment-text">';
                    html += '<a class="downloaded-items clearfix" href="' +  data.file_download + '" download>';
                    html += '<span class="left-1">' +  data.text + '</span>';
                    html += '<span class="right-2"><i class="fas fa-download"></i></span>';
                    html += '</a>';
                    html += '<span class="coment-time">' +  data.created_at + '</span>';
                    html += '</span> ';
                }
                else if(data.type == "Image")
                {
                    html += '<span class="coment-text">';
                    html += '<a class="downloaded-items clearfix" href="' +  data.file_download + '" download>';
                    html += '<img src="'+ data.text+'">';

                    html += '</a>';
                    html += '<span class="coment-time">' +  data.created_at + '</span>';
                    html += '</span> ';

                }
                else {

                    html += '<span class="coment-text">' +  data.text;
                    html += '<span class="coment-time">' +  data.created_at + '</span>';
                    html += '</span> ';
                }
                html += '</div> </li>';

                $('#'+conversation).append(html);

            });
        }
    </script>


    @php
        if(Session::has('time_zone')){
            $timezone = Session::get('time_zone');
            Session::put('is_time-zone_not_set', false);
            }
        else{
            $timezone = "America/New_York";
            Session::put('is_time-zone_not_set', true);
            }
    @endphp

    <script>

        @if( Session::get('is_time-zone_not_set') )
            var visitortimezone = new Date().getTimezoneOffset();
            visitortimezone = visitortimezone == 0 ? 0 : -visitortimezone;

            $.ajax({
                type: "GET",
                url: "{{url('set_time_zone')}}",
                data: 'time='+ visitortimezone,
                success: function(){
                    location.reload();
                }
            });
        @endif

        function getChat(value) {

            $.ajax({

                type: "POST",
                url: "{{route('user.get-messages')}}",
                data: {
                    "_token": "{!! csrf_token() !!}",
                    'conversation_id' : value,
                },

                success: function (response, status) {

                    if (response.result == 'success') {

                        $('#receiver_id').val(response.data.chatRecords.message_receiver.id);

                        var profileImage = '{{Auth::user()->profile_image}}';
                        var html = '';
                        var proposal = '';
                        proposal +='<div class="row" >';
                        proposal += '<div class="col-md-6">';
                        proposal += '<span class="mhsina-asrar" id="name_class">'+$('.msg-title').text()+'</span>';
                        proposal += '<span id="timing_class" style="font-size: 12px;color: #ddd;">'+$('.date-msg').text()+'</span>';
                        proposal += '<i class="far fa-star"></i>';
                        proposal += '<div class="hsptal-mngmnt"></div>';
                        proposal += '</div>';
                        proposal += '<div class="col-md-6" style="text-align: right;">';
                        proposal += '<a class="view-proposals" href="javascript:void(0)">View Proposal</a>';
                        proposal += '<a href="#" class="vedio-cmra"><i class="fas fa-video"></i></a>';
                        proposal += '<a href="#" class="vedio-cmra"><i class="fas fa-phone"></i></a>';
                        proposal += '<div class="mark-unread-main dropdown">';
                        proposal += '<a href="#"><i class="fas fa-file-alt"></i></a>';
                        proposal += '<a href="#"><i class="fas fa-folder"></i></a>';
                        proposal += '<a href="#"><i class="fas fa-user-friends"></i></a>';
                        proposal += '<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>';
                        proposal += '<div class="dropdown-menu dropdown-menu-right">';
                        proposal += '<a class="dropdown-item" href="#">Link 1</a>';
                        proposal += '<a class="dropdown-item" href="#">Link 2</a>';
                        proposal += '<a class="dropdown-item" href="#">Link 3</a>';
                        proposal +='</div></div> </div> </div>';

                        $('.top-right-first-msg').html(proposal);


                        $.each(response.data.chatRecords.chat_message,function(key,value){

                            if(value.user_id != response.data.chatRecords.current_user_id) {
                                $('.start-chat-ul').attr('id', value.conversation_id);
                                $('#receiver_id').val(value.user_id);
                                html += '<li>';
                                html += '<span class="chat-start-img"><img src="' + value.other_user_image + '" alt="no img"></span>';
                                html += '<div class="online-chat-right">';
                                if (value.type == 'File') {
                                    html += '<span class="coment-text">';
                                    html += '<a class="downloaded-items clearfix" href="' + value.file_download + '" download>';
                                    html += '<span class="left-1">' + value.real_file_name + '</span>';
                                    html += '<span class="right-2"><i class="fas fa-download"></i></span>';
                                    html += '</a>';
                                    html += '<span class="coment-time">' + value.created_at + '</span>';
                                    html += '</span> ';
                                }
                                else if(value.type == "Image")
                                {
                                    html += '<span class="coment-text">';
                                    html += '<a class="downloaded-items clearfix" href="' + value.file_download + '" download>';
                                    html += '<img src="/'+value.messages+'">';

                                    html += '</a>';
                                    html += '<span class="coment-time">' + value.created_at + '</span>';
                                    html += '</span> ';

                                }
                                else {

                                    html += '<span class="coment-text">' + value.messages;
                                    html += '<span class="coment-time">' + value.created_at + '</span>';
                                    html += '</span> ';
                                }
                                html += '</div> </li>';
                            }
                            else{
                                html +='<li>';
                                html += '<span class="chat-start-img2"><img src="'+profileImage+'" alt="no img"></span>';
                                html += '<div class="online-chat-right2">';
                                if (value.type == 'File') {
                                    html += '<span class="coment-text2">';
                                    html += '<a class="downloaded-items clearfix" href="' + value.file_download + '" download>';
                                    html += '<span class="left-1">' + value.real_file_name + '</span>';
                                    html += '<span class="right-2"><i class="fas fa-download"></i></span>';
                                    html += '</a>';
                                    html += '<span class="coment-time2">' + value.created_at + '</span>';
                                    html += '</span> ';
                                }
                                else if(value.type == "Image")
                                {
                                    html += '<span class="coment-text2">';
                                    html += '<a class="downloaded-items clearfix" href="' + value.file_download + '" download>';
                                    html += '<img src="/'+value.messages+'">';

                                    html += '</a>';
                                    html += '<span class="coment-time2">' + value.created_at + '</span>';
                                    html += '</span> ';

                                }
                                else {

                                    html += '<span class="coment-text2">' + value.messages;
                                    html += '<span class="coment-time2">' + value.created_at + '</span>';
                                    html += '</span> ';
                                }
                                html +='</div> </li>';
                            }

                        });

                        html += '<input type="hidden" name="conversation_id" value="'+response.data.chatRecords.conversation.id+'" class="conversation_id">';

                        $('.start-chat-ul').html(html);
                        $('.abslute-text-div').show();

                        pusher();
                        keyupPusher1();

                    }
                }

            });
        }

        var globalFormData = new FormData();

        $('#inputFile').change( function(event) {
            var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
            var fileName = files.name;
            var fsize = files.size;
            var tmppath = URL.createObjectURL(files);
            var ext = fileName.split('.').pop().toLowerCase();

            if(ext == 'jpg' || ext == 'png')
            {
                $('.min-iddiv').show();
                var html = '<span class="close-spn-close"><img class="preview-imgs" src="'+tmppath+'"></span>';
                globalFormData.append('attachment[]',files);
                $('.min-iddiv').append(html);
            }
            else{
                $('.min-iddiv').show();

                var html = '<a class="downloaded-items1234 clearfix file_download" href="#"><span class="left-1">'+fileName+'</span></a>';
                globalFormData.append('attachment[]',files);
                $('.min-iddiv').append(html);
            }

        });

        $('document').ready(function () {

            $('.message_send_form').submit(function(e){
               e.preventDefault();
            });


            $('.send_msg_btn').click(function(){

                var token = '{!! csrf_token() !!}';
//                var data = new FormData($('.message_send_form')[0]);

                globalFormData.append('messages',$('.messages').val());

                var conversation = $(this).parents('div').siblings('ul.start-chat-ul').find('.conversation_id').val();

                globalFormData.append('conversation_id',conversation);
                globalFormData.append('_token',token);
                globalFormData.append('receiver_id',$('#receiver_id').val());


                $.blockUI({ css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                } });


                $.ajax({

                    type: "POST",
                    url: "{{route('user.save-messages')}}",
                    data: globalFormData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function (response, status) {
                        $.unblockUI();

                        $.each(response.data.chat_message, function (key, chatMessage) {

                            var profileImage = '{{Auth::user()->profile_image}}';
                            $('#li-id-' + conversation).find($('.date-msg')).text(chatMessage.sidebar_time);

                            var html = '<li>';
                            html += '<span class="chat-start-img2"><img src="' + profileImage + '" alt="no img"></span>';
                            html += '<div class="online-chat-right2">';
                            if (chatMessage.type == 'File') {

                                html += '<span class="coment-text2">';
                                html += '<a class="downloaded-items clearfix" href="' + chatMessage.file_download + '" download>';
                                html += '<span class="left-1">' + chatMessage.real_file_name + '</span>';
                                html += '<span class="right-2"><i class="fas fa-download"></i></span>';
                                html += '</a>';
                                html += '<span class="coment-time2">' + chatMessage.created_at + '</span>';
                                html += '</span> ';

                            }
                            else if(chatMessage.type == "Image"){
                                html += '<span class="coment-text2">';
                                html += '<a class="downloaded-items clearfix" href="' + chatMessage.file_download + '" download>';
                                html += '<img src="'+ chatMessage.file_download +'">' ;
                                html += '</a>';
                                html += '<span class="coment-time2">' + chatMessage.created_at + '</span>';
                                html += '</span> ';
                            }
                            else {
                                html += '<span class="coment-text2">' + chatMessage.messages;
                                html += '<span class="coment-time2">' + chatMessage.created_at + '</span>';
                                html += '</span> ';
                            }

                            html += '</div> </li>';

                            globalFormData.delete('attachment[]');
                            globalFormData.delete('messages');
                            globalFormData.delete('_token');
                            globalFormData.delete('conversation_id');
                            globalFormData.delete('receiver_id');

                            $('.messages').val('');
                            $('.preview-imgs').remove();
                            $('.start-chat-ul').append(html);
                            $('.file_download').remove();

                        });

                    }

            });

        });

        });

    </script>


@endsection

