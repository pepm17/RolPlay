<?php

namespace Src\Tabletop\Application\Create;

use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class CreateTabletopCommand implements Command
{
    private string $id;
    private string $name;
    private string $description;
    private string $dungeonMaster;

    public function __construct(
        string $name,
        string $description,
        string $dungeonMaster
    ) {
        $this->id = UuidGenerator::generator();
        $this->name = $name;
        $this->description = $description;
        $this->dungeonMaster = $dungeonMaster;
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
    public function getDungeonMaster(): string
    {
        return $this->dungeonMaster;
    }

    public function toArray()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "dungeonMaster" => $this->dungeonMaster,
        ];
    }
}
