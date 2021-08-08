<?php

declare(strict_types=1);

namespace Beyondh\Config;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询门店配置
     *
     * @param float       $OrgId    酒店Id
     * @param string      $Category 类别
     * @param string|null $Key      键
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOrgConfigs(float $OrgId, string $Category, string $Key = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Config.GetOrgConfigs',
                'content' => [
                    'OrgId' => $OrgId,
                    'Category' => $Category,
                    'Key' => $Key,
                ],
            ],
        ]);
    }

    /**
     * 查询集团配置
     *
     * @param string      $Category 类别
     * @param string|null $Key      键
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetOwnerConfigs(string $Category, string $Key = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Config.GetOwnerConfigs',
                'content' => [
                    'Category' => $Category,
                    'Key' => $Key,
                ],
            ],
        ]);
    }

    /**
     * 添加设备信息
     *
     * @param float       $OrgId           酒店Id
     * @param string      $Version         版本
     * @param string      $Category        类别
     * @param string      $Brand           品牌
     * @param string      $Model           型号
     * @param string|null $Sn              设备型号
     * @param string|null $Name            品牌名称
     * @param string|null $Config          配置信息
     * @param string|null $PluginVersionId 插件版本标识
     * @param string|null $BeginTime       有效期开始时间
     * @param string|null $EndTime         有效期结束时间
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function AddDevice(float $OrgId, string $Version, string $Category, string $Brand, string $Model, string $Sn = null, string $Name = null, string $Config = null, string $PluginVersionId = null, string $BeginTime = null, string $EndTime = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Config.AddDevice',
                'content' => [
                    'OrgId' => $OrgId,
                    'Version' => $Version,
                    'Category' => $Category,
                    'Brand' => $Brand,
                    'Model' => $Model,
                    'Sn' => $Sn,
                    'Name' => $Name,
                    'Config' => $Config,
                    'PluginVersionId' => $PluginVersionId,
                    'BeginTime' => $BeginTime,
                    'EndTime' => $EndTime,
                ],
            ],
        ]);
    }

    /**
     * 批量查询集团配置
     *
     * @param string $Category 配置类别
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetBulkOwnerConfig(string $Category): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Config.GetBulkOwnerConfig',
                'content' => [
                    'Category' => $Category,
                ],
            ],
        ]);
    }
}