<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;

abstract class Handler
{
    protected bool $isEnabled;
    protected string $filename;
    protected LineFormatter $formatter;
    protected array $levels;

    public function __construct(array $options = [])
    {
        $this->isEnabled = $options['is_enabled'] ?? false;
        $this->filename  = $options['filename'] ?? '';
        $this->formatter = $options['formatter'] ?? new LineFormatter();
        $this->levels    = $options['levels'] ?? [];
    }

    public function getLevels(): array
    {
        return $this->levels ?? [];
    }

    public abstract function log(int $logLevel, string $message);
}