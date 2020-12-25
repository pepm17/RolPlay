<?php

namespace Src\CharacterSheet\Application\AddHability;

use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Command;

final class AddHabilityCommand implements Command
{
    private $idCharacterSheet;
    private $idHability;
    private $points;

    public function __construct(string $idCharacterSheet, array $idHability, array $points)
    {
        $this->idCharacterSheet = $idCharacterSheet;
        $this->idHability = $idHability;
        $this->points = $points;
    }

    public function idCharacterSheet(): string
    {
        return $this->idCharacterSheet;
    }

    public function idHability(): array
    {
        return $this->idHability;
    }
    public function points(): array
    {
        return $this->points;
    }

    public function toArray(): array
    {
        return [
            'idCharacterSheet' => $this->idCharacterSheet,
            'idHability' => $this->idHability,
            'points' => $this->points,
        ];
    }
}
