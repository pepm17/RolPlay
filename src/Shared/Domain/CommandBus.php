<?php

namespace Src\Shared\Domain;

interface CommandBus
{
    public function execute(Command $command);
}
