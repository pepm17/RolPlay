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
        $tableTopEntity = Tabletop::fromArray($tabletopModel->toArray());

        $users = [];
        foreach ($tabletopModel->players as $tableUser) {
            $users[] = $tableUser->toArray()['username'];
        }
        $tableTopEntity->addPlayers($users);

        return $tableTopEntity;
    }

    public function addPlayer(
        TabletopId $tabletopId,
        array $usersId
    ): void {

        $tabletopModel = TabletopEloquentModel::find($tabletopId->value());
        $tabletopModel->players()->attach($usersId);
    }
}
