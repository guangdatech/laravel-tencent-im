<?php

namespace Guangda\Tencent\IM\Messages;

abstract class BaseMessage
{
    public $from;
    public $to;
    public $type;
    public $syncOtherMachine = 2;

    protected $offlineTitle;
    protected $offlineText;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;

        return $this;
    }

    public function setOffline($title, $text)
    {
        $this->offlineTitle = $title;
        $this->offlineText = $text;
    }

    public function getContent(): array
    {
        throw new \Exception('subclass this method');
    }

    public function getOffline(): array
    {
        if (! $this->offlineTitle) {
            return [];
        }

        return [
            'PushFlag' => 0,
            'Title' => $this->offlineTitle,
            'Desc' => $this->offlineText,
        ];
    }
}
