<?php

namespace Guangda\Tencent\IM\Messages;

class ImageMessage extends BaseMessage
{
    public $type = 'TIMImageElem';

    protected $image;
    protected $width;
    protected $height;

    public function set($image, $width, $height)
    {
        $this->image = $image;
        $this->width = $width;
        $this->height = $height;
    }

    public function getContent(): array
    {
        $previewWidth = (int)($this->width * 0.1);
        $previewHeight = (int)($this->height * 0.1);

        return [
            'UUID' => md5($this->image),
            'ImageFormat' => 1,
            'ImageInfoArray' => [
                [
                    'Type' => 1,
                    // 'Size' => $size,
                    'Width' => $this->width,
                    'Height' => $this->height,
                    'URL' => image_resize($this->image, 0, 0),
                ],
                [
                    'Type' => 2,
                    // 'Size' => $size,
                    'Width' => $previewWidth,
                    'Height' => $previewHeight,
                    'URL' => image_resize($this->image, $previewWidth, $previewHeight),
                ],
                [
                    'Type' => 3,
                    // 'Size' => 0,
                    'Width' => 100,
                    'Height' => 100,
                    'URL' => image_resize($this->image),
                ]
            ],
        ];
    }
}
