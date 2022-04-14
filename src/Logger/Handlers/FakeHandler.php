<?php

namespace Logger\Handlers;

use Logger\CanLog;

class FakeHandler extends Handler
{
    use CanLog;

    public function log(int $logLevel, string $message)
    {
        // TODO: Implement log() method.
    }
}