<?php

declare(strict_types=1);

namespace Beyondh\Kernel;

use Beyondh\BeyondhInterface;
use Beyondh\Kernel\Http\Client;

class BasicClient
{
    protected BeyondhInterface $app;

    protected Client $http;

    /**
     * Client constructor.
     *
     * @param BeyondhInterface $app
     */
    public function __construct(BeyondhInterface $app)
    {
        $this->app = $app;
        $this->http = $this->app['client'];
    }
}