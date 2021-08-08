<?php

declare(strict_types=1);

namespace Beyondh\Customer;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 新增或更新客历信息
     *
     * @param string      $Name                   客人信息
     * @param string      $IdCardNumber           证件信息
     * @param string      $PersonalCredentialType 证件类型
     * @param string|null $CustomerId             客历ID
     * @param int         $Gender                 性别
     * @param string|null $Birthday               生日
     * @param string|null $Nationality            国籍
     * @param string|null $Province               省
     * @param string|null $City                   市
     * @param string|null $District               区
     * @param string|null $Race                   名族
     * @param string|null $Address                地址
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddOrUpdateCustomer(string $Name, string $IdCardNumber, string $PersonalCredentialType, string $CustomerId = null, int $Gender = 0, string $Birthday = null, string $Nationality = null, string $Province = null, string $City = null, string $District = null, string $Race = null, string $Address = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Customer.AddOrUpdateCustomer',
                'content' => [
                    'Name' => $Name,
                    'IdCardNumber' => $IdCardNumber,
                    'PersonalCredentialType' => $PersonalCredentialType,
                    'CustomerId' => $CustomerId,
                    'Gender' => $Gender,
                    'Birthday' => $Birthday,
                    'Nationality' => $Nationality,
                    'Province' => $Province,
                    'City' => $City,
                    'District' => $District,
                    'Race' => $Race,
                    'Address' => $Address,
                ],
            ],
        ]);
    }
}