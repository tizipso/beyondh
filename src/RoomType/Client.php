<?php

declare(strict_types=1);

namespace Beyondh\RoomType;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询床型
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetBedTypes(): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'RoomType.GetBedTypes',
            ],
        ]);
    }

    /**
     * 修改房型接口
     *
     * @param float       $OrgId       酒店Id
     * @param string      $RoomTypeId  房型编码
     * @param array       $BedTypes    床型集合
     * @param int         $Capacity    可住人数
     * @param int         $RoomArea    房间面积
     * @param int         $Washroom    房间面积
     * @param int         $Window      有窗情况
     * @param string|null $Description 描述
     * @param string|null $ImageUris   房型图片地址
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateOrgRoomType(float $OrgId, string $RoomTypeId, array $BedTypes, int $Capacity, int $RoomArea, int $Washroom, int $Window, string $Description = null, string $ImageUris = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'RoomType.UpdateOrgRoomType',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                    'BedTypes' => $BedTypes,
                    'Capacity' => $Capacity,
                    'RoomArea' => $RoomArea,
                    'Washroom' => $Washroom,
                    'Window' => $Window,
                    'Description' => $Description,
                    'ImageUris' => $ImageUris,
                ]
            ],
        ]);
    }

    /**
     * 查询可选房间的房间特征
     *
     * @param float $OrgId   酒店Id
     * @param float $OrderId 订单号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrderAvailableRoomsAttributes(float $OrgId, float $OrderId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'RoomType.GetOrderAvailableRoomsAttributes',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderId' => $OrderId,
                ]
            ],
        ]);
    }
}