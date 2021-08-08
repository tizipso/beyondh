<?php

declare(strict_types=1);

namespace Beyondh\RoomQuota;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 根据房型修改直连房量
     *
     * @param string    $Channel            渠道
     * @param float     $OrgId              酒店Id
     * @param array     $RoomTypeIds        房型IDs
     * @param string    $BeginDate          开始时间
     * @param string    $EndDate            结束时间
     * @param bool|null $IsSetMaxSaleNumber 是否设置最多可售量
     * @param int|null  $MaxSaleNumber      最多可售量
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SetOtaRoomQuotaByRoomTypeId(string $Channel, float $OrgId, array $RoomTypeIds, string $BeginDate, string $EndDate, bool $IsSetMaxSaleNumber = null, int $MaxSaleNumber = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'RoomQuota.SetOtaRoomQuotaByRoomTypeId',
                'content' => [
                    'Channel' => $Channel,
                    'OrgId' => $OrgId,
                    'RoomTypeIds' => $RoomTypeIds,
                    'BeginDate' => $BeginDate,
                    'EndDate' => $EndDate,
                    'IsSetMaxSaleNumber' => $IsSetMaxSaleNumber,
                    'MaxSaleNumber' => $MaxSaleNumber,
                ],
            ],
        ]);
    }
}