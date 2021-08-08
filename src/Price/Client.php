<?php

declare(strict_types=1);

namespace Beyondh\Price;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 根据房价码修改固定价
     *
     * @param string      $RateCode   房价码
     * @param float       $OrgId      酒店Id
     * @param string      $RoomTypeId 房型ID
     * @param float       $Price      房价
     * @param string|null $BeginDate  开始时间
     * @param string|null $EndDate    结束时间
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SetPriceByRateCode(string $RateCode, float $OrgId, string $RoomTypeId, float $Price, string $BeginDate = null, string $EndDate = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Price.SetPriceByRateCode',
                'content' => [
                    'RateCode' => $RateCode,
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                    'Price' => $Price,
                    'BeginDate' => $BeginDate,
                    'EndDate' => $EndDate,
                ],
            ],
        ]);
    }

    /**
     * 根据房型修改Mtop和QZAgent渠道价格
     *
     * @param string     $Channel           渠道
     * @param float      $OrgId             酒店Id
     * @param string     $RoomTypeId        房型ID
     * @param float      $NormalPrice       平日价
     * @param string     $BeginDate         开始时间
     * @param string     $EndDate           结束时间
     * @param bool       $IsSetWeekendPrice 是否设置周末价
     * @param float|null $WeekendPrice      周末价
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SetPriceByRoomTypeId(string $Channel, float $OrgId, string $RoomTypeId, float $NormalPrice, string $BeginDate, string $EndDate, bool $IsSetWeekendPrice = false, float $WeekendPrice = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Price.SetPriceByRoomTypeId',
                'content' => [
                    'Channel' => $Channel,
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                    'NormalPrice' => $NormalPrice,
                    'IsSetWeekendPrice' => $IsSetWeekendPrice,
                    'WeekendPrice' => $WeekendPrice,
                    'BeginDate' => $BeginDate,
                    'EndDate' => $EndDate,
                ],
            ],
        ]);
    }

    /**
     * 设置轻住微信小程序房价策略酒店范围
     *
     * @param float $OrgId 酒店Id
     * @param bool  $Add   增加
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SetQingzhuPolicyOrg(float $OrgId, bool $Add): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Price.SetQingzhuPolicyOrg',
                'content' => [
                    'OrgId' => $OrgId,
                    'Add' => $Add,
                ],
            ],
        ]);
    }
}