<?php

namespace Src\CharacterSheet\Application\Find;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetHability;
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
        $characterSheetEntity = $this->characterSheetRepository->find($id);
        if (!$characterSheetEntity) {
            throw new CharacterSheetNotExist("Character Sheet Not Found");
        }

        return $characterSheetEntity;
    }
}
