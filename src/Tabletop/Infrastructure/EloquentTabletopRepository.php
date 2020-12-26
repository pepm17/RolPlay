<?php

namespace Src\Tabletop\Infrastructure;

use Src\Tabletop\Domain\Contracts\TabletopRepository;
use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Infrastructure\Eloquent\TabletopEloquentModel;

final class EloquentTabletopRepository implements TabletopRepository
{
    public function create(Tabletop $tabletop): ?array
    {
        return TabletopEloquentModel::create($tabletop->toArray())->toArray();
    }
}
