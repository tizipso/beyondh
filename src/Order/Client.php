<?php

declare(strict_types=1);

namespace Beyondh\Order;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 添加订单
     *
     * 客户办理预定业务，预订下单接口
     *
     * @param float       $OrgId                  酒店Id
     * @param string      $EstimatedArriveTime    预抵时间
     * @param string      $EstimatedDepartureTime 预离时间
     * @param array       $RoomPlans              订房计划
     * @param array       $Liaisons               联系人信息
     * @param bool        $Locked                 是否锁房
     * @param string      $CheckInType            入住类型
     * @param string|null $MemberId               会员Id
     * @param float|null  $ContractId             中介/协议公司Id
     * @param string|null $SalerId                销售人员Id
     * @param string|null $ExpireKeepTime         保留时间
     * @param string|null $PrePaymentTypeId       担保类型
     * @param float       $PromotionId            促销策略Id
     * @param string|null $Memo                   订单备注
     * @param array|null  $ServiceItems           优惠服务包
     * @param string|null $OrderSn                订单号
     * @param string|null $OpenId                 微信Id(特定商户使用)
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function Add(float $OrgId, string $EstimatedArriveTime, string $EstimatedDepartureTime, array $RoomPlans, array $Liaisons, bool $Locked = true, string $CheckInType = 'Normal', string $MemberId = null, float $ContractId = null, string $SalerId = null, string $ExpireKeepTime = null, string $PrePaymentTypeId = null, float $PromotionId = 0, string $Memo = null, array $ServiceItems = null, string $OrderSn = null, string $OpenId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.Add',
                'content' => [
                    'CheckinType' => $CheckInType,
                    'OrgId' => $OrgId,
                    'EstimatedArriveTime' => $EstimatedArriveTime,
                    'EstimatedDepartureTime' => $EstimatedDepartureTime,
                    'RoomPlans' => $RoomPlans,
                    'MemberId' => $MemberId,
                    'ContractId' => $ContractId,
                    'SalerId' => $SalerId,
                    'Liaisons' => $Liaisons,
                    'Locked' => $Locked,
                    'ExpireKeepTime' => $ExpireKeepTime,
                    'PrePaymentTypeId' => $PrePaymentTypeId,
                    'PromotionId' => $PromotionId,
                    'Memo' => $Memo,
                    'ServiceItems' => $ServiceItems,
                    'OrderSn' => $OrderSn,
                    'OpenId' => $OpenId,
                ],
            ],
        ]);
    }

    /**
     * 添加自定义价订单
     *
     * 客户办理预定业务，预订下单接口，可以传入自定义价格
     *
     * @param float       $OrgId                  酒店Id
     * @param string      $EstimatedArriveTime    预抵时间
     * @param string      $EstimatedDepartureTime 预离时间
     * @param array       $RoomPlans              订房计划
     * @param array       $Liaisons               联系人信息
     * @param bool        $Locked                 是否锁房
     * @param string      $CheckInType            入住类型
     * @param string|null $MemberId               会员Id
     * @param float|null  $ContractId             中介/协议公司Id
     * @param string|null $SalerId                销售人员Id
     * @param string|null $ExpireKeepTime         保留时间
     * @param string|null $PrePaymentTypeId       预付类型
     * @param string|null $Memo                   订单备注
     * @param string|null $ExternalPriceName      自定义价格名称
     * @param array|null  $ServiceItems           优惠服务包
     * @param string|null $OrderSn                订单号
     * @param string|null $OpenId                 微信Id(特定商户使用)
     * @param bool|null   $UseCustomCheckoutTime  使用客户指定的离店时间(特定商户使用)
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddOrderWithCustomPrice(float $OrgId, string $EstimatedArriveTime, string $EstimatedDepartureTime, array $RoomPlans, array $Liaisons, bool $Locked = true, string $CheckInType = 'Normal', string $MemberId = null, float $ContractId = null, string $SalerId = null, string $ExpireKeepTime = null, string $PrePaymentTypeId = null, string $Memo = null, string $ExternalPriceName = null, array $ServiceItems = null, string $OrderSn = null, string $OpenId = null, bool $UseCustomCheckoutTime = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.AddOrderWithCustomPrice',
                'content' => [
                    'CheckinType' => $CheckInType,
                    'OrgId' => $OrgId,
                    'EstimatedArriveTime' => $EstimatedArriveTime,
                    'EstimatedDepartureTime' => $EstimatedDepartureTime,
                    'RoomPlans' => $RoomPlans,
                    'MemberId' => $MemberId,
                    'ContractId' => $ContractId,
                    'SalerId' => $SalerId,
                    'Liaisons' => $Liaisons,
                    'Locked' => $Locked,
                    'ExpireKeepTime' => $ExpireKeepTime,
                    'PrePaymentTypeId' => $PrePaymentTypeId,
                    'Memo' => $Memo,
                    'ExternalPriceName' => $ExternalPriceName,
                    'ServiceItems' => $ServiceItems,
                    'OrderSn' => $OrderSn,
                    'OpenId' => $OpenId,
                    'UseCustomCheckoutTime' => $UseCustomCheckoutTime,
                ],
            ],
        ]);
    }

    /**
     * 取消订单
     *
     * @param float  $OrgId   酒店Id
     * @param float  $OrderId 订单Id
     * @param string $Reason  取消原因
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function Cancel(float $OrgId, float $OrderId, string $Reason): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.Cancel',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderId' => $OrderId,
                    'Reason' => $Reason,
                ],
            ],
        ]);
    }

    /**
     * 查询单个订单信息
     *
     * @param float       $OrgId              酒店Id
     * @param float|null  $OrderId            订单Id
     * @param string|null $OrderSn            订单号
     * @param string|null $ChannelOrderSn     渠道订单号
     * @param bool        $IncludeOrgInfo     是否包含酒店信息
     * @param bool        $ExcludeOccupations 是否排除查询占房信息
     * @param bool        $SearchBalance      是否查询订单的余额
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QuerySingleOrder(float $OrgId, float $OrderId = null, string $OrderSn = null, string $ChannelOrderSn = null, bool $IncludeOrgInfo = false, bool $ExcludeOccupations = false, bool $SearchBalance = false): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QuerySingleOrder',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderId' => $OrderId,
                    'OrderSn' => $OrderSn,
                    'ChannelOrderSn' => $ChannelOrderSn,
                    'IncludeOrgInfo' => $IncludeOrgInfo,
                    'ExcludeOccupations' => $ExcludeOccupations,
                    'SearchBalance' => $SearchBalance,
                ],
            ],
        ]);
    }

    /**
     * @param float       $OrgId
     * @param string|null $MemberId
     * @param string|null $OpenId
     * @param string|null $Keywords
     * @param string|null $Channel
     * @param bool        $IncludeOrgInfo
     * @param string|null $BeginTime
     * @param string|null $EndTime
     * @param array|null  $OrderStatusIds
     * @param string|null $RoomNumber
     * @param string|null $IsFuzzyName
     * @param int         $PageSize
     * @param int         $PageIndex
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryOrders(float $OrgId, string $MemberId = null, string $OpenId = null, string $Keywords = null, string $Channel = null, bool $IncludeOrgInfo = false, string $BeginTime = null, string $EndTime = null, array $OrderStatusIds = null, string $RoomNumber = null, string $IsFuzzyName = null, int $PageSize = 15, int $PageIndex = 1): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryOrders',
                'content' => [
                    'OrgId' => $OrgId,
                    'MemberId' => $MemberId,
                    'OpenId' => $OpenId,
                    'Keywords' => $Keywords,
                    'Channel' => $Channel,
                    'BeginTime' => $BeginTime,
                    'EndTime' => $EndTime,
                    'OrderStatusIds' => $OrderStatusIds,
                    'RoomNumber' => $RoomNumber,
                    'IsFuzzyName' => $IsFuzzyName,
                    'PageSize' => $PageSize,
                    'PageIndex' => $PageIndex,
                ],
            ],
        ]);
    }

    /**
     * 查询可用市场活动
     *
     * @param float       $OrgId                  酒店Id
     * @param string      $EstimatedArriveTime    预抵时间
     * @param string      $EstimatedDepartureTime 预离时间
     * @param array       $RoomPlans              订房计划
     * @param bool        $Locked                 是否锁房
     * @param string      $CheckInType            入住类型
     * @param string|null $MemberId               会员Id
     * @param float|null  $ContractId             中介/协议公司Id
     * @param string|null $SalerId                销售人员Id
     * @param string|null $ExpireKeepTime         保留时间
     * @param string|null $PrePaymentTypeId       担保类型
     * @param float       $PromotionId            促销策略Id
     * @param string|null $Memo                   订单备注
     * @param array|null  $ServiceItems           优惠服务包
     * @param string|null $OrderSn                订单号
     * @param string|null $OpenId                 微信Id(特定商户使用)
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryOrderAvailablePromotions(float $OrgId, string $EstimatedArriveTime, string $EstimatedDepartureTime, array $RoomPlans, bool $Locked = true, string $CheckInType = 'Normal', string $MemberId = null, float $ContractId = null, string $SalerId = null, string $ExpireKeepTime = null, string $PrePaymentTypeId = null, float $PromotionId = 0, string $Memo = null, array $ServiceItems = null, string $OrderSn = null, string $OpenId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryOrderAvailablePromotions',
                'content' => [
                    'CheckinType' => $CheckInType,
                    'OrgId' => $OrgId,
                    'EstimatedArriveTime' => $EstimatedArriveTime,
                    'EstimatedDepartureTime' => $EstimatedDepartureTime,
                    'RoomPlans' => $RoomPlans,
                    'MemberId' => $MemberId,
                    'ContractId' => $ContractId,
                    'SalerId' => $SalerId,
                    'Locked' => $Locked,
                    'ExpireKeepTime' => $ExpireKeepTime,
                    'PrePaymentTypeId' => $PrePaymentTypeId,
                    'PromotionId' => $PromotionId,
                    'Memo' => $Memo,
                    'ServiceItems' => $ServiceItems,
                    'OrderSn' => $OrderSn,
                    'OpenId' => $OpenId,
                ],
            ],
        ]);
    }

    /**
     * 排房
     *
     * @param float  $OrgId        酒店Id
     * @param float  $OccupationId 占房Id
     * @param string $RoomNumber   房间号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function DispatchRoom(float $OrgId, float $OccupationId, string $RoomNumber): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.DispatchRoom',
                'content' => [
                    'OrgId' => $OrgId,
                    'OccupationId' => $OccupationId,
                    'RoomNumber' => $RoomNumber,
                ],
            ],
        ]);
    }

    /**
     * 办理入住
     *
     * @param float      $OrgId        酒店Id
     * @param float      $OrderId      订单Id
     * @param array      $Customer     入住客人信息
     * @param float|null $OccupationId 占房Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddCheckIn(float $OrgId, float $OrderId, array $Customer, float $OccupationId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.AddCheckin',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderId' => $OrderId,
                    'Customer' => $Customer,
                    'OccupationId' => $OccupationId,
                ],
            ],
        ]);
    }

    /**
     * 查询入住信息
     *
     * @param float       $OrgId         酒店Id
     * @param array|null  $OrderIds      订单Id
     * @param array|null  $OccupationIds 占房Id
     * @param array|null  $CheckInIds    接待单Id
     * @param array|null  $RoomNumbers   房间号
     * @param array|null  $CheckinStatus 接待单状态
     * @param string|null $MemberId      会员Id
     * @param string|null $Mobile        手机号
     * @param string|null $IdCardNumber  证件号
     * @param int         $PageSize      每页条数
     * @param int         $PageIndex     页码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryCheckins(float $OrgId, array $OrderIds = null, array $OccupationIds = null, array $CheckInIds = null, array $RoomNumbers = null, array $CheckinStatus = null, string $MemberId = null, string $Mobile = null, string $IdCardNumber = null, int $PageSize = 15, int $PageIndex = 1): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryCheckins',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderIds' => $OrderIds,
                    'OccupationIds' => $OccupationIds,
                    'CheckinIds' => $CheckInIds,
                    'RoomNumbers' => $RoomNumbers,
                    'CheckinStatus' => $CheckinStatus,
                    'MemberId' => $MemberId,
                    'Mobile' => $Mobile,
                    'IdCardNumber' => $IdCardNumber,
                    'PageSize' => $PageSize,
                    'PageIndex' => $PageIndex,
                ],
            ],
        ]);
    }

    /**
     * 查询在住单智能门锁信息
     *
     * @param float $OrgId             酒店Id
     * @param array $CheckInIds        接待单Ids
     * @param bool  $IncludeLockDetail 包含门锁详细信息
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryCheckInSmartDoorLocks(float $OrgId, array $CheckInIds, bool $IncludeLockDetail = false): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryCheckinSmartDoorLocks',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinIds' => $CheckInIds,
                    'IncludeLockDetail' => $IncludeLockDetail,
                ],
            ],
        ]);
    }

    /**
     * 开门
     *
     * @param float $OrgId     酒店Id
     * @param array $CheckInId 接待单Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function OpenCheckInSmartDoorLock(float $OrgId, array $CheckInId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.OpenCheckinSmartDoorLock',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                ],
            ],
        ]);
    }

    /**
     * 查询未生成过房费的房间号
     *
     * @param float $OrgId      酒店Id
     * @param array $CheckInIds 接待单Ids
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryUnGeneratedRoomRent(float $OrgId, array $CheckInIds): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryUnGeneratedRoomRent',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinIds' => $CheckInIds,
                ],
            ],
        ]);
    }

    /**
     * 查询需要加收房费的房间
     *
     * @param float $OrgId      酒店Id
     * @param array $CheckInIds 接待单Ids
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function QueryRoomRateCharge(float $OrgId, array $CheckInIds): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.QueryRoomRateCharge',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinIds' => $CheckInIds,
                ],
            ],
        ]);
    }

    /**
     * 退房
     *
     * @param float $OrgId                 酒店Id
     * @param array $CheckInIds            是否检查必须有房费
     * @param bool  $IsNeedCheckRoomRent   是否检查房费加收
     * @param bool  $IsNeedCheckRoomCharge 接待单Ids
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function Checkout(float $OrgId, array $CheckInIds, bool $IsNeedCheckRoomRent = true, bool $IsNeedCheckRoomCharge = true): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.Checkout',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinIds' => $CheckInIds,
                    'IsNeedCheckRoomRent' => $IsNeedCheckRoomRent,
                    'IsNeedCheckRoomCharge' => $IsNeedCheckRoomCharge,
                ],
            ],
        ]);
    }

    /**
     * 变更离店日期
     *
     * @param float       $OrgId              酒店Id
     * @param array       $CheckInId          接待单 Id
     * @param string      $OperateType        操作方式
     * @param string      $NewDepartureTime   新离店日期
     * @param string      $Reason             原因
     * @param string|null $ContinueLivePolicy 续住规则
     * @param array|null  $CustomDailyPrices  自定义价
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ChangeStay(float $OrgId, array $CheckInId, string $OperateType, string $NewDepartureTime, string $Reason, string $ContinueLivePolicy = null, array $CustomDailyPrices = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.ChangeStay',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                    'OperateType' => $OperateType,
                    'NewDepartureTime' => $NewDepartureTime,
                    'Reason' => $Reason,
                    'ContinueLivePolicy' => $ContinueLivePolicy,
                    'CustomDailyPrices' => $CustomDailyPrices,
                ],
            ],
        ]);
    }

    /**
     * 换房
     *
     * @param float  $OrgId          酒店Id
     * @param array  $CheckInId      接待单Id
     * @param string $DestRoomNumber 目标房间号
     * @param string $Memo           换房原因
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ChangeRoom(float $OrgId, array $CheckInId, string $DestRoomNumber, string $Memo): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.ChangeRoom',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                    'DestRoomNumber' => $DestRoomNumber,
                    'Memo' => $Memo,
                ],
            ],
        ]);
    }

    /**
     * 修改订单备注
     *
     * @param float  $OrgId   酒店Id
     * @param float  $OrderId 订单Id
     * @param string $Memo    备注
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateOrderMemo(float $OrgId, float $OrderId, string $Memo): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.UpdateOrderMemo',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrderId' => $OrderId,
                    'Memo' => $Memo,
                ],
            ],
        ]);
    }

    /**
     * 修改入住单备注
     *
     * @param float  $OrgId     酒店Id
     * @param float  $CheckInId 入住单Id
     * @param string $Memo      备注
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateCheckInMemo(float $OrgId, float $CheckInId, string $Memo): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Order.UpdateCheckinMemo',
                'content' => [
                    'OrgId' => $OrgId,
                    'CheckinId' => $CheckInId,
                    'Memo' => $Memo,
                ],
            ],
        ]);
    }
}