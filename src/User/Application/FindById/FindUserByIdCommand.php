<?php

namespace Src\User\Application\FindById;

use Src\Shared\Domain\Command;

final class FindUserByIdCommand implements Command
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
