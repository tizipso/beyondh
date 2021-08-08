<?php

declare(strict_types=1);

namespace Beyondh\CashingBill;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询现付账套
     *
     * @param float      $OrgId
     * @param float|null $CashingBillId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function SearchCashingBills(float $OrgId, float $CashingBillId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'CashingBill.SearchCashingBills',
                'content' => [
                    'OrgId' => $OrgId,
                    'CashingBillId' => $CashingBillId,
                ],
            ],
        ]);
    }

    /**
     * 添加现付账套
     *
     * @param float  $OrgId        酒店Id
     * @param string $Name         账套名称
     * @param array  $BillProjects 对应的科目代码
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddCashingBill(float $OrgId, string $Name, array $BillProjects): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'CashingBill.AddCashingBill',
                'content' => [
                    'OrgId' => $OrgId,
                    'Name' => $Name,
                    'BillProjects' => $BillProjects,
                ],
            ],
        ]);
    }

    /**
     * 添加现付账
     *
     * @param float      $OrgId                酒店Id
     * @param float      $CashingBillId        应付帐账套Id
     * @param string     $BillProjectId        科目Id
     * @param float      $Amount               金额
     * @param string     $BillCreditTypeString 付款科目字符串
     * @param array      $SmallWareOrders      小商品
     * @param array      $CreditItem           付款条目
     * @param string     $Memo                 备注
     * @param float|null $TotalAmount          总金额
     * @param int|null   $ConfigId             会员卡充值活动ID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddCashingBillItem(float $OrgId, float $CashingBillId, string $BillProjectId, float $Amount, string $BillCreditTypeString, array $SmallWareOrders, array $CreditItem, string $Memo, float $TotalAmount = null, int $ConfigId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'CashingBill.AddCashingBillItem',
                'content' => [
                    'OrgId' => $OrgId,
                    'CashingBillId' => $CashingBillId,
                    'BillProjectId' => $BillProjectId,
                    'Amount' => $Amount,
                    'BillCreditTypeString' => $BillCreditTypeString,
                    'SmallWareOrders' => $SmallWareOrders,
                    'CreditItem' => $CreditItem,
                    'Memo' => $Memo,
                    'TotalAmount' => $TotalAmount,
                    'ConfigId' => $ConfigId,
                ],
            ],
        ]);
    }
}