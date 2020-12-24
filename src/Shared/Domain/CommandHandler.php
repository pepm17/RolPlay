<?php

namespace Src\Shared\Domain;

interface CommandHandler
{
    public function handle(Command $command);
}
