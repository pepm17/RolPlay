<?php

namespace Src\CharacterSheet\Application;

use Src\CharacterSheet\Domain\CharacterSheet;

final class CreateCharacterSheetUseCase
{
    public function __invoke(array $array)
    {
        return CharacterSheet::fromArray($array);
    }
}
