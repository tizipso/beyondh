<?php

declare(strict_types=1);

namespace Beyondh\Kernel\Http;

use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use Beyondh\BeyondhInterface;
use GuzzleHttp\Psr7\Stream;
use Hyperf\Guzzle\PoolHandler;
use Hyperf\Utils\Coroutine;
use Psr\Http\Message\RequestInterface;

class Client
{
    protected ?BeyondhInterface $app = null;

    public ?HttpClient $client = null;

    private ?HandlerStack $stack = null;

    protected static array $httpConfig = [
        'base_uri' => 'https://openapi.beyondh.com',
    ];

    /**
     * @param BeyondhInterface $app
     */
    public function __construct(BeyondhInterface $app)
    {
        $this->app = $app;

        $url = $this->app['config']->get('url', []);

        $config = array_merge(static::$httpConfig, is_array($url) ? $url : ['base_uri' => $url]);

        $this->doHandler($config);
    }

    /**
     * @param array $config
     */
    public function setHttpConfig(array $config)
    {
        static::$httpConfig = array_merge(static::$httpConfig, $config);
    }

    public function doHandler(array $config)
    {
        $handler = null;

        if (Coroutine::inCoroutine() && ! $handler) {
            $handler = make(PoolHandler::class, [
                'option' => [
                    'max_connections' => 50,
                ],
            ]);
        }

        if (! $this->stack) {

            $this->stack = HandlerStack::create($handler);

            $this->withBodyRefactorMiddleware();
        }

        $client = make(HttpClient::class, [
            'config' => array_merge($config, [
                'handler' => $this->stack,
            ]),
        ]);

        $this->client = $client;
    }

    /**
     * Body 重构中间件
     */
    private function withBodyRefactorMiddleware()
    {
        $middleware = function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {

                $body = $request->getBody()->getContents();

                $domain = $this->app['config']->get('domain');

                if ($domain) $request = $request->withHeader('domain', $domain);

                if ($body) {
                    $content = json_decode($body, true);

                    if ($content && isset($content['method'])) {

                        if (isset($content['content']) && is_array($content['content'])) {
                            $content['content'] = array_filter($content['content'], function ($item) {
                                return ! is_null($item);
                            });
                        } else {
                            $content['content'] = [];
                        }

                        $content['content'] = ! empty($content['content']) ? $content['content'] : (object) $content['content'];
                        $params = $this->doHandlerBody($content);

                        $stream = fopen('php://memory', 'r+');
                        fwrite($stream, json_encode($params));
                        rewind($stream);

                        $request = $request->withBody(new Stream($stream));
                    }
                }

                return $handler($request, $options);
            };
        };

        $this->stack->push($middleware, 'body_refactor');
    }

    /**
     * 处理 Body 数据
     *
     * @param array $body
     * @return array
     */
    private function doHandlerBody(array $body): array
    {
        $now = Carbon::now();

        $params = [
            'ChannelKey' => $this->app['config']->get('channel_key'),
            'Method' => $body['method'],
            'BizContent' => json_encode($body['content']),
            'Timestamp' => $now->toDateTimeString(),
            'SignType' => 'MD5',
            'Format' => 'json',
            'Charset' => 'utf-8',
            'Version' => '1.0',
        ];

        $params['Sign'] = $this->doSign($params);

        return $params;
    }

    /**
     * 生成签名
     *
     * @param array $params
     * @return string
     */
    private function doSign(array $params = []): string
    {
        $params = array_filter($params, function ($item) {
            return ! empty($item);
        });

        $keys = array_keys($params);

        sort($keys);

        $values = [];

        foreach ($keys as $key) {
            $values[] = $key . '=' . $params[$key];
        }

        $str = empty($values) ? '' : implode('&', $values);

        $app_key = $this->app['config']->get('key', '');
        if ($app_key) $str .= $app_key;

        if (isset($params['sign_type']) && $params['sign_type'] === 'SHA256') {
            $sign = hash('sha256', $str);
        } else {
            $sign = md5($str);
        }

        return strtoupper($sign);
    }
}