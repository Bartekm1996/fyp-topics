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
    const LOGGER_DB = 0;
    const LOGGER_FILE = 1;
    const LOGGER_REMOTE_API = 2;
    private function __construct() {
    }

    /**
     * @param $loggerCode
     * @return DbLogger|FileLogger|RemoteApiLogger
     * Default is DbLogger
     */
    public static  function getLogger($loggerCode) {
        switch ($loggerCode) {
            case LoggerFactory::LOGGER_FILE: return new FileLogger();
            case LoggerFactory::LOGGER_REMOTE_API: return new RemoteApiLogger();
        }

        return new DbLogger(); //default is DbLogger
    }
}
