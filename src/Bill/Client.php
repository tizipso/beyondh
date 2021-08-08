<?php

declare(strict_types=1);

namespace Beyondh\Bill;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 添加账务
     *
     * @param float       $OrgId           酒店Id
     * @param float       $BillId          账务Id
     * @param string      $BillItemType    账务类型
     * @param string      $SubItemType     账务科目
     * @param float       $Amount          金额
     * @param array       $PaymentRequest  支付附加信息
     * @param bool        $IsDeposit       是否是押金
     * @param string|null $Memo            摘要
     * @param float|null  $ExternalRefId   外部引用编号
     * @param array|null  $SmallWareOrders 小商品信息
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddBillItem(float $OrgId, float $BillId, string $BillItemType, string $SubItemType, float $Amount, array $PaymentRequest, bool $IsDeposit = false, string $Memo = null, float $ExternalRefId = null, array $SmallWareOrders = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.AddBillItem',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillId' => $BillId,
                    'BillItemType' => $BillItemType,
                    'SubItemType' => $SubItemType,
                    'IsDeposit' => $IsDeposit,
                    'Amount' => $Amount,
                    'Memo' => $Memo,
                    'PaymentRequest' => $PaymentRequest,
                    'ExternalRefId' => $ExternalRefId,
                    'SmallWareOrders' => $SmallWareOrders,
                ],
            ],
        ]);
    }

    /**
     * 查询账套内余额
     *
     * @param float $OrgId                   酒店Id
     * @param float $BillId                  账务Id
     * @param bool  $IncludePreAuthorization 是否包含预授权
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetBillBalance(float $OrgId, float $BillId, bool $IncludePreAuthorization = false): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.GetBillBalance',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillId' => $BillId,
                    'IncludePreAuthorization' => $IncludePreAuthorization,
                ],
            ],
        ]);
    }

    /**
     * 查询账务
     *
     * 账务Id/账务明细Ids 必填（2选1）
     *
     * @param float      $OrgId       酒店Id
     * @param float|null $BillId      账务Id
     * @param array|null $BillItemIds 账务明细Ids
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetBillItems(float $OrgId, float $BillId = null, array $BillItemIds = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.GetBillItems',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillId' => $BillId,
                    'BillItemIds' => $BillItemIds,
                ],
            ],
        ]);
    }

    /**
     * 添加在线支付记录
     *
     * @param float       $OrgId         酒店Id
     * @param float       $BillId        账务Id
     * @param string      $PayType       支付类型
     * @param float       $Amount        支付金额
     * @param string      $OperationType 操作类型
     * @param string|null $RoomDetail    房间详情
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddOnlinePayment(float $OrgId, float $BillId, string $PayType, float $Amount, string $OperationType, string $RoomDetail = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.AddOnlinePayment',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillId' => $BillId,
                    'RoomDetail' => $RoomDetail,
                    'PayType' => $PayType,
                    'Amount' => $Amount,
                    'OperationType' => $OperationType,
                ],
            ],
        ]);
    }

    /**
     * 修改在线支付记录
     *
     * @param float       $OrgId        酒店Id
     * @param float       $Id           在线支付Id
     * @param string      $OpenId       支付OpenId
     * @param string      $BankType     银行类型
     * @param string      $BankBillNo   银行Bill No
     * @param string      $NotifyId     通知Id
     * @param string      $TransctionId 付款交易流水号
     * @param string      $PayAmount    支付金额
     * @param string      $PayTime      支付时间
     * @param bool        $IsSuccess    是否成功
     * @param float       $BillItemId   入账明细ID
     * @param string|null $IdSerialNo   商户订单号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function UpdateOnlinePayment(float $OrgId, float $Id, string $OpenId, string $BankType, string $BankBillNo, string $NotifyId, string $TransctionId, string $PayAmount, string $PayTime, bool $IsSuccess, float $BillItemId, string $IdSerialNo = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.UpdateOnlinePayment',
                'content' => [
                    'OrgId' => $OrgId,
                    'Id' => $Id,
                    'IdSerialNo' => $IdSerialNo,
                    'OpenId' => $OpenId,
                    'BankType' => $BankType,
                    'BankBillNo' => $BankBillNo,
                    'NotifyId' => $NotifyId,
                    'TransctionId' => $TransctionId,
                    'PayAmount' => $PayAmount,
                    'PayTime' => $PayTime,
                    'IsSuccess' => $IsSuccess,
                    'BillItemId' => $BillItemId,
                ],
            ],
        ]);
    }

    /**
     * 查询支付结果
     *
     * @param float       $OrgId           酒店Id
     * @param string      $OutTradeNO      商户订单号
     * @param float       $OnlinepaymentId 在线支付Id
     * @param string      $PayType         支付类型
     * @param string|null $TransactionID   支付订单号
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchPayResult(float $OrgId, string $OutTradeNO, float $OnlinepaymentId, string $PayType, string $TransactionID = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.SearchPayResult',
                'content' => [
                    'OrgId' => $OrgId,
                    'OutTradeNO' => $OutTradeNO,
                    'TransactionID' => $TransactionID,
                    'OnlinepaymentId' => $OnlinepaymentId,
                    'PayType' => $PayType,
                ],
            ],
        ]);
    }

    /**
     * 在线支付
     *
     * @param float  $OrgId      酒店Id
     * @param string $PayType    支付方式
     * @param string $TradeType  交易类型，微信专用
     * @param string $OutTradeNO 商家订单号
     * @param float  $Amount     支付金额:单位元
     * @param string $Subject    订单标题
     * @param string $NotifyUrl  支付成功通知的Url
     * @param string $Attach     支付的附加参数，原样返回
     * @param string $ClientIP   发起支付的客户端IP
     * @param string $OpenId     发起交易客人openId
     * @param string $ExpireTime 支付过期时间
     * @param string $ProductId  商品Id，微信Native时必传
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function OnlinePay(float $OrgId, string $PayType, string $TradeType, string $OutTradeNO, float $Amount, string $Subject, string $NotifyUrl, string $Attach, string $ClientIP, string $OpenId, string $ExpireTime, string $ProductId = ''): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.OnlinePay',
                'content' => [
                    'OrgId' => $OrgId,
                    'PayType' => $PayType,
                    'TradeType' => $TradeType,
                    'OutTradeNO' => $OutTradeNO,
                    'Amount' => $Amount,
                    'Subject' => $Subject,
                    'NotifyUrl' => $NotifyUrl,
                    'Attach' => $Attach,
                    'ClientIP' => $ClientIP,
                    'OpenId' => $OpenId,
                    'ProductId' => $ProductId,
                    'ExpireTime' => $ExpireTime,
                ],
            ],
        ]);
    }

    /**
     * 新增预授权
     *
     * @param float  $OrgId           酒店Id
     * @param float  $BillId          账务Id
     * @param int    $GuaranteeType   预授权类型
     * @param float  $GuaranteeAmount 预授权金额
     * @param string $Memo            备注
     * @param array  $PaymentModel    支付信息
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddGuaranteeItem(float $OrgId, float $BillId, int $GuaranteeType, float $GuaranteeAmount, string $Memo, array $PaymentModel): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.AddGuaranteeItem',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillId' => $BillId,
                    'GuaranteeType' => $GuaranteeType,
                    'GuaranteeAmount' => $GuaranteeAmount,
                    'Memo' => $Memo,
                    'PaymentModel' => $PaymentModel,
                ],
            ],
        ]);
    }

    /**
     * 查询预授权信息
     *
     * @param float $OrgId   酒店Id
     * @param array $BillIds 账务Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetGuaranteeItems(float $OrgId, array $BillIds): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.GetGuaranteeItems',
                'content' => [
                    'OrgId' => $OrgId,
                    'BillIds' => $BillIds,
                ],
            ],
        ]);
    }

    /**
     * 取消预授权
     *
     * @param float $OrgId           酒店Id
     * @param float $GuaranteeItemId 预授权Id
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function CancelGuaranteeItems(float $OrgId, float $GuaranteeItemId): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.CancelGuaranteeItems',
                'content' => [
                    'OrgId' => $OrgId,
                    'GuaranteeItemId' => $GuaranteeItemId,
                ],
            ],
        ]);
    }

    /**
     * 完成预授权
     *
     * @param float $OrgId           酒店Id
     * @param float $GuaranteeItemId 预授权Id
     * @param float $UsedAmount      完成金额
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function CompleteGuaranteeItem(float $OrgId, float $GuaranteeItemId, float $UsedAmount): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.CompleteGuaranteeItem',
                'content' => [
                    'OrgId' => $OrgId,
                    'GuaranteeItemId' => $GuaranteeItemId,
                    'UsedAmount' => $UsedAmount,
                ],
            ],
        ]);
    }

    /**
     * 转账
     *
     * 转账，只能转入到已入住的账套，已结账套、现付账套不支持转出。 转入不支持已结账或挂账的账套和现付账套。
     *
     * @param float       $OrgId       酒店Id
     * @param array       $FromBillIds 转出账套
     * @param float       $ToBillId    转入账套
     * @param string|null $Reason      原因
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function Transfer(float $OrgId, array $FromBillIds, float $ToBillId, string $Reason = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.CompleteGuaranteeItem',
                'content' => [
                    'OrgId' => $OrgId,
                    'FromBillIds' => $FromBillIds,
                    'ToBillId' => $ToBillId,
                    'Reason' => $Reason,
                ],
            ],
        ]);
    }

    /**
     * 获取支付二维码
     *
     * 获取指定金额的扫码付二维码地址。 先添加待支付的在线支付记录，然后获取此地址生成二维码，供用户扫码支付。
     *
     * @param float       $OrgId           酒店Id
     * @param float       $OnlinePaymentId 待支付记录Id
     * @param string      $NotifyUrl       回调通知地址
     * @param string|null $Attach          附加信息
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetPayQrCode(float $OrgId, float $OnlinePaymentId, string $NotifyUrl, string $Attach = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Bill.GetPayQrCode',
                'content' => [
                    'OrgId' => $OrgId,
                    'OnlinePaymentId' => $OnlinePaymentId,
                    'NotifyUrl' => $NotifyUrl,
                    'Attach' => $Attach,
                ],
            ],
        ]);
    }


}