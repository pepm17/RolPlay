<?php

namespace Src\Shared\Infrastructure;

use Src\Shared\Domain\Command;
use Src\Shared\Domain\CommandBus;
use Src\Shared\Domain\Container;
use Src\Shared\Domain\Inflector;

final class InMemoryLaravelCommandBus implements CommandBus
{
    private $container;
    private $inflector;

    public function __construct(Container $container, Inflector $inflector)
    {
        $this->container = $container;
        $this->inflector = $inflector;
    }

    public function execute(Command $command)
    {
        return $this->handler($command)->handle($command);
    }

    private function handler(Command $command)
    {
        $class = $this->inflector->inflect($command);
        return $this->container->make($class);
    }
}
