<?php

namespace Src\Tabletop\Application\Find;

use Src\Shared\Domain\Command;

final class FindTabletopCommand implements Command
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
