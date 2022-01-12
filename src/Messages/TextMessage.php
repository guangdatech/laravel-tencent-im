<?php

namespace Guangda\Tencent\IM\Messages;

class TextMessage extends BaseMessage
{
    public $type = 'TIMTextElem';

    protected $text;

    public function set($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getContent(): array
    {
        return [
            'Text' => $this->text,
        ];
    }
}
