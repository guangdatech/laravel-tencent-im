<?php
/**
 * VideoMessage.php
 *
 * @copyright  2021 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Sam Chen <sam.chen@opencart.cn>
 * @created    2021-12-31 14:44:11
 * @modified   2021-12-31 14:44:11
 */

namespace Guangda\Tencent\IM\Messages;


class VideoMessage extends BaseMessage
{
    public $type = 'TIMVideoFileElem';

    protected $videoUrl;
    protected $thumbUrl;
    protected $thumbWidth;
    protected $thumbHeight;

    public function set($videoUrl, $thumbUrl, $thumbWidth, $thumbHeight)
    {
        $this->videoUrl = $videoUrl;
        $this->thumbUrl = $thumbUrl;
        $this->thumbWidth = $thumbWidth;
        $this->thumbHeight = $thumbHeight;

        return $this;
    }

    public function getContent(): array
    {
        return [
            "VideoUrl" => $this->videoUrl,
            "VideoUUID" => md5($this->videoUrl),
            // "VideoSize" => 1194603,
            // "VideoSecond" => 5,
            // "VideoFormat" => "mp4",
            "VideoDownloadFlag" => 2,
            "ThumbUrl" => $this->thumbUrl,
            "ThumbUUID" => md5($this->thumbUrl),
            // "ThumbSize" => 13907,
            "ThumbWidth" => $this->thumbWidth,
            "ThumbHeight" => $this->thumbHeight,
            "ThumbFormat" => 'JPG',
            "ThumbDownloadFlag" => 2,
        ];
    }
}