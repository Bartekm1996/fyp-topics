<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;
use App\Models\FypEventState;
use App\Models\Profile;
use App\Models\Progress;
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

        $this->dropUserRequests($userRequests);
        $this->dropTopicRequests($topicRequest);
        $fypevent = $this->setFirstEventActive($topicRequest);
        $this->setProgress($fypevent);

        $this->logger->debug('RequestSuccess:onFinish', 'State finished');
    }

    private function dropUserRequests($userRequests) {
        /*
        * Now that the student has an FYP delete their requests
        */
        foreach($userRequests as $req) {
            $req->delete();
        }
    }

    private function setFirstEventActive($topicRequest)
    {
        $fypState = FypEventState::all()->where('user_id',$topicRequest->user_id)
            ->sortBy('fypevent_id')->first();
        $fypState->state = FypEventState::IN_PROGRESS;
        $fypState->save();

        return $fypState;
    }

    /**
     * @param $fypState
     * When a student has been successful with their FYP request
     * their timeline will start
     */
    private function setProgress($fypState)
    {
        $progress = Progress::all()->where('user_id', $fypState->user_id)->first();
        $progress->fypevent_state_id = $fypState->id;
        $progress->save();
    }

    /*
     * A student has won this topic so drop for everyone else
     */
    private function dropTopicRequests($topicRequest)
    {

        $topicRequests = \App\TopicRequests\Request::all()
            ->where('topic_id', $topicRequest->topic_id)
            ->where('state', '!=', $topicRequest::SUCCESS);

        //TODO: Email other students here that the topic has been given to another student
        foreach($topicRequests as $req) {
            $req->delete();
        }
    }

}
