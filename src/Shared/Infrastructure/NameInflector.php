<?php

namespace Src\Shared\Infrastructure;

use Src\Shared\Domain\Command;
use Src\Shared\Domain\Inflector;

final class NameInflector implements Inflector
{
    private const COMMAND_PREFIX = 'Command';
    private const HANDLER_PREFIX = 'CommandHandler';

    public function inflect(Command $command)
    {
        return str_replace(
            self::COMMAND_PREFIX,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }
}
