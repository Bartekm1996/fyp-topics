<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;

class RequestIdle implements IRequestState
{

    private $logger;
    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
    }

    public function onEnter()
    {
        $this->logger->debug('RequestIdle:onEnter', 'State initialized');
    }

    public function onReturn()
    {
        $this->logger->debug('RequestIdle:onReturn', 'State has moved back');
    }

    public function onFinish()
    {
        $this->logger->debug('RequestIdle:onFinish', 'State finished');
    }
}
