<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Topic;
use App\Models\User;
use App\TopicRequests\States\RequestDeclined;
use App\TopicRequests\States\RequestIdle;
use App\TopicRequests\States\RequestReview;
use App\TopicRequests\States\RequestSuccess;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index() {

        $requests = \App\TopicRequests\Request::all()->where('user_id', auth()->id());
        $hasTopic = count($requests
            ->where('user_id', auth()->id())
            ->where('state',\App\TopicRequests\Request::SUCCESS)) > 0;


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

        return view('requests.index')->with(['mod_requests'=> $mod_requests,
            'has_topic' => $hasTopic]);
    }

    public function decline(Request $request) {
        $id = $request->input('id');
        $req = \App\TopicRequests\Request::all()->where('id', $id)->first();

        $req->setState($req::DECLINED);
        $req->getState()->onEnter($req); //if needed, add logic here before request has been successful
        $req->getState()->onFinish($req);

        return response()->json(['id'=> $id]);
    }

    public function accept(Request $request) {
        $id = $request->input('id');
        $req = \App\TopicRequests\Request::all()->where('id', $id)->first();

        $req->setState($req::SUCCESS);
        $req->getState()->onEnter($req); //if needed, add logic here before request has been successful
        $req->getState()->onFinish($req);

        return response()->json(['id'=> $id]);
    }

    public function idle(Request $request) {
        $id = $request->input('id');

        $req = \App\TopicRequests\Request::all()->where('id', $id)->first();
        $req->setState($req::REVIEW);
        $req->getState()->onReturn($req);//we returned from Reviewing state

        return response()->json(['id'=> $id]);
    }

    public function review(Request $request) {
        $id = $request->input('id');

        $req = \App\TopicRequests\Request::all()->where('id', $id)->first();
        $req->setState($req::REVIEW);
        $req->getState()->onEnter($req);

        return response()->json(['id'=> $id]);
    }
}
