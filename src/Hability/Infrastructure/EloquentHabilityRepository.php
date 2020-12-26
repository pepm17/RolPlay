<?php

namespace Src\Hability\Infrastructure;

use Src\Hability\Domain\Contracts\HabilityRepository;
use Src\Hability\Domain\Hability;
use Src\Hability\Domain\HabilityId;
use Src\Hability\Infrastructure\Eloquent\HabilityEloquentModel;

final class EloquentHabilityRepository implements HabilityRepository
{
    public function create(Hability $hability): ?array
    {
        return HabilityEloquentModel::create($hability->toArray())->toArray();
    }
    public function find(HabilityId $habilityId): ?Hability
    {
        $habilityEloquent = HabilityEloquentModel::find(
            $habilityId->value()
        );
        if (!$habilityEloquent) {
            return null;
        }
        return Hability::fromArray($habilityEloquent->toArray());
    }
}
