<?php

namespace App\Http\Controllers;


use App\Logging\LoggerFactory;
use App\Models\Topic;
use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
class TopicsController extends Controller
{

    public function index() {

        return view('topics.index')->with(['topics' => Topic::all(), 'users' => User::all()]);
    }

    public function store(Request $request)
    {

//        $status = true;
//        $logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
////        try {
//
//            $topic = new Topic();
//
//            $topic->title = $request->title;
//            $topic->body = $request->body;
//            $topic->user_id = auth()->id();
//            $topic->qca = $request->qca;
//            $topic->max_requests = $request->max_requests;
//            $topic->save();
//        } catch (Exception $err) {
//            $logger->debug('ProgressController::fileUploadPost', $err);
//            $status = false;
//        }
//        $logger->debug('ProgressController::store', 'Topic Added:'.$status);
        return response()->json($request);
    }
}
