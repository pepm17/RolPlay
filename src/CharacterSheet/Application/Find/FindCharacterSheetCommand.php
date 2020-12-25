<?php

namespace Src\CharacterSheet\Application\Find;

use Src\Shared\Domain\Command;

final class FindCharacterSheetCommand implements Command
{
    private $idCharacterSheet;

    public function __construct(string $idCharacterSheet)
    {
        $this->idCharacterSheet = $idCharacterSheet;
    }

    public function getId(): string
    {
        return $this->idCharacterSheet;
    }
}
