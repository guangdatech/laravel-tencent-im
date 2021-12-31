<?php
/**
 * TIMChannel.php
 *
 * @copyright  2021 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Sam Chen <sam.chen@opencart.cn>
 * @created    2021-12-31 11:01:47
 * @modified   2021-12-31 11:01:47
 */

namespace Guangda\Tencent\IM;

use Guangda\Tencent\IM\Services\MessageService;
use Illuminate\Notifications\Notification;

class TencentIMChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toTencentMessage($notifiable);

        $messageService = new MessageService();
        $messageService->send($message);
    }
}