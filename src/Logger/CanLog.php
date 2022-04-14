<?php

namespace Logger;

trait CanLog
{
    /**
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        switch ($name) {
            case 'debug': $this->log(LogLevel::LEVEL_DEBUG, $arguments[0]);
                break;
            case 'error': $this->log(LogLevel::LEVEL_ERROR, $arguments[0]);
                break;
            case 'info': $this->log(LogLevel::LEVEL_INFO, $arguments[0]);
                break;
            case 'notice': $this->log(LogLevel::LEVEL_NOTICE, $arguments[0]);
                break;
            default:
                throw new \Exception('Method not found!');
        }
    }
}