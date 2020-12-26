<?php

namespace Src\Hability\Application\Find;

use Src\Hability\Domain\Contracts\HabilityRepository;
use Src\Hability\Domain\Exceptions\HabilityNotExist;
use Src\Hability\Domain\Hability;
use Src\Hability\Domain\HabilityId;

final class FindHabilityUseCase
{
    private HabilityRepository $habilityRepository;

    public function __construct(HabilityRepository $habilityRepository)
    {
        $this->habilityRepository = $habilityRepository;
    }

    public function __invoke(array $array): Hability
    {
        $habilityId = new HabilityId($array['id']);
        $habilityEntity = $this->habilityRepository->find($habilityId);
        if (!$habilityEntity) {
            throw new HabilityNotExist("Hability Not Exist");
        }
        return $habilityEntity;
    }
}
