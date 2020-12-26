<?php

namespace Src\Hability\Application\Create;

use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class CreateHabilityCommand implements Command
{
    private $id;
    private $name;
    private $description;
    private $tabletopId;

    public function __construct(string $name, string $description, string $tabletopId)
    {
        $this->id = UuidGenerator::generator();
        $this->name = $name;
        $this->description = $description;
        $this->description = $description;
        $this->tabletopId = $tabletopId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getTabletopId(): string
    {
        return $this->tabletopId;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'tabletop_id' => $this->tabletopId
        ];
    }
}
