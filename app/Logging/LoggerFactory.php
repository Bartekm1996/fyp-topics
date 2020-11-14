<?php


namespace App\Logging;
/**
 * Class LoggerFactory
 * @package App\Logging
 * An example of a calling the database logger
 *
 *  $logger = LoggerFactory::getLogger(DbLogger::LOGGER_CODE);
 *  $logger->debug('YourTagHere', 'Some Useful Message here');
 */
class LoggerFactory
{
    private function __construct() {
    }

    /**
     * @param $loggerCode
     * @return DbLogger|FileLogger|RemoteApiLogger
     * Default is DbLogger
     */
    public static  function getLogger($loggerCode) {
        switch ($loggerCode) {
            case FileLogger::LOGGER_CODE: return new FileLogger();
            case RemoteApiLogger::LOGGER_CODE: return new RemoteApiLogger();
        }

        return new DbLogger();
    }
}
