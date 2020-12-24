<?php

namespace Src\Shared\Infrastructure;

use Illuminate\Contracts\Container\Container as IoC;
use Src\Shared\Domain\Container;

final class LaravelContainer implements Container
{
    private $container;

    public function __construct(IoC $container)
    {
        $this->container = $container;
    }

    public function make($class)
    {
        return $this->container->make($class);
    }
}
