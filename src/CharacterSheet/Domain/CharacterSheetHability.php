<?php

namespace Src\CharacterSheet\Domain;

final class CharacterSheetHability
{
    private array $habilities;

    public function __construct(array $habilities)
    {
        $this->habilities = $habilities;
    }

    public function value()
    {
        return $this->habilities;
    }
}
