<?php

namespace Src\CharacterSheet\Application\Create;

use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Command;

final class CreateCharacterSheetCommand implements Command
{
    private $id;
    private $name;
    private $description;
    private $lifePoints;

    public function __construct(string $name, string $description, int $lifePoints)
    {
        $this->id = 1;
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
            'id' => 22,
            'name' => $this->name,
            'description' => $this->description,
            'lifePoints' => $this->lifePoints,
        ];
    }
}
