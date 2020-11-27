<?php

namespace App\Http\Controllers;

class RequestsController extends Controller
{
    public function index() {
        return view('requests.index')->with('requests', \App\Models\Request::all());
    }
}
