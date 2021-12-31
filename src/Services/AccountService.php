<?php
/**
 * AccountService.php
 *
 * @copyright  2021 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Sam Chen <sam.chen@opencart.cn>
 * @created    2021-12-24 18:25:41
 * @modified   2021-12-24 18:25:41
 */

namespace Guangda\Tencent\IM\Services;

class AccountService extends BaseService
{
    /**
     * 创建用户
     * https://cloud.tencent.com/document/product/269/1608
     * @param $account
     * @return bool
     */
    public function add($account): bool
    {
        $res = $this->client->post('v4/im_open_login_svc/account_import', [
            'query' => $this->getQueries(),
            'json' => [
                'Identifier' => $account,
                // 'Nick' => '',
                // 'FaceUrl' => '',
            ],
        ]);

        $json = (string)$res->getBody();
        $json = json_decode($json, true);
        return $json['ActionStatus'] == 'OK';
    }
}
