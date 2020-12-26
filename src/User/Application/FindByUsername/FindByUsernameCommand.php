<?php

namespace Src\User\Application\FindByUsername;

use Src\Shared\Domain\Command;

final class FindByUsernameCommand implements Command
{
    private string $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
