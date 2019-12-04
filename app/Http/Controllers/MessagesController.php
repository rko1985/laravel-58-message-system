<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Auth;

class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->get();

        return view('home')->with('messages', $messages);
    }
}
