<?php

namespace Src\Hability\Application;

use Src\Hability\Domain\Hability;

final class CreateHabilityUseCase
{
    public function __invoke(array $hability)
    {
        return Hability::fromArray($hability);
    }
}
