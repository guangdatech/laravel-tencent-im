<?php

namespace Guangda\Tencent\IM\Messages;

abstract class BaseMessage
{
    public $from;
    public $to;
    public $type;
    public $syncOtherMachine = 2;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getContent(): array
    {
        throw new \Exception('subclass this method');
    }
}
