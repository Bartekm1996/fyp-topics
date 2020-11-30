<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;

class RequestDeclined implements IRequestState
{

    private $logger;
    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
    }

    public function onEnter($topicRequest)
    {
        $this->logger->debug('RequestDeclined:onEnter', 'State initialized');
    }

    public function onReturn($topicRequest)
    {
        $topicRequest->setState($topicRequest::REVIEW);
        $topicRequest->save();
        $this->logger->debug('RequestDeclined:onReturn', 'State has moved back');
    }

    public function onFinish($topicRequest)
    {
        /*
         * TODO: Send email or message here to both parties
         */
        $topicRequest->setState($topicRequest::DECLINED);
        $topicRequest->save();
        $this->logger->debug('RequestDeclined:onFinish', 'State finished');
    }
}
