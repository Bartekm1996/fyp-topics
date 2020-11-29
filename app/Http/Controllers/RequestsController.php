<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;

class RequestsController extends Controller
{
    public function index() {
//        $my_requests = \App\Models\Request::where('user_id', auth()->id());
        return view('requests.index')->with('requests', \App\Models\Request::all()->where('user_id', auth()->id()));
    }
}
