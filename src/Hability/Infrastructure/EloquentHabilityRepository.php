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
    public function find(HabilityId $habilityId): ?array
    {
        $habilityId = HabilityEloquentModel::find(
            $habilityId->value()
        );
        if (!$habilityId) {
            return null;
        }
        return $habilityId->toArray();
    }
}
