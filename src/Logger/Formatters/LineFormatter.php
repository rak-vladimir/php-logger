<?php

namespace Logger\Formatters;

class LineFormatter
{
    protected string $messageFormat;
    protected string $dateFormat;

    public function __construct(
        string $messageFormat = '%date%  %level_code%  %level%  %message%',
        string $dateFormat = 'Y-m-d H:i:s'
    )
    {
        $this->messageFormat = $messageFormat;
        $this->dateFormat    = $dateFormat;
    }

    public function format(int $logLevel, string $message): string
    {
        return str_replace(
            [
                '%date%',
                '%level_code%',
                '%level%',
                '%message%'
            ],
            [
                date($this->dateFormat),
                str_pad($logLevel, 3, '0',STR_PAD_LEFT),
                $this->levelToStr($logLevel),
                $message
            ],
            $this->messageFormat
        );
    }

    protected function levelToStr(int $level): string
    {
        switch ($level) {
            case 1: return 'ERROR';
            case 2: return 'INFO';
            case 3: return 'DEBUG';
            case 4: return 'NOTICE';
            default: return 'Unknown log level';
        }
    }
}