<?php

namespace Src\Tabletop\Application\Create;

use Src\Shared\Domain\CommandBus;
use Src\Tabletop\Domain\Contracts\TabletopRepository;
use Src\Tabletop\Domain\Description;
use Src\Tabletop\Domain\Name;
use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Domain\TabletopId;
use Src\User\Application\FindByUsername\FindByUsernameCommand;
use Src\User\Domain\UserName;

final class CreateTabletopUseCase
{
    private TabletopRepository $tabletopRepository;
    private CommandBus $commandBus;

    public function __construct(
        TabletopRepository $tabletopRepository,
        CommandBus $commandBus
    ) {
        $this->tabletopRepository = $tabletopRepository;
        $this->commandBus = $commandBus;
    }

    public function __invoke(
        TabletopId $id,
        Name $name,
        Description $description,
        UserName $dungeonMaster
    ) {
        $this->userExist($dungeonMaster->getUserName());
        $tabletop = new Tabletop($id, $name, $description, $dungeonMaster);
        return $this->tabletopRepository->create($tabletop);
    }

    private function userExist(string $username): void
    {
        $command = new FindByUsernameCommand($username);
        $this->commandBus->execute($command);
    }
}
