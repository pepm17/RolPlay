<?php

namespace Src\CharacterSheet\Application\Find;

use Src\CharacterSheet\Domain\CharacterSheetId;

final class FindCharacterSheetCommandHandler
{
    private FindCharacterSheetUseCase $find;

    public function __construct(FindCharacterSheetUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindCharacterSheetCommand $command)
    {
        $characterSheetId = new CharacterSheetId($command->getId());
        $this->find->__invoke($characterSheetId);
    }
}
