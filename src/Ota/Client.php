<?php

declare(strict_types=1);

namespace Beyondh\Ota;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询酒店在指定渠道的所有房型
     *
     * @param float  $OrgId   酒店Id
     * @param string $Channel 渠道
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOtaRoomTypesByOrgId(float $OrgId, string $Channel): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Ota.GetOtaRoomTypesByOrgId',
                'content' => [
                    'OrgId' => $OrgId,
                    'Channel' => $Channel,
                ],
            ],
        ]);
    }
}