<?php

namespace App\Http\Controllers\User;

use App\ChatMessage;
use App\Conversation;
use App\Helpers\TimezoneHelper;
use App\Services\ChatService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function index(ChatService $chatService)
    {
        $data['conversation'] = $chatService->getConversation();
        return view('User.Chat.chat_message',compact('data'));
    }


    public function getMessage(Request $request, ChatService $chatService)
    {

        $data['chatRecords'] = $chatService->getMessages($request);
        return response()->json(['result'=>'success','data'=>$data]);
    }


    public function setTimeZone(Request $request)
    {
        TimezoneHelper::SetTimeZone($request->time);
    }

    public function saveMessage(Request $request,ChatService $chatService)
    {
        $data = $chatService->saveMessage($request);

        return response()->json(['result'=>'success','data'=>$data]);
    }

    public function saveUserStatus(Request $request,ChatService $chatService)
    {
        $data = $chatService->userStatus($request);
        return response()->json(['result'=>'success']);
    }
}

