<?php

namespace Src\Hability\Application\Create;

use Src\Hability\Domain\Contracts\HabilityRepository;
use Src\Hability\Domain\Hability;
use Src\Shared\Domain\CommandBus;
use Src\Tabletop\Application\Find\FindTabletopCommand;

final class CreateHabilityUseCase
{
    private HabilityRepository $habilityRepository;
    private CommandBus $commandBus;

    public function __construct(
        HabilityRepository $habilityRepository,
        CommandBus $commandBus
    ) {
        $this->habilityRepository = $habilityRepository;
        $this->commandBus = $commandBus;
    }

    public function __invoke(array $hability)
    {
        $this->verifyTabletop($hability['tabletop_id']);
        $hability = Hability::fromArray($hability);
        return $this->habilityRepository->create($hability);
    }

    private function verifyTabletop(string $idTabletop): void
    {
        $commandTabletop = new FindTabletopCommand(
            $idTabletop
        );
        $this->commandBus->execute($commandTabletop);
    }
}
