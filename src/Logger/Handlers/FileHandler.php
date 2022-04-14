<?php

namespace Logger\Handlers;

use Logger\CanLog;

class FileHandler extends Handler
{
    use CanLog;

    public function setIsEnabled(bool $value = true)
    {
        $this->isEnabled = $value;
    }

    public function log(int $logLevel, string $message)
    {
        if ($this->isEnabled && !empty($this->filename)) {
            file_put_contents($this->filename, $this->formatter->format($logLevel, $message) . PHP_EOL, FILE_APPEND);
        }
    }
}