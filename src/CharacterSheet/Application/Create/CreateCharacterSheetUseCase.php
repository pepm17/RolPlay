<?php

namespace Src\CharacterSheet\Application\Create;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Description;
use Src\CharacterSheet\Domain\LifePoints;
use Src\CharacterSheet\Domain\Name;

final class CreateCharacterSheetUseCase
{
    public function __invoke(array $data)
    {
        $characterSheet = new CharacterSheet(
            new CharacterSheetId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new LifePoints($data['lifePoints'])
        );
        return $characterSheet->toArray();
    }
}
