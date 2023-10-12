<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NameRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Events\MessageAdded;
use App\Models\Messageroom;

class MessageController extends Controller
{
    public function messageroom(User $user)
    {
        $user = Auth::user();
        
        return view('users.message')->with(['user' => $user]);//->first()]);
    }
    //
    
    public function newmessage(Requst $request, Messageroom $message)
    {
        $message = new Message();
        $message->message = $request->message;
        $message->user_id = Auth::id(); //host_idなどに変える必要がある
        $message->save();
        
        event(new MessageAdded([$message,Auth::user()]));
        
    }
    
    public function allmessage(Requst $request, Messageroom $message)
    {
        return Message::with('user')->get();
    }
}
