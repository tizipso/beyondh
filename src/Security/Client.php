<?php

declare(strict_types=1);

namespace Beyondh\Security;

use Beyondh\Kernel\BasicClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BasicClient
{
    /**
     * 查询所有角色信息
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetRoles(): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Security.GetRoles',
            ],
        ]);
    }

    /**
     * PMS登录授权
     *
     * @param string     $UserName 用户名
     * @param string     $Password 密码
     * @param float|null $OrgId    登录门店
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function LoginPms(string $UserName, string $Password, float $OrgId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Security.LoginPms',
                'content' => [
                    'UserName' => $UserName,
                    'Password' => $Password,
                    'OrgId' => $OrgId,
                ]
            ],
        ]);
    }

    /**
     * 根据SessionId获取用户信息
     *
     * @param string     $SessionId SessionId
     * @param float|null $OrgId     登录门店
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function GetUserBySessionId(string $SessionId, float $OrgId = null): ResponseInterface
    {
        return $this->http->client->post('', [
            'json' => [
                'method' => 'Security.GetUserBySessionId',
                'content' => [
                    'SessionId' => $SessionId,
                    'OrgId' => $OrgId,
                ]
            ],
        ]);
    }
}