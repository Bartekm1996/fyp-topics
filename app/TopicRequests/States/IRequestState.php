<?php


namespace App\TopicRequests\States;


interface IRequestState {
    public function onEnter();
    public function onReturn();
    public function onFinish();
}
