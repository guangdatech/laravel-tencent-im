<?php

namespace Guangda\Tencent\IM\Messages;

class CustomMessage extends BaseMessage
{
    public $type = 'TIMCustomElem';

    protected $data;

    public function set($data)
    {
        $this->data = $data;
    }

    public function getContent(): array
    {
        return [
            'Data' => json_encode($this->data),
            // 'Text' => $text,
            // 'Desc' => $description,
            'Ext' => '',
            'Sound' => 'dingdong.aiff'
        ];
    }
}
