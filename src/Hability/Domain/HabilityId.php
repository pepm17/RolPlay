<?php

namespace Src\Hability\Domain;

final class HabilityId
{
    private int $id;

    public function __construct(int $id)
    {
        $this->$id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
