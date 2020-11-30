<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Topic;
use App\Models\User;
use App\TopicRequests\States\RequestReview;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index() {

        $requests = \App\TopicRequests\Request::all()->where('user_id', auth()->id());

        if( auth()->user()->role == 1) {
            $requests  = \App\TopicRequests\Request::all()->where('supervisor_id', auth()->id());
        }

        $topics = Topic::all();
        $users = User::all();
        $profiles = Profile::all();

        $mod_requests = [];
        foreach ($requests as $req) {
            $topic = $topics->where('id', $req->topic_id)->first();
            $user = $users->where('id', $req->user_id)->first();
            $user_profile = $profiles->where('user_id', $req->user_id)->first();
            $supervisor = $users->where('id', $req->supervisor_id)->first();

            array_push($mod_requests,
            [
                'id' => $req->id,
                'state' => $req->state,
                'title' => $topic->title,
                'body' => $topic->body,
                'qca' => $topic->qca,
                'user_id' => $user->user_id,
                'user_name' => $user->name,
                'user_qca' => $user_profile->qca,
                'student_id' => $user_profile->student_id,
                'supervisor_id' => $supervisor->id,
                'supervisor_name' => $supervisor->name,
                'requested_at' => $req->created_at,
                'note' => $req->note,
                'decision_date' => $req->decision_date
            ]);

        }

        return view('requests.index')->with('mod_requests', $mod_requests);
    }

    public function review(Request $request) {
        $id = $request->input('id');
        $nextState = $request->input('state');

        $req = \App\TopicRequests\Request::all()->where('id', $id)->first();

        $currentState = $req->getState();

        if($nextState == $req::IDLE) {
            $currentState->onReturn();//go back into idle state
        } else if($nextState == $req::REVIEW) {
            $currentState->onFinish();
        }
//
        $req->setState($nextState);
        $req->getState()->onEnter();
        $req->save();

        return response()->json(['status' => $req->state,
            'id'=> $request->input('id')]);
    }
}
