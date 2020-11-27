<?php

namespace App\Http\Controllers;


use App\Logging\LoggerFactory;
use App\Models\Document;
use App\Models\FypEvent;
use App\Models\FypEventState;
use App\Models\Progress;
use http\Exception;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {

        $status = true;
        $logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
        try {

            $doc = new Document();

            $doc->fyp_es_id = $request->event_id;
            $doc->data = $request->filedata;
            $doc->user_id = auth()->id();
            $doc->filename = $request->filename;
            $doc->save();
        } catch (Exception $err) {
            $logger->debug('ProgressController::fileUploadPost', $err);
            $status = false;
        }
        $logger->debug('ProgressController::fileUploadPost', 'Uploaded:'.$request->filename);
        return response()->json([
            'uploaded' => $status,
            'filename' => $request->filename]);
    }
}
