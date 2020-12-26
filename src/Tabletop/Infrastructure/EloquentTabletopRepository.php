<?php

namespace Src\Tabletop\Infrastructure;

use Src\Tabletop\Domain\Contracts\TabletopRepository;
use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Domain\TabletopId;
use Src\Tabletop\Infrastructure\Eloquent\TabletopEloquentModel;

final class EloquentTabletopRepository implements TabletopRepository
{
    public function create(Tabletop $tabletop): ?array
    {
        return TabletopEloquentModel::create($tabletop->toArray())->toArray();
    }
    public function find(TabletopId $tabletopId): ?Tabletop
    {
        $tabletopModel = TabletopEloquentModel::find($tabletopId->value());
        if (!$tabletopModel) {
            return null;
        }
        return Tabletop::fromArray($tabletopModel->toArray());
    }
}
