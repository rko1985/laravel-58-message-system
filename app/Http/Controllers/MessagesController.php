<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Auth;
use App\User;

class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->get();

        return view('home')->with('messages', $messages);
    }

    public function create(int $id = 0, String $subject = ''){
        if($id === 0){
            $users = User::where('id', '!=', Auth::id())->get();
        } else {
            $users = User::where('id', $id)->get();
        }
        
        if($subject !== ''){
            $subject = 'Re: ' . $subject;
        }

        return view('create')->with(['users' => $users, 'subject' => $subject]);
    }

    public function send(Request $request){
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('message');

        $message->save();

        return redirect()->to('/home')->with('status', 'Message sent successfully.');

    }

    public function sent(){
        $messages = Message::with('userTo')->where('user_id_from', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('sent')->with('messages', $messages);
    }

    public function read(int $id){
        $message = Message::with('userFrom')->find($id);
        $message->read = true;
        $message->save();

        return view('read')->with('message', $message);
    }
}
