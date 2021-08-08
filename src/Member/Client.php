<?php

declare(strict_types=1);

namespace Beyondh\Member;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 修改会员信息
     *
     * 在办理会员时没有填写完整的会员信息或者漏填的情况下可根据此接口修改会员信息。
     *
     * @param string      $MemberId  会员Id
     * @param string|null $Name      姓名
     * @param string|null $Mobile    手机号
     * @param string|null $IdType    证件类型
     * @param string|null $IdNo      证件号
     * @param string|null $Email     电子邮件地址
     * @param string|null $Gender    性别
     * @param string|null $Address   地址
     * @param string|null $ExtCardNo 外卡号
     * @param string|null $OrgId     酒店编号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateMember(string $MemberId, string $Name = null, string $Mobile = null, string $IdType = null, string $IdNo = null, string $Email = null, string $Gender = null, string $Address = null, string $ExtCardNo = null, string $OrgId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.UpdateMember',
                'content' => [
                    'MemberId' => $MemberId,
                    'Name' => $Name,
                    'Mobile' => $Mobile,
                    'IdType' => $IdType,
                    'IdNo' => $IdNo,
                    'Email' => $Email,
                    'Gender' => $Gender,
                    'Address' => $Address,
                    'ExtCardNo' => $ExtCardNo,
                    'OrgId' => $OrgId,
                ],
            ],
        ]);
    }

    /**
     * 登陆并绑定微信
     *
     * @param string $Mobile   手机号
     * @param string $Password 登陆密码
     * @param string $OpenId   微信OpenId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function LoginAndBinding(string $Mobile, string $Password, string $OpenId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.LoginAndBinding',
                'content' => [
                    'Mobile' => $Mobile,
                    'Password' => $Password,
                    'OpenId' => $OpenId,
                ],
            ],
        ]);
    }

    /**
     * 查询会员积分明细
     *
     * 查询会员一段时间内的所有积分，包括消费的和获取的
     *
     * @param string $MemberId  会员Id
     * @param string $StartDate 开始日期
     * @param string $EndDate   结束日期
     * @param int    $PageIndex 页码
     * @param int    $PageSize  每页数量
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchPoints(string $MemberId, string $StartDate, string $EndDate, int $PageIndex = 1, int $PageSize = 15): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.SearchPoints',
                'content' => [
                    'MemberId' => $MemberId,
                    'StartDate' => $StartDate,
                    'EndDate' => $EndDate,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize,
                ],
            ],
        ]);
    }

    /**
     * 查询会员储值明细
     *
     * 查询会员一段时间内的所有储值，包括消费的和获取的
     *
     * @param string $MemberId  会员Id
     * @param string $StartDate 开始日期
     * @param string $EndDate   结束日期
     * @param int    $PageIndex 页码
     * @param int    $PageSize  每页数量
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchValues(string $MemberId, string $StartDate, string $EndDate, int $PageIndex = 1, int $PageSize = 15): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.SearchValues',
                'content' => [
                    'MemberId' => $MemberId,
                    'StartDate' => $StartDate,
                    'EndDate' => $EndDate,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize,
                ],
            ],
        ]);
    }

    /**
     * 注册会员
     *
     * @param string      $Name        姓名
     * @param string      $Mobile      手机号
     * @param string|null $IdType      证件类型
     * @param string|null $IdNo        证件号
     * @param string|null $MemberLevel 会员级别
     * @param string|null $SalesId     销售员Id
     * @param string|null $Password    密码
     * @param string|null $Question    密码提示问题
     * @param string|null $Answer      密码提示问题的答案
     * @param string|null $OpenId      微信的OpenId
     * @param string|null $PublicNo    微信的PublicNo
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function RegisterMember(string $Name, string $Mobile, string $IdType = null, string $IdNo = null, string $MemberLevel = null, string $SalesId = null, string $Password = null, string $Question = null, string $Answer = null, string $OpenId = null, string $PublicNo = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.RegisterMember',
                'content' => [
                    'Name' => $Name,
                    'Mobile' => $Mobile,
                    'IdType' => $IdType,
                    'IdNo' => $IdNo,
                    'MemberLevel' => $MemberLevel,
                    'SalesId' => $SalesId,
                    'Password' => $Password,
                    'Question' => $Question,
                    'Answer' => $Answer,
                    'OpenId' => $OpenId,
                    'PublicNo' => $PublicNo,
                ],
            ],
        ]);
    }

    /**
     * 通过旧密码修改密码
     *
     * @param string $MemberId    会员Id
     * @param string $OldPassword 旧密码
     * @param string $NewPassword 新密码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ChangePasswordByOldPassword(string $MemberId, string $OldPassword, string $NewPassword): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.ChangePasswordByOldPassword',
                'content' => [
                    'MemberId' => $MemberId,
                    'OldPassword' => $OldPassword,
                    'NewPassword' => $NewPassword,
                ],
            ],
        ]);
    }

    /**
     * 通过手机号修改密码
     *
     * @param string $Mobile      手机号
     * @param string $NewPassword 新密码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ChangePasswordByMobile(string $Mobile, string $NewPassword): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.ChangePasswordByMobile',
                'content' => [
                    'Mobile' => $Mobile,
                    'NewPassword' => $NewPassword,
                ],
            ],
        ]);
    }

    /**
     * 微信查询会员
     *
     * @param string $OpenId 微信openId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetMemberByOpenId(string $OpenId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.GetMemberByOpenId',
                'content' => [
                    'OpenId' => $OpenId,
                ],
            ],
        ]);
    }

    /**
     * 搜索会员
     *
     * @param string|null $Name       姓名
     * @param string|null $Email      邮箱
     * @param string|null $Mobile     手机
     * @param string|null $CardNo     卡号
     * @param string|null $ExtCardNo  外卡号
     * @param string|null $IdNo       证件号
     * @param array|null  $MemberIds  会员Id
     * @param array|null  $Levels     会员级别
     * @param string|null $StatusCode 状态码
     * @param int         $PageIndex  页码
     * @param int         $PageSize   每页数量
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchMembers(string $Name = null, string $Email = null, string $Mobile = null, string $CardNo = null, string $ExtCardNo = null, string $IdNo = null, array $MemberIds = null, array $Levels = null, string $StatusCode = null, int $PageIndex = 1, int $PageSize = 15): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.SearchMembers',
                'content' => [
                    'Name' => $Name,
                    'Email' => $Email,
                    'Mobile' => $Mobile,
                    'CardNo' => $CardNo,
                    'ExtCardNo' => $ExtCardNo,
                    'IdNo' => $IdNo,
                    'MemberIds' => $MemberIds,
                    'Levels' => $Levels,
                    'StatusCode' => $StatusCode,
                    'PageIndex' => $PageIndex,
                    'PageSize' => $PageSize,
                ],
            ],
        ]);
    }

    /**
     * 添加积分
     *
     * @param string      $MemberId     会员Id
     * @param string      $OrgId        酒店ID
     * @param string      $PointWay     积分获取方式
     * @param float       $Point        积分
     * @param string      $Remark       备注
     * @param string      $PointChannel 积分产生渠道
     * @param string|null $CreateTime   操作时间
     * @param string|null $CreateBy     操作人
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AcquirePoint(string $MemberId, string $OrgId, string $PointWay, float $Point, string $Remark, string $PointChannel, string $CreateTime = null, string $CreateBy = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.AcquirePoint',
                'content' => [
                    'MemberId' => $MemberId,
                    'OrgId' => $OrgId,
                    'PointWay' => $PointWay,
                    'Point' => $Point,
                    'Remark' => $Remark,
                    'PointChannel' => $PointChannel,
                    'CreateTime' => $CreateTime,
                    'CreateBy' => $CreateBy,
                ],
            ],
        ]);
    }

    /**
     * 消费积分
     *
     * @param string      $MemberId     会员Id
     * @param string      $OrgId        酒店ID
     * @param string      $PointWay     积分消费方式
     * @param float       $Point        积分
     * @param string      $Remark       备注
     * @param string      $PointChannel 积分产生渠道
     * @param float       $RoomPrice    抵扣的现金金额
     * @param string|null $CreateTime   操作时间
     * @param string|null $CreateBy     操作人
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ConsumePoint(string $MemberId, string $OrgId, string $PointWay, float $Point, string $Remark, string $PointChannel, float $RoomPrice, string $CreateTime = null, string $CreateBy = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.ConsumePoint',
                'content' => [
                    'MemberId' => $MemberId,
                    'OrgId' => $OrgId,
                    'PointWay' => $PointWay,
                    'Point' => $Point,
                    'Remark' => $Remark,
                    'PointChannel' => $PointChannel,
                    'RoomPrice' => $RoomPrice,
                    'CreateTime' => $CreateTime,
                    'CreateBy' => $CreateBy,
                ],
            ],
        ]);
    }

    /**
     * 添加储值
     *
     * @param string $MemberId     会员Id
     * @param string $OrgId        酒店ID
     * @param string $MoneyWay     添加储值方式
     * @param float  $Value        充值金额
     * @param string $MoneyChannel 储值产生渠道
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AcquireValue(string $MemberId, string $OrgId, string $MoneyWay, float $Value, string $MoneyChannel): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.AcquireValue',
                'content' => [
                    'MemberId' => $MemberId,
                    'OrgId' => $OrgId,
                    'MoneyWay' => $MoneyWay,
                    'Value' => $Value,
                    'MoneyChannel' => $MoneyChannel,
                ],
            ],
        ]);
    }

    /**
     * 消费储值
     *
     * @param string $MemberId     会员Id
     * @param string $OrgId        酒店ID
     * @param string $MoneyWay     储值方式
     * @param float  $Value        消费金额
     * @param string $MoneyChannel 储值产生渠道
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function ConsumeValue(string $MemberId, string $OrgId, string $MoneyWay, float $Value, string $MoneyChannel): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.ConsumeValue',
                'content' => [
                    'MemberId' => $MemberId,
                    'OrgId' => $OrgId,
                    'MoneyWay' => $MoneyWay,
                    'Value' => $Value,
                    'MoneyChannel' => $MoneyChannel,
                ],
            ],
        ]);
    }

    /**
     * 停用单店会员储值手机验证码
     *
     * @param string $OrgId
     * @param bool   $Disable
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function DisableSingleHotelMemberMobileCode(string $OrgId, bool $Disable): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.DisableSingleHotelMemberMobileCode',
                'content' => [
                    'OrgId' => $OrgId,
                    'Disable' => $Disable,
                ],
            ],
        ]);
    }

    /**
     * 升级会员等级
     *
     * @param string      $OrgId       酒店ID
     * @param string|null $MemberId    会员编号
     * @param string|null $TargetLevel 目标等级
     * @param string|null $UpgradeWay  升级方式
     * @param string|null $CreatorName 创建人
     * @param string|null $Remark      备注
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpgradeMemberLevel(string $OrgId, string $MemberId = null, string $TargetLevel = null, string $UpgradeWay = null, string $CreatorName = null, string $Remark = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.UpgradeMemberLevel',
                'content' => [
                    'OrgId' => $OrgId,
                    'MemberId' => $MemberId,
                    'TargetLevel' => $TargetLevel,
                    'UpgradeWay' => $UpgradeWay,
                    'CreatorName' => $CreatorName,
                    'Remark' => $Remark,
                ],
            ],
        ]);
    }

    /**
     * 获取自动升级到下一等级所需的积分、储值和间夜
     *
     * @param string $MemberId 会员ID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetNextLevelCondition(string $MemberId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Member.GetNextLevelCondition',
                'content' => [
                    'MemberId' => $MemberId,
                ],
            ],
        ]);
    }
}