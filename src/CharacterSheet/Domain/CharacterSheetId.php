<?php

namespace Src\CharacterSheet\Domain;

final class CharacterSheetId
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
