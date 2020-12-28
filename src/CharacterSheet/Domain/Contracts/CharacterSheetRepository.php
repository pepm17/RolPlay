<?php

namespace Src\CharacterSheet\Domain\Contracts;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;

interface CharacterSheetRepository
{
    public function create(CharacterSheet $characterSheet): ?array;
    public function find(CharacterSheetId $charachetSheetId): ?CharacterSheet;
    public function addHability(
        CharacterSheetId $model,
        array $idHability,
        array $points
    ): void;
}
