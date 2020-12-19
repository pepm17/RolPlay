<?php

namespace Src\Shared\Domain;

final class Dice
{
    private int $result;

    public function __constructor(int $result)
    {
        $this->result = $result;
    }

    public function getResultDice()
    {
        return $this->result;
    }
}
