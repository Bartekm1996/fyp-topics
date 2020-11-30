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

    public function onEnter()
    {
        $this->logger->debug('RequestDeclined:onEnter', 'State initialized');
    }

    public function onReturn()
    {
        $this->logger->debug('RequestDeclined:onReturn', 'State has moved back');
    }

    public function onFinish()
    {
        $this->logger->debug('RequestDeclined:onFinish', 'State finished');
    }
}
