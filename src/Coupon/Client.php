<?php

declare(strict_types=1);

namespace Beyondh\Coupon;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询我的优惠券
     *
     * @param string      $MemberId     会员ID
     * @param string      $CouponStatus 优惠券状态
     * @param string|null $MobileNo     会员手机号
     * @param string|null $UserOtherId  用户其它标识
     * @param string|null $UserFromType 用户来源类型
     * @param int         $PageSize     分页大小
     * @param int         $PageIndex    页码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetMyCoupons(string $MemberId, string $CouponStatus, string $MobileNo = null, string $UserOtherId = null, string $UserFromType = null, int $PageSize = 1, int $PageIndex = 15): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.GetMyCoupons',
                'content' => [
                    'MemberId' => $MemberId,
                    'MobileNo' => $MobileNo,
                    'UserOtherId' => $UserOtherId,
                    'UserFromType' => $UserFromType,
                    'CouponStatus' => $CouponStatus,
                    'PageSize' => $PageSize,
                    'PageIndex' => $PageIndex,
                ],
            ],
        ]);
    }

    /**
     * 查询优惠券信息
     *
     * @param string $SerialNo 优惠券号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetCoupon(string $SerialNo): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.GetCoupon',
                'content' => [
                    'SerialNo' => $SerialNo,
                ],
            ],
        ]);
    }

    /**
     * 检查优惠券是否可用
     *
     * @param float  $OrgId      酒店ID
     * @param string $SerialNo   优惠券号
     * @param string $RoomTypeId 优惠房型
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function CheckCoupon(float $OrgId, string $SerialNo, string $RoomTypeId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.CheckCoupon',
                'content' => [
                    'OrgId' => $OrgId,
                    'SerialNo' => $SerialNo,
                    'RoomTypeId' => $RoomTypeId,
                ],
            ],
        ]);
    }

    /**
     * 查询可用的优惠券
     *
     * @param float       $OrgId            酒店ID
     * @param string      $RoomTypeId       优惠房型
     * @param array       $DeductionTypeIds 优惠券折扣类型
     * @param string      $MemberId         会员ID
     * @param string|null $MobileNo         会员手机号
     * @param string|null $UserOtherId      用户其它标识
     * @param string|null $UserFromType     用户来源类型
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetAvailableCoupons(float $OrgId, string $RoomTypeId, array $DeductionTypeIds, string $MemberId, string $MobileNo = null, string $UserOtherId = null, string $UserFromType = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.GetAvailableCoupons',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                    'DeductionTypeIds' => $DeductionTypeIds,
                    'MemberId' => $MemberId,
                    'MobileNo' => $MobileNo,
                    'UserOtherId' => $UserOtherId,
                    'UserFromType' => $UserFromType,
                ],
            ],
        ]);
    }

    /**
     * 使用优惠券
     *
     * @param float       $OrgId        酒店ID
     * @param string      $SerialNo     优惠券号
     * @param string      $RoomTypeId   优惠房型
     * @param float       $OrderId      订单号
     * @param float       $BillId       账务ID
     * @param string      $MemberId     会员ID
     * @param string|null $MobileNo     会员手机号
     * @param string|null $UserOtherId  用户其它标识
     * @param string|null $UserFromType 用户来源类型
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UseCoupon(float $OrgId, string $SerialNo, string $RoomTypeId, float $OrderId, float $BillId, string $MemberId, string $MobileNo = null, string $UserOtherId = null, string $UserFromType = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.UseCoupon',
                'content' => [
                    'OrgId' => $OrgId,
                    'SerialNo' => $SerialNo,
                    'RoomTypeId' => $RoomTypeId,
                    'OrderId' => $OrderId,
                    'BillId' => $BillId,
                    'MemberId' => $MemberId,
                    'MobileNo' => $MobileNo,
                    'UserOtherId' => $UserOtherId,
                    'UserFromType' => $UserFromType,
                ],
            ],
        ]);
    }

    /**
     * 查询优惠券模板
     *
     * @param float $TemplateId 优惠券模板Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetCouponTemplate(float $TemplateId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.GetCouponTemplate',
                'content' => [
                    'TemplateId' => $TemplateId,
                ],
            ],
        ]);
    }

    /**
     * 发放优惠券
     *
     * @param array       $PublishDetails    优惠券模板Id
     * @param string      $CouponPublishType 优惠券发放方式
     * @param string      $MemberId          会员ID
     * @param string      $MobileNo          会员手机号
     * @param string      $UserFromType      用户来源类型
     * @param string|null $UserOtherId       用户其它标识
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function Publish(array $PublishDetails, string $CouponPublishType, string $MemberId, string $MobileNo, string $UserFromType, string $UserOtherId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.Publish',
                'content' => [
                    'PublishDetails' => $PublishDetails,
                    'CouponPublishType' => $CouponPublishType,
                    'MemberId' => $MemberId,
                    'MobileNo' => $MobileNo,
                    'UserOtherId' => $UserOtherId,
                    'UserFromType' => $UserFromType,
                ],
            ],
        ]);
    }

    /**
     * 搜索优惠券模板
     *
     * @param float  $OrgId      酒店ID
     * @param string $RoomTypeId 优惠房型
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetCouponTemplates(float $OrgId, string $RoomTypeId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Coupon.Publish',
                'content' => [
                    'OrgId' => $OrgId,
                    'RoomTypeId' => $RoomTypeId,
                ],
            ],
        ]);
    }
}