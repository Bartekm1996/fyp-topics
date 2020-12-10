<?php

namespace App\Http\Controllers;

use App\Models\LogMessage;
use App\Models\Message;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $user=User::all();
        $message=Message::all();
        return view('messages.index')->with('data', ['user'=>$user,'message'=>$message]);
    }

    public function create(){

        $msg = new Message();
        $msg->message = request()->get('message');
        $msg->topic = request()->get('topic');
        $msg->to = request()->get('to');
        $msg->from = request()->get('from');
        $msg->save();

    }
}
