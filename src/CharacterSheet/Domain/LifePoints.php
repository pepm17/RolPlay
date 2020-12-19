<?php

namespace Src\CharacterSheet\Domain;

final class LifePoints
{
    private int $lifePoints;

    public function __construct(int $lifePoints)
    {
        $this->lifePoints = $lifePoints;
    }

    public function value()
    {
        return $this->lifePoints;
    }
}
