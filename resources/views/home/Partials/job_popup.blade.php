<style>
    .pac-logo{
        z-index: 999999 !important;
    }
    #map {
        height: 425px;
    }


</style>
<div class="modal" id="main-gl-account" role="dialog" style="background: rgba(0,0,0,.9);">
    <div class="account-popup">
        <form class="form_fau_job">
            @csrf
            <h1 class="task-title">Lorem Ipsum is simply Dummy Text</h1>
            <div class="popup-form-main">
                <div class="flex-container">
                    <div class="flexible">
                        <a href="#" id="one-step" class="active">1<br> Step</a>
                    </div>
                    <div class="flexible">
                        <a href="#" id="two-step">2<br> Step</a>
                    </div>
                    <div class="flexible">
                        <a href="#" id="three-step">3<br> Step</a>
                    </div>
                </div>
                <div id="step1">
                    <div class="step1-main">

                        <span class="want-sell-text">Category</span>
                        <span class="drop-down-popup">
							<select name="category_id" onchange="getCatTag(this.value)" class="selection_box" id="job_category_id">
                                {{--{{dd($data['individual_popular'])}}--}}
                                <option value="">Select Work</option>
                                @foreach($data['category'] as $key=>$professional)
                                    <option value="{{$professional->id}}">{{$professional->name}}</option>
                                @endforeach

							</select>
						</span>
                        <span class="category_id_error" style="display: none">Please select the value.</span>




                        <span class="tast-title">For Task</span>
                        <input type="text" placeholder="" class="tast-input-field" name="task_name">
                        <span class="task_name_error" style="display: none">Please enter task name.</span>

                        <span class="tast-title">Describe your task in more detail</span>



                        <div class="popup-tabs-main">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#text">Text <i class="fas fa-text-height"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Video">Video <i class="fas fa-video"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Audio">Audio <i class="fas fa-microphone"></i></a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="text" class="tab-pane active">
                                    <textarea class="step1-textarea" name="description" placeholder="e.g Clean my car outside and inside, I will supply all the materials."></textarea>
                                </div>
                                <div id="Video" class="tab-pane fade">
                                    <div class="upload-video-main">
                                        <div class="video-in-main">
                                            <span class="upload-img"><img src="{{asset('main-assets/images/upload_video_icon.png')}}" alt="no img"></span>
                                            <span class="already-img">Alread have a video?</span>
                                            <label class="file_upload_btn"><input type="file" name="video" id="video"><span>Upload it!</span></label>

                                        </div>

                                    </div>
                                </div>
                                <div id="Audio" class="tab-pane fade">
                                    <div class="upload-video-main">
                                        <div class="video-in-main">
                                            <span class="upload-img"><img src="{{asset('main-assets/images/upload_audio_icon.png')}}" alt="no img"></span>
                                            <span class="already-img">Alread have an audio?</span>
                                            <label class="file_upload_btn"><input type="file" name="myFile" name="audio" multiple><span>Upload it!</span></label>

                                            <!--audio record html-->
                                            <div class="demo">

                                                <h1>AudioRecorder</h1>
                                                <p>Here a little demo application that makes use of the simple audio recording jQuery plugin and its custom events. In this example the audio data gets inserted as base64 encrypted files, however it would be just as simple to save the blob or an acutal mp3 file on the server side.</p>
                                                <p>Feel free to test it :)</p>

                                                <div class="new-message">
                                                    <div class="message-box"><span class="onair"><span class="icon icon-recording"></span> Recording audio:</span> <span class="timer"></span></div>
                                                    <textarea class="message-box" rows=1 placeholder="Type your message..."></textarea>
                                                    <button class="audio" type="button"><span class="icon icon-mic"></span></button>
                                                    <button class="send"><span class="icon icon-send"></span></button>
                                                </div>
                                                <div class="messages"></div>

                                            </div>
                                            <!--audio record html-->
                                            <ul class="use-video-ul">
                                                <li><button type="button">Use Video</button></li>
                                                <li><button type="button">Upload Again</button></li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <span class="video_audio_error" style="display: none">Please enter atlease one of these fields.</span>

                        </div>

                        <span class="tast-title">Task Tags</span>
                        <span class="search-drop-down7">
						<select  multiple name="tags" id="tags">
                            <option value="0">Select Tag</option>

						</select>
                       <span class="tags_error" style="display: none">Please select tag.</span>

					</span>

                    </div>
                    <a href="#" class="arrow-right" id="first-step-btn"><i class="fas fa-arrow-right"></i></a>
                </div>

                <div id="step2">
                    <span class="tast-title">What type of task is it?</span>
                    <div class="checkbox-mainpopup">
                        <div class="row">
                            <div class="col-6">
                                <div class="physical-main">
                                    <label class="collection-radio2">
                                        <input type="radio" name="type" value="physical" onclick="locationCheck(this.value)">Physical<span></span>
                                    </label>
                                    <p class="tasker-text">Tasker is required to visit “Task Location” to complete the job.</p>
                                    <span class="loc-icon"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="physical-main">
                                    <label class="collection-radio2">
                                        <input type="radio" name="type" value="online" onclick="locationCheck(this.online)">Online<span></span>
                                    </label>
                                    <p class="tasker-text">Tasker can work from anywhere, no need to be on physical location.</p>
                                    <span class="loc-icon"><i class="fas fa-globe-asia"></i></span>
                                </div>
                            </div>
                            <span class="type_error" style="display: none">Please select type.</span>

                        </div>
                    </div>

                    <div class="showHideDiv">

                        <div style="width: 100%;float: left;">
                        <div class="row">

                            <div class="col-6">
                                <span class="tast-title">Task City</span>
                                <select name="city_id" id="city" class="selection_box">
                                    @foreach($data['city'] as $city)
                                        @if(Session::has('location.cityId'))
                                            <option value="{{$city->id}}" {{ $city->id == Session::get('location.cityId') ? 'selected':''  }}>{{$city->name}}</option>
                                        @else
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <span class="tast-title">Task Location</span>
                                <input type="search"  placeholder="" class="tast-input-field" name="location" id="fau_job_location">
                            </div>

                        </div>
                        </div>

                        <span class="location_error" style="display: none">Please location.</span>


                        <input type="hidden" name="lat" class="lat">
                        <input type="hidden" name="lng" class="lng">

                        <div class="step2-map">
                            <div id="map"></div>
                        </div>
                    </div>

                    <span class="tast-title">Date</span>
                    <input type="text" class="tast-input-field" style="margin-bottom: 40px;" name="date">
                    <span class="date_error" style="display: none">Please enter date.</span>

                    <a href="#" class="arrow-right" id="second-step-btn"><i class="fas fa-arrow-right"></i></a>
                    <a href="#" class="arrow-right2" id="second-step-back"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div id="step3">

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <span class="tast-title">How many people do you need for your task?</span>
                            <input type="number" placeholder="1" class="required-man people_total" name="number_of_people" onkeyup="multiplyFunction()">
                            <span class="number_error" style="display: none">Please type number of people</span>

                            <span class="Taskers-how-much">Taskers</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <span class="tast-title" style="margin-top: 20px;">What's your budget?</span>
                            <input type="number" class="required-man budget" name="budget" onkeyup="multiplyFunction()">
                            <span class="budget_error" style="display: none">Please give your budget.</span>
                            <span class="Taskers-how-much">Rs</span>
                        </div>
                    </div>

                    <!--
                                           <span class="tast-title" style="margin-top: 20px;">Do you have promo code?</span>
                                           <input type="text" class="required-man">
                                           <button type="button" value="send" class="apply-btn-popup">Apply</button>
                    -->
                    <span class="estimate-cost">Estimated Budget: Rs 0</span>

                    <span class="submit-formpopup">
               			<input type="button" value="Submit" class="submit_btn">
               		</span>
                    <a href="#" class="arrow-right2" id="third-step-back"><i class="fas fa-arrow-left"></i></a>
                </div>


            </div>
        </form>
    </div>
</div>


<link rel="stylesheet" href="{{asset('main-assets/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('main-assets/icons/style.css')}}">

<script src="{{asset('main-assets/js/audiorecorder.js')}}"></script>
<script src="{{asset('main-assets/js/timer.js')}}"></script>

{{--<script src="{{asset('main-assets/js/audiorecorder_worker_mp3.js')}}"></script>--}}
{{--<script src="{{asset('main-assets/js/audiorecorder.js')}}"></script>--}}

<script>

    var recorder;
    @if(Auth::check())

        @if(Session::has('openModal'))
             $('#openModal').trigger('click');
        @endif

       $(document).on('click','#openModal',function(){
            recorder.init();
            $('#main-gl-account').modal();

        });

    @else

       $(document).on('click','#openModal',function(){
           var html = '<input type="hidden" name="openJobModal" value="openModal">';
           $('#loginModal form').append(html);
           $('#loginModal').modal('show');
       });
    @endif

    var date = new Date();
    date.setDate(date.getDate()-1);
    $('input[name="date"]').datepicker({ minDate: new Date() });



    $('#first-step-btn').click(function(){
        var flag = 0;


        if($('#job_category_id').val() == '' || $('#job_category_id').val() == 0) {
            $('.category_id_error').show();
            flag++;
        }
        else{
            $('.category_id_error').hide();
        }


        if($('input[name="task_name"]').val() == '')
        {

            $('.task_name_error').show();
            flag++;
        }
        else{
            $('.task_name_error').hide();
        }


        if($('#tags').val() == '')
        {

            $('.tags_error').show();
            flag++;
        }
        else{
            $('.tags_error').hide();
        }



        if($('.step1-textarea').val().length == 0 &&
            document.getElementById("video").files.length != 0 &&
            $("input[name='audio']").val() == '' )
        {

            $('.video_audio_error').show();
            flag++;
        }
        else{
            $('.video_audio_error').hide();
        }


        if(flag != 0)
        {
            return false;
        }

        $('#step1').hide();
        $('#step2').show();
        $('#one-step').removeClass('active');
        $('#two-step').addClass('active');
        job_map();
    });

    $('#second-step-btn').click(function(){
        var flag = 0;

        if(!$("input[name='type']:checked").val()) {
            $('.type_error').show();
            flag++;
        }
        else{
            $('.type_error').hide();
        }


        if($("input[name='type']:checked").val() != 'online') {

            if ($('input[name="location"]').val() == '') {
                $('.location_error').show();
                flag++;
            }
            else {
                $('.location_error').hide();
            }


            if ($('input[name="lat"]').val() == '' && $('input[name="lng"]').val() == '') {
                $('.location_error').show();
                flag++;
            }
            else {
                $('.location_error').hide();
            }
        }
        if($('input[name="date"]').val() == '')
        {
            $('.date_error').show();
            flag++;
        }
        else{
            $('.date_error').hide();
        }

        if(flag != 0) {
            return false;
        }

        $('#step2').hide();
        $('#step3').show();
        $('#two-step').removeClass('active');
        $('#three-step').addClass('active');
    });

    $('#third-step-back').click(function(){

        $('#step3').hide();
        $('#step2').show();
        $('#three-step').removeClass('active');
        $('#two-step').addClass('active');
    });
    $('#second-step-back').click(function(){
        $('#step2').hide();
        $('#step1').show();
        $('#two-step').removeClass('active');
        $('#one-step').addClass('active');
    });
</script>


<script>


//    $(document).ready( function(){
//
//        $('div.message-box').hide();
//        var timers = [];
//
//        function addMessage(type, val){
//            var message = document.createElement('div');
//            message.className = 'message message-' + type;
//
//            var timestamp = document.createElement('div');
//            timestamp.className = 'timestamp';
//            var now = new Date();
//            var hours = now.getHours();
//            var am = 'am';
//            if( hours > 12 ){
//                hours -= 12;
//                am = 'pm';
//            }
//            timestamp.innerHTML = now.getFullYear() + '/' + ( '00' + ( now.getMonth() + 1 ) ).substr(-2) + '/' + ( '00' + now.getDate() ).substr(-2) + ' ' + ( '00' + hours ).substr(-2) + ':' + ( '00' + now.getMinutes() ).substr(-2) + am
//            message.appendChild(timestamp);
//
//            switch(type){
//                case 'text':
//                    var content = document.createElement('div');
//                    content.className = 'content';
//                    content.innerHTML = val.message.replace(/\n/g, '<br>');
//                    message.appendChild(content);
//                    break;
//                case 'audio':
//                    var content = document.createElement('div');
//                    content.className = 'content loading';
//                    content.setAttribute('id', 'uuid_' + val.uuid);
//                    content.setAttribute('data-uuid', val.uuid);
//                    content.setAttribute('data-duration', val.duration);
//
//                    var control = document.createElement('div');
//                    control.className = 'audio-control loading';
//
//                    var playtoggle = document.createElement('button');
//                    playtoggle.className = 'playtoggle icon-play_arrow';
//                    playtoggle.type = 'button';
//                    control.appendChild(playtoggle);
//
//                    var duration = document.createElement('div');
//                    duration.className = 'duration';
//                    var played = document.createElement('div');
//                    played.className = 'duration-played';
//                    duration.appendChild(played);
//                    control.appendChild(duration);
//
//                    var timer = document.createElement('span');
//                    timer.className = 'timer';
//                    timer.innerHTML = 'Loading...';
//                    control.appendChild(timer);
//                    content.appendChild(control);
//
//                    message.appendChild(content);
//                    break;
//            }
//
//            $('.messages').prepend(message);
//        }
//
//        function adjustTextareaHeight( obj ){
//            $(obj).height(1);
//            if( $(obj)[0].scrollHeight != $(obj).outerHeight(true) && $(obj)[0].scrollHeight > 50 ){
//                $(obj).outerHeight( $(obj)[0].scrollHeight );
//            } else {
//                $(obj).outerHeight( 50 );
//            }
//        }
//
//        function saveAudio(uuid, blob, base64){
//            // console.log(base64,blob);
//            var url = 'data:audio/mp3;base64,' + base64;
//            var message_content = $('#uuid_' + uuid);
//            var duration_played = message_content.find('.duration .duration-played');
//
//            var audio = document.createElement('audio');
//            audio.setAttribute('volume', 4);
//
//            audio.addEventListener('timeupdate', function(e){
//                var percent = audio.currentTime / audio.duration * 100;
//                duration_played.css({ 'width':percent + '%' });
//            });
//
//            var source = document.createElement('source');
//            source.setAttribute('type','audio/mpeg');
//            source.src = url;
//            audio.appendChild(source);
//
//            var html = '<input type="hidden" name="audio" value="'+url+'">';
//            $('#Audio').append(html);
//
//
//            $(message_content).append(audio);
//            timers[uuid] = message_content.find('.timer').timer();
//            timers[uuid].set( $(message_content).attr('data-duration') );
//
//            $(message_content).find('.loading').removeClass('loading');
//
//            $('.audio').hide();
//        }
//
//        recorder = $.audioRecorder({
//            onaccept:function(){
//                $('button.send').hide();
//                $('button.audio').attr('data-accepted',1).show();
//            },
//            onsuccess:saveAudio,
//            onerror:function(e){
//                console.log('error occured', e);
//            }
//        });
//        recorder.init();
//
//        var timer = $('.message-box .timer').timer();
//        $('.new-message button.audio').on('mousedown', function(){
//            $(this).addClass('recording')
//            $('div.message-box').show();
//            $('textarea.message-box').hide();
//            timer.clear();
//            timer.start();
//            recorder.start();
//        }).on('mouseup', function(){
//            $(this).removeClass('recording')
//            $('div.message-box').hide();
//            $('textarea.message-box').show();
//            timer.stop();
//            recorder.stop();
//            console.log('timer stopped', timer.duration);
//            addMessage('audio', {uuid:recorder.uuid, duration:timer.duration});
//        });
//
//        $('.new-message button.send').on('click', function(){
//            if( $('textarea.message-box').val() > '' ){
//                addMessage('text', {message:$('textarea.message-box').val()});
//                $('textarea.message-box').val('').outerHeight(50);
//                if( $('button.audio').attr('data-accepted') == 1 ){
//                    $('button.send').hide();
//                    $('button.audio').show();
//                }
//            }
//        });
//
//        $('.messages').on('click', '.audio-control button.playtoggle', function(){
//            var playtoggle = $(this);
//            var message = playtoggle.closest('.message');
//            var content = message.find('.content');
//            var uuid = content.attr('data-uuid');
//            var audio = message.find('audio').get(0);
//            var timer = message.find('.timer');
//            var duration_played = content.find('.duration .duration-played');
//            var $timer = timers[uuid];
//
//            console.log('click', $timer);
//
//            if( !audio || !audio.play ){
//                return;
//            }
//
//            if( playtoggle.hasClass('icon-play_arrow') ){
//                if( !playtoggle.hasClass('started') ){
//                    $timer.set(0);
//                    duration_played.width(0);
//                }
//                $timer.start();
//                audio.play();
//                playtoggle.removeClass('icon-play_arrow').addClass('icon-pause').addClass('started');
//            } else {
//                audio.pause();
//                $timer.pause();
//                playtoggle.addClass('icon-play_arrow').removeClass('icon-pause');
//            }
//
//            audio.addEventListener('ended', function(){
//                playtoggle.addClass('icon-play_arrow').removeClass('icon-pause').removeClass('started');
//                $timer.stop();
//                $timer.set( content.attr('data-duration' ) );
//                duration_played.css({ 'width':'100%' });
//            });
//
//        });
//
//        $('textarea.message-box').on('keyup', function(e){
//            adjustTextareaHeight( $(this) );
//            if( $(this).val() > '' && $('button.send').is(':hidden') ){
//                $('button.send').show();
//                $('button.audio').hide();
//            } else if( $(this).val() == '' && $('button.audio').is(':hidden') && $('button.audio').attr('data-accepted') == 1 ){
//                $('button.send').hide();
//                $('button.audio').show();
//            }
//        }).on('keydown', function(e){
//            adjustTextareaHeight( $(this) );
//        });
//
//    });



    $(document).ready(function () {

        $("#tags").select2({
            maximumSelectionLength: 7
        });

//        var globalFormData = new FormData();
        $('#video').change( function(event) {
            var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
            var fileName = files.name;
            var fsize = files.size;
            var tmppath = URL.createObjectURL(files);
            var ext = fileName.split('.').pop().toLowerCase();

            if(ext == 'mp4')
            {
//                globalFormData.append('video',files);
                alert('save in form data');
            }

        });

        $('.submit_btn').click(function(){

            var flag = 0;

            if($('input[name="number_of_people"]').val() == '')
            {
                $(".number_error").show();
                flag++;
            }
            else{
                $(".number_error").hide();
            }

            if($('input[name="budget"]').val() == '')
            {
                $(".budget_error").show();
                flag++;
            }
            else{
                $(".budget_error").hide();
            }

            if(flag != 0)
            {
                return false;
            }


            var token = '{!! csrf_token() !!}';

            var globalFormData = new FormData($('.form_fau_job')[0]);


            $.ajax({

                type: "POST",
                url: "{{route('createJob')}}",
                data: globalFormData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response, status) {

                    if(response.result == 'success')
                    {
                        alert(response.message);
                        $('.form_fau_job')[0].reset();
                        $('#main-gl-account').modal('hide');
                        $('#step3').hide();
                        $('#step1').show();
                        $('input[name="audio"]').remove();
                    }

                }
            });
        });


    });



    function getCatTag(value) {

        if(value != '')
        {

            var urld = "{{url('get-tag')}}/" + value;

            $.get(urld, function (data, status) {

                var alltags = '';
                $.each(data, function (index, value) {
                    $.each(value, function (index1, value1) {
                        alltags += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                    });
                });

                $("#tags").html(alltags);


            });
        }


    }

    function multiplyFunction() {

        var budget = $('.budget').val();
        var total_people = $('.people_total').val();

        if(budget == '')
        {
            budget = 0;
        }
        if(total_people == '')
        {
            total_people = 0;
        }

        $('.estimate-cost').text('Estimated Budget: Rs '+total_people * budget);


    }

    function locationCheck(value)
    {
        if(value == 'physical')
        {
            $('.showHideDiv').show();
        }
        else{
            $('.showHideDiv').hide();
        }

    }

</script>

{{--<script src="{{asset('main-assets/js/demo.js')}}"></script>--}}
