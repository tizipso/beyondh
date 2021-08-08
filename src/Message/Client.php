<?php

declare(strict_types=1);

namespace Beyondh\Message;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 发送短信
     *
     * @param string      $OrgId        酒店ID
     * @param string      $Mobile       手机号
     * @param string      $EventCode    事件类型
     * @param string      $Remark       备注信息
     * @param string|null $OrgName      酒店名称
     * @param string|null $OrgAddress   酒店地址
     * @param string|null $OrgPhone     酒店电话
     * @param string|null $BeginTime    入店时间
     * @param string|null $EndTime      离店时间
     * @param string|null $OrderNumber  订单号
     * @param string|null $Rooms        房间数
     * @param string|null $TotalValue   房费
     * @param string|null $MemberName   会员名称
     * @param string|null $EventTime    短信发送时间
     * @param string|null $ValueAmount  短信金额
     * @param string|null $ValueBalance 储值金额
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SendSms(string $OrgId, string $Mobile, string $EventCode, string $Remark, string $OrgName = null, string $OrgAddress = null, string $OrgPhone = null, string $BeginTime = null, string $EndTime = null, string $OrderNumber = null, string $Rooms = null, string $TotalValue = null, string $MemberName = null, string $EventTime = null, string $ValueAmount = null, string $ValueBalance = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Message.SendSms',
                'content' => [
                    'OrgId' => $OrgId,
                    'OrgName' => $OrgName,
                    'OrgAddress' => $OrgAddress,
                    'OrgPhone' => $OrgPhone,
                    'BeginTime' => $BeginTime,
                    'EndTime' => $EndTime,
                    'OrderNumber' => $OrderNumber,
                    'Rooms' => $Rooms,
                    'TotalValue' => $TotalValue,
                    'MemberName' => $MemberName,
                    'EventTime' => $EventTime,
                    'ValueAmount' => $ValueAmount,
                    'ValueBalance' => $ValueBalance,
                    'Mobile' => $Mobile,
                    'EventCode' => $EventCode,
                    'Remark' => $Remark,
                ],
            ],
        ]);
    }

    /**
     * 向PMS前台推送消息
     *
     * @param string      $OrgId                         酒店ID
     * @param string      $Content                       消息内容
     * @param string|null $MessageType                   消息类型
     * @param bool        $IsNeedConfirm                 消息弹出框是否需要手工确认
     * @param int         $DisplayDurationInMilliseconds 显示的时长
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function PushMessageToPmsFrontend(string $OrgId, string $Content, string $MessageType = null, bool $IsNeedConfirm = true, int $DisplayDurationInMilliseconds = 300): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Message.PushMessageToPmsFrontend',
                'content' => [
                    'OrgId' => $OrgId,
                    'Content' => $Content,
                    'MessageType' => $MessageType,
                    'IsNeedConfirm' => $IsNeedConfirm,
                    'DisplayDurationInMilliseconds' => $DisplayDurationInMilliseconds,
                ],
            ],
        ]);
    }
}