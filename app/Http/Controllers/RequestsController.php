<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use function GuzzleHttp\Promise\all;

class RequestsController extends Controller
{
    public function index() {
//        $my_requests = \App\Models\Request::where('user_id', auth()->id());

        return view('requests.index')->with(
            ['requests' => \App\Models\Request::all()->where('user_id', auth()->id()),
                'topics' => Topic::all(),
                'users' => User::all()
            ]);
    }
}
