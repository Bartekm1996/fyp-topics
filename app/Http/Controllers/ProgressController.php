<?php

namespace App\Http\Controllers;


use App\Models\FypEvent;
use App\Models\FypEventState;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index() {
        $progress = Progress::all()->where('user_id', '=', auth()->user()->id)->first();
        $eventstates = FypEventState::all()->where('user_id', '=', auth()->user()->id);
        $events = FypEvent::all();

        return view('progress.index')->with([
            'progress' => $progress,
            'eventstates' => $eventstates,
            'events' => $events,
        ]);
    }
}
