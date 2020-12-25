<?php

namespace Src\Hability\Domain;

final class HabilityId
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
