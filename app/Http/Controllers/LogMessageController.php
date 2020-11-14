<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LogMessage;
use Illuminate\Http\Request;

class LogMessageController extends Controller
{
    public function index() {
        return view('logging.index')->with('messages', LogMessage::all());
    }
}
