<?php

namespace Src\Tabletop\Domain\Contracts;

use Src\Tabletop\Domain\Tabletop;

interface TabletopRepository
{
    public function create(Tabletop $tabletop): ?array;
}
