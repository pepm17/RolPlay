<?php

namespace Src\Hability\Application\Create;

use Src\Hability\Domain\Contracts\HabilityRepository;
use Src\Hability\Domain\Hability;

final class CreateHabilityUseCase
{
    private HabilityRepository $habilityRepository;

    public function __construct(HabilityRepository $habilityRepository)
    {
        $this->habilityRepository = $habilityRepository;
    }

    public function __invoke(array $hability)
    {
        $hability = Hability::fromArray($hability);
        return $this->habilityRepository->create($hability);
    }
}
