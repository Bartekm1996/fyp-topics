<?php


namespace App\TopicRequests\States;


use App\Logging\LoggerFactory;

class RequestSuccess implements IRequestState
{

    private $logger;
    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(LoggerFactory::LOGGER_DB);
    }

    public function onEnter()
    {
        $this->logger->debug('RequestSuccess:onEnter', 'State initialized');
    }

    public function onReturn()
    {
        $this->logger->debug('RequestSuccess:onReturn', 'State has moved back');
    }

    public function onFinish()
    {
        $this->logger->debug('RequestSuccess:onFinish', 'State finished');
    }
}
