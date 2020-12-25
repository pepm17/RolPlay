<?php

namespace Src\Hability\Domain\Contracts;

use Src\Hability\Domain\Hability;
use Src\Hability\Domain\HabilityId;

interface HabilityRepository
{
    public function create(Hability $hability): ?array;
    public function find(HabilityId $habilityId): ?array;
}
