<div class="msg-left-main">
    <div class="absolute-left-mainmx">
        <a class="oldr-msgs" href="#">Looking for older messages?</a>
        <a class="view-ppls" href="#">View all rooms & people</a>
    </div>
    <div class="icons-main-left">
        <a class="cog-span" href="#"><i class="fas fa-cog"></i></a>
        <span class="imgs-icns">
                                    <a href="#"><i class="fas fa-comment-alt"></i></a>
                                    <a href="#"><i class="fas fa-file-image"></i></a>
                                </span>
        <a class="cog-span" href="#"><i class="fas fa-plus"></i></a>
    </div>
    <div class="search-top-main">
        <input type="search" placeholder="Search Messages">
        <div class="select-main-div">
            <select>
                <option>All Recent</option>
                <option>All Recent</option>
                <option>All Recent</option>
                <option>All Recent</option>
            </select>
        </div>
    </div>
    <ul class="msg-ul">



    @foreach($data['conversation'] as $conversation)

            @if($conversation->receiver == Auth::user()->id)
                <li class="active-bgfocus" id="">
                    <input type="hidden" id="conversation_id" name="conversation_id" value="{{ $data['conversation'] == '' ? $data['conversation'][0]->id:''}}">

                    <span class="msg-img">

                        @if($conversation->senderInfo->is_online == 1)
                            <span class="crcles_green"></span>
                        @else
                            <span class="crcles"></span>
                        @endif

                        <img src="{{$conversation->senderInfo->profile_image}}" alt="no img"></span>
                    <div class="msg-right-main">
                        <a href="javascript:void(0)" onclick="getChat({{$conversation->id}})" class="msg-title">{{$conversation->senderInfo->name}}</a>
                            <span class="msg-desc">{{$conversation->getMessage()->orderBy('id','desc')->first() != null ? $conversation->getMessage()->orderBy('id','desc')->first()->type == 'Message' ? $conversation->getMessage()->orderBy('id','desc')->first()->messages:'File Attachment':''}}</span>
                        <span class="date-msg">{{$conversation->getMessage()->orderBy('id','desc')->first() != null ? \Carbon\Carbon::parse($conversation->getMessage()->orderBy('id','desc')->first()->created_at)->diffForHumans(\Carbon\Carbon::now()):''}}</span>
                    </div>
                </li>
            @else
                <li class="active-bgfocus" id="li-id-{{ $data['conversation'] != '' ? $data['conversation'][0]->id:''}}">
                    <span class="msg-img">

                        @if($conversation->receiverInfo->is_online == 1)
                            <span class="crcles_green"></span>
                        @else
                            <span class="crcles"></span>
                        @endif

                        <img src="{{$conversation->receiverInfo->profile_image}}" alt="no img"></span>
                    <div class="msg-right-main">
                        <input type="hidden" id="conversation_id" name="conversation_id" value="{{ $data['conversation'] != '' ? $data['conversation'][0]->id:''}}">

                        <a href="javascript:void(0)" onclick="getChat({{$conversation->id}})" class="msg-title">{{$conversation->receiverInfo->name}}</a>
                        <span class="msg-desc">{{$conversation->getMessage()->orderBy('id','desc')->first()!= null ? $conversation->getMessage()->orderBy('id','desc')->first()->messages :''}}</span>
                        <span class="date-msg">{{$conversation->getMessage()->orderBy('id','desc')->first() != null? \Carbon\Carbon::parse($conversation->getMessage()->orderBy('id','desc')->first()->created_at)->diffForHumans(\Carbon\Carbon::now())  : ''}}</span>
                    </div>
                </li>
            @endif
    @endforeach

    </ul>
</div>