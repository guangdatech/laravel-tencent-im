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
        if ($json['ActionStatus'] == 'OK') {
            return true;
        }

        throw new \Exception($json['ErrorInfo']);
    }

    public function info(string $groupId): array
    {
        $res = $this->client->post('v4/group_open_http_svc/get_group_info', [
            'query' => $this->getQueries(),
            'json' => [
                'GroupIdList' => [$groupId],
            ],
        ]);

        $json = (string)$res->getBody();
        $json = json_decode($json, true);
        if ($json['ActionStatus'] != 'OK') {
            throw new \Exception($json['ErrorInfo']);
        }

        $group = $json['GroupInfo'][0];

        if ($group['ErrorCode'] != 0) {
            throw new \Exception($group['ErrorInfo']);
        }

        return $group;
    }
}
