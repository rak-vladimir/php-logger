<?php

namespace Logger\Handlers;

use Logger\CanLog;

class SysLogHandler extends Handler
{
    use CanLog;

    public function log(int $logLevel, string $message)
    {
        if ($this->isEnabled) {
            syslog($logLevel, $message);
        }
    }
}