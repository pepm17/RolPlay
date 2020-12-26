<?php

namespace Src\Tabletop\Domain\Contracts;

use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Domain\TabletopId;

interface TabletopRepository
{
    public function find(TabletopId $tabletopId): ?Tabletop;
    public function create(Tabletop $tabletop): ?array;
}
