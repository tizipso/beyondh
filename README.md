# Hyperf 别样红组件

### [别样红在线文档](https://docs.beyondh.com/)

### 环境要求

- PHP >= 8.0
- [Composer](https://getcomposer.org/)

### 安装

```php
composer require tizipso/beyondh
```

### 发布配置

```php
php bin/hyperf.php vendor:publish tizipso/beyondh
```

> 配置文件位于 `config/autoload/beyondh.php`

### 使用

```php
# $config 不传值，将从配置文件中读取
$config = [
    'url' => '',
    'domain' => '',
    'app_key' => '',
    'channel_key' => '',
];

$beyondh = new BeyondhInterface($config);

$request = $beyondh->hotel->GetOrgs(PageIndex: 1);
```

### 日志打印到文件

> 添加以下代码到 `config/autoload/logger.php` 中

```php
    'beyondh' => [
        'handler' => [
            'class' => Monolog\Handler\StreamHandler::class,
            'constructor' => [
                'stream' => BASE_PATH . '/runtime/logs/beyondh.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => 'Y-m-d H:i:s',
                'allowInlineLineBreaks' => true,
            ],
        ],
    ],
```