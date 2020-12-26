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

    public function find(CharacterSheetId $charachetSheetId): ?CharacterSheet
    {
        $characterSheetEloquentModel = CharacterSheetEloquentModel::find(
            $charachetSheetId->value()
        );
        if (!$characterSheetEloquentModel) {
            return null;
        }
        return CharacterSheet::fromArray($characterSheetEloquentModel->toArray());
    }

    public function addHability(
        CharacterSheetId $charachetSheetId,
        array $array
    ): ?CharacterSheet {
        $characterSheetEloquentModel = CharacterSheetEloquentModel::find(
            $charachetSheetId->value()
        );
        if (!$characterSheetEloquentModel) {
            return null;
        }

        $sync_data = [];
        for ($i = 0; $i < count($array['idHability']); $i++) {
            $sync_data[$array['idHability'][$i]] = ['points' => $array['points'][$i]];
        }
        $characterSheetEloquentModel->habilities()->sync($sync_data);

        return CharacterSheet::fromArray($characterSheetEloquentModel->toArray());
    }
}
