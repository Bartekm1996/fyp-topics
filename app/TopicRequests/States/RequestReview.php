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

    public function onEnter()
    {
        $this->logger->debug('RequestReview:onEnter', 'State initialized');
    }

    public function onReturn()
    {
        $this->logger->debug('RequestReview:onReturn', 'State has moved back');
    }

    public function onFinish()
    {
        $this->logger->debug('RequestReview:onFinish', 'State finished');
    }
}
