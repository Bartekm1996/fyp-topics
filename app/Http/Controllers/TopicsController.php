<?php

namespace App\Http\Controllers;


use App\Logging\LoggerFactory;
use App\Models\Topic;
use App\Models\User;
use http\Exception;
use http\Message\Body;
use Illuminate\Http\Request;
class TopicsController extends Controller
{

    public function index() {

        return view('topics.index')->with(['topics' => Topic::all(), 'users' => User::all()]);
    }

    public function delete(Request $request) {
        $id = $request->input('id');
        Topic::where('id', $id)->delete();
        return response()->json(['status' => true, 'id'=> $id]);
    }

    public function patch(Request $request) {
        $id = $request->input('id');
        $sid = $request->input('supervisor_id');

        $res = new \App\Models\Request();
        $res->user_id = auth()->id();
        $res->supervisor_id = $sid;
        $res->topic_id = $id;
        $res->save();

        return response()->json(['status' => true, 'id'=> $id]);
    }

    public function store(Request $request)
    {

        $status = true;
        $logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);

        $data = $request->input('data');

        $topic = new Topic();

        $topic->title = $data['title'];
        $topic->body = $data['body'];
        $topic->user_id = auth()->id();
        $topic->qca = $data['qca'];;
        $topic->max_requests = $data['max_requests'];
        $topic->save();

        $logger->debug('ProgressController::store', 'Topic Added:'.$data['title']);

        return response()->json(['status' => true, 'topic'=> $data['title']]);
    }
}
