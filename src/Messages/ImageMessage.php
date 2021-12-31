<?php

namespace Guangda\Tencent\IM\Messages;

class ImageMessage extends BaseMessage
{
    public $type = 'TIMImageElem';

    protected $source;
    protected $width;
    protected $height;

    public function set($source, $width, $height)
    {
        $this->source = $source;
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    public function getContent(): array
    {

        $images = [];
        if ($this->source) {
            $images[] = [
                'Type' => 1,
                // 'Size' => 103148,
                'URL' => $this->source,
                'Width' => $this->width,
                'Height' => $this->height,
            ];

            $images[] = [
                'Type' => 2,
                // 'Size' => 103148,
                'URL' => $this->source,
                'Width' => $this->width,
                'Height' => $this->height,
            ];

            $images[] = [
                'Type' => 3,
                // 'Size' => 103148,
                'URL' => $this->source,
                'Width' => $this->width,
                'Height' => $this->height,
            ];
        }

        return [
            'UUID' => md5($this->source),
            'ImageFormat' => 1,
            'ImageInfoArray' => $images,
        ];
    }
}
