<?php
/**
 * FileMessage.php
 *
 * @copyright  2021 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Sam Chen <sam.chen@opencart.cn>
 * @created    2021-12-31 14:29:37
 * @modified   2021-12-31 14:29:37
 */

namespace Guangda\Tencent\IM\Messages;

class FileMessage extends BaseMessage
{
    public $type = 'TIMFileElem';

    protected $url;
    protected $fileName;
    protected $fileSize;

    public function set(string $name, string $url, int $size)
    {
        $this->fileName = $name;
        $this->url = $url;
        $this->fileSize = $size;

        return $this;
    }

    public function getContent(): array
    {
        return [
            'Url' => $this->url,
            'UUID' => md5($this->url),
            'FileSize' => $this->fileSize,
            'FileName' => $this->fileName,
            'Download_Flag' => 2,
        ];
    }
}