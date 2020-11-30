<?php


namespace App\TopicRequests\States;


interface IRequestState {
    public function onEnter($topicRequest);
    public function onReturn($topicRequest);
    public function onFinish($topicRequest);
}
