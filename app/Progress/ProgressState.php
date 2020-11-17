<?php


namespace App\Progress;


interface ProgressState
{
    public function idle();
    public function inProgress();
    public function complete();
}
