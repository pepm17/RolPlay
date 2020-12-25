<?php

namespace Src\CharacterSheet\Application\Create;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Domain\Description;
use Src\CharacterSheet\Domain\LifePoints;
use Src\CharacterSheet\Domain\Name;

final class CreateCharacterSheetUseCase
{
    private $characterSheetRepository;

    public function __construct(CharacterSheetRepository $characterSheet)
    {
        $this->characterSheetRepository = $characterSheet;
    }

    public function __invoke(array $data)
    {
        $characterSheet = new CharacterSheet(
            new CharacterSheetId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new LifePoints($data['lifePoint'])
        );
        return $this->characterSheetRepository->create($characterSheet);
    }
}
