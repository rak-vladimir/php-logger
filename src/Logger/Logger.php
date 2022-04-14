<?php

namespace Logger;

use Logger\Handlers\Handler;

class Logger
{
    use CanLog;

    protected array $handlers = [];

    public function addHandler(Handler $handler)
    {
        $this->handlers[] = $handler;
    }

    public function log(int $logLevel, string $message)
    {
        foreach ($this->handlers as $handler) {
            if (count($handler->getLevels()) === 0 || in_array($logLevel, $handler->getLevels())) {
                $handler->log($logLevel, $message);
            }
        }
    }
}