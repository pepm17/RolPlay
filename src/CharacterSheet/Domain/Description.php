<?php

namespace Src\CharacterSheet\Domain;


final class Description
{
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function value()
    {
        return $this->description;
    }
}
