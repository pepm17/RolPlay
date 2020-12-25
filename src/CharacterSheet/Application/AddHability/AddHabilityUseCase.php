<?php

namespace Src\CharacterSheet\Application\AddHability;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetHability;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Domain\Exception\CharacterSheetNotExist;
use Src\Hability\Application\Find\FindHabilityCommand;
use Src\Hability\Domain\Hability;
use Src\Shared\Domain\CommandBus;
use Src\Shared\Domain\Dice;

final class AddHabilityUseCase
{
    private CharacterSheetRepository $characterSheetRepository;
    private CommandBus $commandBus;

    public function __construct(
        CharacterSheetRepository $characterSheetRepository,
        CommandBus $commandBus
    ) {
        $this->characterSheetRepository = $characterSheetRepository;
        $this->commandBus = $commandBus;
    }

    public function __invoke(array $array)
    {
        $characterSheetModel = $this->characterSheetRepository->find(
            new CharacterSheetId($array["idCharacterSheet"])
        );
        if (!$characterSheetModel) {
            throw new CharacterSheetNotExist("Character sheet not exist");
        }

        $this->verifyHability($array["idHability"]);

        $this->characterSheetRepository->addHability(
            $characterSheetModel,
            $array
        );

        $characterSheetEntity = CharacterSheet::fromArray($characterSheetModel->toArray());

        $habilies = array();
        foreach ($characterSheetModel->habilities as $habilityModel) {
            $hability = Hability::fromArray($habilityModel->toArray());
            $dice = new Dice($habilityModel->pivot->points);
            $habilities[$hability->getName()->value()] = $dice->getResultDice();
        }

        $characterSheetEntity->addHability(
            new CharacterSheetHability($habilities)
        );

        return $characterSheetEntity->toArray();
    }

    private function verifyHability(string $idHability): void
    {
        $commandFindHability = new FindHabilityCommand(
            $idHability
        );
        $this->commandBus->execute($commandFindHability);
    }
}
