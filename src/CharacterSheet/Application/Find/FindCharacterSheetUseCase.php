<?php

namespace Src\CharacterSheet\Application\Find;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Domain\Exception\CharacterSheetNotExist;
use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Dice;

final class FindCharacterSheetUseCase
{
    private CharacterSheetRepository $characterSheetRepository;

    public function __construct(CharacterSheetRepository $characterSheetRepository)
    {
        $this->characterSheetRepository = $characterSheetRepository;
    }

    public function __invoke(CharacterSheetId $id): CharacterSheet
    {
        $characterSheetModel = $this->characterSheetRepository->find($id);
        if (!$characterSheetModel) {
            throw new CharacterSheetNotExist("Character Sheet Not Found");
        }

        $characterSheetEntity = CharacterSheet::fromArray($characterSheetModel->toArray());

        foreach ($characterSheetModel->habilities as $habilityModel) {
            $characterSheetEntity->addHability(
                Hability::fromArray($habilityModel->toArray()),
                new Dice($habilityModel->pivot->points)
            );
        }

        return $characterSheetEntity;
    }
}
