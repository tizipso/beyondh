<?php

declare(strict_types=1);

namespace Beyondh;

use Hyperf\Utils\Collection;
use Pimple\Container;

/**
 * @property Hotel\Client       $hotel
 * @property Order\Client       $order
 * @property Bill\Client        $bill
 * @property Coupon\Client      $coupon
 * @property Member\Client      $member
 * @property Customer\Client    $customer
 * @property CashingBill\Client $cashing
 * @property Configs\Client     $config
 * @property Message\Client     $message
 * @property Security\Client    $security
 * @property Price\Client       $price
 * @property RoomQuota\Client   $quota
 * @property RoomType\Client    $type
 * @property Ota\Client         $ota
 * @property Kernel\Http\Client $client
 */
class BeyondhInterface extends Container
{
    protected array $providers = [
        Hotel\ServiceProvider::class,
        Order\ServiceProvider::class,
        Bill\ServiceProvider::class,
        Coupon\ServiceProvider::class,
        Member\ServiceProvider::class,
        Customer\ServiceProvider::class,
        CashingBill\ServiceProvider::class,
        Configs\ServiceProvider::class,
        Message\ServiceProvider::class,
        Security\ServiceProvider::class,
        Price\ServiceProvider::class,
        RoomQuota\ServiceProvider::class,
        RoomType\ServiceProvider::class,
        Ota\ServiceProvider::class,
        Kernel\Providers\ClientServiceProvider::class,
    ];

    /**
     * BeyondhInterface constructor.
     */
    public function __construct(array $config = [], array $values = [])
    {
        parent::__construct($values);

        $this['config'] = function () use ($config) {
            $config = array_merge(config('beyondh', []), $config);
            return new Collection($config);
        };

        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this[$name];
    }
}
