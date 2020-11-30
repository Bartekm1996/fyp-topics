<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;

class RequestReview implements IRequestState
{

    private $logger;
    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
    }

    public function onEnter($topicRequest)
    {
        $topicRequest->setState($topicRequest::REVIEW);
        $topicRequest->save();
        //Send message to user that the topic requested is being reviewed
        $this->logger->debug('RequestReview:onEnter', 'State initialized');
    }

    public function onReturn($topicRequest)
    {
        $topicRequest->setState($topicRequest::IDLE);
        $topicRequest->save();
        $this->logger->debug('RequestReview:onReturn', 'State has moved back');
    }

    public function onFinish($topicRequest)
    {
        //Class this state when the topic has been declined or successful
        $this->logger->debug('RequestReview:onFinish', 'State finished');
    }
}
