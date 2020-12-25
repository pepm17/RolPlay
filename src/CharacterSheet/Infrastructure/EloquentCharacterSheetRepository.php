<?php

namespace Src\CharacterSheet\Infrastructure;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Infrastructure\Eloquent\CharacterSheetEloquentModel;

final class EloquentCharacterSheetRepository implements CharacterSheetRepository
{
    public function create(CharacterSheet $characterSheet): ?array
    {
        return CharacterSheetEloquentModel::create($characterSheet->toArray())->toArray();
    }

    public function find(CharacterSheetId $charachetSheetId): ?CharacterSheetEloquentModel
    {
        return $characterSheetEloquentModel = CharacterSheetEloquentModel::find(
            $charachetSheetId->value()
        );
    }

    public function addHability(
        CharacterSheetEloquentModel $model,
        array $array
    ): void {
        $model->habilities()->attach(
            $array['idHability'],
            ['points' => $array['points']]
        );
    }
}
