<?php

namespace Src\CharacterSheet\Domain;

final class CharacterSheetId
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
