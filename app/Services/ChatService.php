<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/15/2019
 * Time: 8:19 PM
 */

namespace App\Services;


use App\ChatMessage;
use App\Conversation;
use App\Events\FormSubmitted;
use App\Events\UserTypingStatus;
use App\Helpers\ImageHelpers;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;


class ChatService
{

    public function getConversation()
    {
        $conversation = Conversation::where('sender','=',Auth::user()->id)->orWhere('receiver','=',Auth::user()->id)->get();
        return $conversation;
    }

    public function getMessages($request)
    {
        $requestData['all'] = $request->all();

        $data['conversation'] = Conversation::find($requestData['all']['conversation_id']);
        $data['chat_message'] = array();

        if($data['conversation'])
        {
            $data['messages'] = ChatMessage::where('conversation_id', '=', $data['conversation']->id)->get();

            if (isset($data['chat_message'])) {
                $data['current_user_id'] = Auth::user()->id;

                if ($data['current_user_id'] == $data['conversation']->receiver) {
                    $data['message_receiver'] = User::find($data['conversation']->receiver);
                }

                if ($data['current_user_id'] == $data['conversation']->sender) {
                    $data['message_receiver'] = User::find($data['conversation']->sender);
                }
            }




            foreach($data['messages'] as $key=>$item)
            {

                $data['chat_message'][] = array('user_id'=>$item->user_id, 'messages'=>$item->type == 'File' ? basename($item->messages):$item->messages,
                    'conversation_id'=>$item->conversation_id,'id'=>$item->id,
                    'other_user_image'=>$data['message_receiver']->profile_image,'type'=>$item->type,
                    'created_at'=>$item->created_at->timezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                    'file_download'=> $item->type == 'File' || $item->type == 'Image' ? url($item->messages):'','real_file_name'=>$item->real_file_name

                );
            }

            return $data;

        }
    }


    public function saveMessage($request)
    {
        $final_array = array();
        $receiver_id = $request->receiver_id;
        if($request->attachment != '')
        {
            foreach($request->attachment as $key => $item)
            {
                $ext = $item->getClientOriginalExtension();
                $fileName = $item->getClientOriginalName();


                if($ext == 'png' |$ext == 'jpg')
                {
                    $fileNameUpload = time() . "-" . $fileName ;

                    $path = public_path('project-assets/images/chat/'.$request->conversation_id.'/');
                    if (!file_exists($path)) {
                        File::makeDirectory($path,0777,true);
                    }

                    ImageHelpers::updateProfileImage('project-assets/images/chat/'.$request->conversation_id.'/', $item , $fileNameUpload);
                    $type = 'Image';

                    $chatMessage = ChatMessage::create($request->except('messages','attachment','receiver_id')+['user_id'=>Auth::user()->id,'messages'=>'project-assets/images/chat/'.$request->conversation_id.'/'.$fileNameUpload,'type'=>$type,'real_file_name'=>$fileName]);

                    $fileDownload =  '/project-assets/images/chat/'.$request->conversation_id.'/'.$fileNameUpload;
                    $text = basename($fileDownload);

                    event(new FormSubmitted($text,
                        $type,$request->receiver_id,$request->conversation_id,$fileDownload,
                        $chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                        User::find($request->receiver_id)->profile_image));

                    $final_array[] = array( 'messages'=>$text,
                        'conversation_id'=>$request->conversation_id,
                        'type'=>$type,
                        'created_at'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                        'file_download'=> $fileDownload,'sidebar_time'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->diffForHumans()

                    );
                }
                else{

                    $fileNameUpload = time() . "-" . $fileName;

                    $path = public_path('project-assets/images/chat/'.$request->conversation_id.'/');

                    if (!file_exists($path)) {
                        File::makeDirectory($path,0777,true);
                    }

                    ImageHelpers::uploadFile('project-assets/images/chat/'.$request->conversation_id.'/', $item , $fileNameUpload);
                    $type = 'File';


                    $chatMessage = ChatMessage::create($request->except('messages','attachment','receiver_id')+['user_id'=>Auth::user()->id,'messages'=>'project-assets/images/chat/'.$request->conversation_id.'/'.$fileNameUpload,'type'=>$type,'real_file_name'=>$fileName]);

                    $fileDownload =  '/project-assets/images/chat/'.$request->conversation_id.'/'.$fileNameUpload;
                    $text = basename($fileDownload);

                    event(new FormSubmitted($text,
                        $type,$request->receiver_id,$request->conversation_id,$fileDownload,
                        $chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                        User::find($request->receiver_id)->profile_image));

                    $final_array[] = array(
                        'messages'=>$text,
                        'conversation_id'=>$request->conversation_id,
                        'type'=>$type,
                        'created_at'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                        'file_download'=> $fileDownload,'sidebar_time'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->diffForHumans(),
                        'real_file_name'=>$chatMessage->real_file_name

                    );

                }
            }
        }

        if($request->messages != '')
        {
            $type = 'Message';
            $chatMessage = ChatMessage::create($request->except('attachment','receiver_id')+['user_id'=>Auth::user()->id,'type'=>$type]);

            $fileDownload = '';
            $text = $request->messages;

            event(new FormSubmitted($text,
                $type,$request->receiver_id,$request->conversation_id,$fileDownload,
                $chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                User::find($request->receiver_id)->profile_image));

            $final_array[] = array( 'messages'=>$text,
                'conversation_id'=>$request->conversation_id,
                'type'=>$type,
                'created_at'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->format('d F Y  g:i A'),
                'file_download'=> $fileDownload,'sidebar_time'=>$chatMessage->created_at->setTimezone(Session::get('time_zone'))->diffForHumans()

            );
        }


        $data['chat_message'] = $final_array;

        return $data;
    }

    public function userStatus($request)
    {
        $text = 'User is Typing.......';
       event(new UserTypingStatus($request->receiver_id,$request->conversation_id,$text));

        return 'success';
    }



}