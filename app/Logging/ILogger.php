<?php


namespace App\Logging;


interface ILogger
{
    const DEBUG = 0;
    const INFO = 1;
    const ERROR = 2;
    public function debug($tag, $message);
    public function info($tag, $message);
    public function error($tag, $message);
}
