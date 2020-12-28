<?php

namespace Src\Tabletop\Application\AddPlayer;

use Src\Shared\Domain\CommandBus;
use Src\Tabletop\Application\Find\FindTabletopCommand;
use Src\Tabletop\Domain\Contracts\TabletopRepository;
use Src\Tabletop\Domain\Exceptions\TabletopNotExist;
use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Domain\TabletopId;
use Src\User\Application\FindById\FindUserByIdCommand;

final class AddPlayerUseCase
{
    private CommandBus $commandBus;
    private TabletopRepository $tabletopRepository;

    public function __construct(
        CommandBus $commandBus,
        TabletopRepository $tabletopRepository
    ) {
        $this->commandBus = $commandBus;
        $this->tabletopRepository = $tabletopRepository;
    }

    public function __invoke(array $data): array
    {
        $tabletopEntity = $this->findTabletop($data['tabletop_id']);
        $players = $this->usersInArray($tabletopEntity, $data['user_id']);

        $tabletopEntity->addPlayers($players);

        $this->tabletopRepository->addPlayer(
            new TabletopId($tabletopEntity->toArray()['id']),
            $players
        );

        return $tabletopEntity->toArray();
    }

    private function findTabletop(string $id): Tabletop
    {
        return $this->commandBus->execute(
            new FindTabletopCommand($id)
        );
    }

    private function usersInArray(Tabletop $tabletop, array $usersId): array
    {
        $players = [];
        $tablePlayers = $tabletop->toArray()['dungeonMaster'];

        for ($i = 0; $i < count($usersId); $i++) {
            $user = $this->commandBus->execute(
                new FindUserByIdCommand($usersId[$i])
            );
            if ($user->toArray()['username'] !== $tablePlayers) {
                $players[] = $user->toArray()['username'];
            }
        }

        return $players;
    }
}
