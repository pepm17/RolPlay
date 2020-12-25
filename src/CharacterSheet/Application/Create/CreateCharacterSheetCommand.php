<?php

namespace Src\CharacterSheet\Application\Create;

use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class CreateCharacterSheetCommand implements Command
{
    private $id;
    private $name;
    private $description;
    private $lifePoints;

    public function __construct(string $name, string $description, int $lifePoints)
    {
        $this->id = UuidGenerator::generator();
        $this->name = $name;
        $this->description = $description;
        $this->lifePoints = $lifePoints;
    }

    public function getId(): int
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
    public function getLifePoint(): string
    {
        return $this->lifePoints;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'lifePoint' => $this->lifePoints,
        ];
    }
}
