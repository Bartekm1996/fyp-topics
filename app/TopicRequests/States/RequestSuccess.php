<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;
use App\Models\Profile;
use App\Models\User;

class RequestSuccess implements IRequestState
{

    private $logger;
    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
    }

    public function onEnter($topicRequest)
    {
        $this->logger->debug('RequestSuccess:onEnter', 'State initialized');
    }

    public function onReturn($topicRequest)
    {
        $topicRequest->setState($topicRequest::REVIEW);
        $topicRequest->save();
        $this->logger->debug('RequestSuccess:onReturn', 'State has moved back');
    }

    public function onFinish($topicRequest)
    {
        $topicRequest->setState($topicRequest::SUCCESS);
        $topicRequest->save();

        $userRequests = \App\TopicRequests\Request::all()
            ->where('user_id', $topicRequest->user_id)
            ->where('state', '!=', $topicRequest::SUCCESS);

        /*
         * Now that the student has an FYP delete their requests
         */
        foreach($userRequests as $req) {
            $req->delete();
        }

        /*
          TODO: email student and supervisor here. Send message to other students requesting this topic that it is gone
        */
//        $student = User::all()->where('id', $topicRequest->user_id)->first();
//        $supervisor = User::all()->where('id', $topicRequest->supervisor_id)->first();
//        $studentProfile = Profile::all()->where('user_id', $student->id);

        $this->logger->debug('RequestSuccess:onFinish', 'State finished');
    }
}
