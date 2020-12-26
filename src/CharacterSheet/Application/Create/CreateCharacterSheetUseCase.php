<?php

namespace Src\CharacterSheet\Application\Create;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Domain\Description;
use Src\CharacterSheet\Domain\LifePoints;
use Src\CharacterSheet\Domain\Name;
use Src\Shared\Domain\CommandBus;
use Src\Tabletop\Application\Find\FindTabletopCommand;
use Src\Tabletop\Domain\TabletopId;
use Src\User\Application\FindById\FindUserByIdCommand;
use Src\User\Domain\UserId;

final class CreateCharacterSheetUseCase
{
    private $characterSheetRepository;
    private CommandBus $commandBus;

    public function __construct(
        CharacterSheetRepository $characterSheet,
        CommandBus $commandBus
    ) {
        $this->characterSheetRepository = $characterSheet;
        $this->commandBus = $commandBus;
    }

    public function __invoke(array $data)
    {
        $this->verifyTabletop($data['tabletop_id']);
        $this->verifyUser($data['user_id']);

        $characterSheet = new CharacterSheet(
            new CharacterSheetId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new LifePoints($data['lifePoint']),
            new TabletopId($data['tabletop_id']),
            new UserId($data['user_id'])
        );

        return $this->characterSheetRepository->create($characterSheet);
    }

    private function verifyTabletop(string $idTabletop): void
    {
        $commandTabletop = new FindTabletopCommand(
            $idTabletop
        );
        $this->commandBus->execute($commandTabletop);
    }
    private function verifyUser(string $idUser): void
    {
        $commandUser = new FindUserByIdCommand(
            $idUser
        );
        $this->commandBus->execute($commandUser);
    }
}
