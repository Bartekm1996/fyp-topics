<?php


namespace App\Logging;

use App\Models\LogMessage;

/**
 * Class DbLogger
 * @package App\Logging
 * Log messages to database
 */
class DbLogger implements ILogger
{

    private function log($tag, $message, $type) {
        $log = new LogMessage();
        $log->tag = $tag;
        $log->message = $message;
        $log->type = $type;
        $log->save();
    }
    public function debug($tag, $message)
    {
        $this->log($tag, $message, self::DEBUG);
    }

    public function info($tag, $message)
    {
        $this->log($tag, $message, self::INFO);
    }

    public function error($tag, $message)
    {
        $this->log($tag, $message, self::ERROR);
    }
}
