<?php

namespace Src\Tabletop\Domain;

final class TabletopId
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
