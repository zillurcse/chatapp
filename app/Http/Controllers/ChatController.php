<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Auth;
use App\Events\NewChatMessage;

class ChatController extends Controller
{
    //
    public function rooms(){
    	return ChatRoom::all();
    }

    //
    public function messages($roomId){
    	return ChatMessage::where('chat_room_id',$roomId)
    			->with('user')
    			->orderBy('created_at','DESC')
    			->get();
    }

    //
    public function newMessage(Request $request,$roomId){
    	$newMessage = new ChatMessage();
    	$newMessage->user_id = Auth::id();
    	$newMessage->chat_room_id = $roomId;
    	$newMessage->message = $request->message;
    	$newMessage->save();
        broadcast(new NewChatMessage($newMessage))->toOthers();
    	return $newMessage;
    }
}
