<?php

namespace Src\CharacterSheet\Domain;

final class Name
{
    private string $name;

    public function __construct(string $name)
    {
        $this->$name = $name;
    }

    public function value()
    {
        return $this->name;
    }
}
