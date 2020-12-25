<?php

namespace Src\CharacterSheet\Domain\Contracts;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Infrastructure\Eloquent\CharacterSheetEloquentModel;

interface CharacterSheetRepository
{
    public function create(CharacterSheet $characterSheet): ?array;
    public function find(CharacterSheetId $charachetSheetId): ?CharacterSheetEloquentModel;
    public function addHability(
        CharacterSheetEloquentModel $model,
        array $array
    ): void;
}
