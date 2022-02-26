<?php

namespace Guangda\Tencent\IM\Services;

class GroupService extends BaseService
{
    public function addMembers(string $groupId, array $timUserIds, bool $silence = false): bool
    {
        $accounts = [];
        foreach ($timUserIds as $timUserId) {
            $accounts[] = [
                'Member_Account' => $timUserId,
            ];
        }

        $res = $this->client->post('v4/group_open_http_svc/add_group_member', [
            'query' => $this->getQueries(),
            'json' => [
                'GroupId' => $groupId,
                'Silence' => $silence ? 1 : 0, // 静默加人
                'MemberList' => $accounts,
            ],
        ]);

        $json = (string)$res->getBody();
        $json = json_decode($json, true);
        return $json['ActionStatus'] == 'OK';
    }
}
