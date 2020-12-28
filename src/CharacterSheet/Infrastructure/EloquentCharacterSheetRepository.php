<?php

namespace Src\CharacterSheet\Infrastructure;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetHability;
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


        $characterSheetEntity = CharacterSheet::fromArray($characterSheetEloquentModel->toArray());

        $habilities = [];
        foreach ($characterSheetEloquentModel->habilities as $hability) {
            $habilities[$hability->toArray()['name']] = $hability->toArray()->pivot['points'];
            dd($hability);
        }
        $characterSheetEntity->addHability(
            new CharacterSheetHability($habilities)
        );

        return $characterSheetEntity;
    }

    public function addHability(
        CharacterSheetId $charachetSheetId,
        array $idHability,
        array $points
    ): void {
        $characterSheetEloquentModel = CharacterSheetEloquentModel::find(
            $charachetSheetId->value()
        );

        $attach_data = [];
        for ($i = 0; $i < count($idHability); $i++) {
            $attach_data[$idHability[$i]] = ['points' => $points[$i]];
        }
        $characterSheetEloquentModel->habilities()->attach($attach_data);
    }
}
