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
        $characterSheetEntity = CharacterSheet::fromArray($characterSheetModel->toArray());

        $habilities = $this->convertArrayToHabilityArray($array);

        $characterSheetEntity->addHability(
            new CharacterSheetHability($habilities)
        );

        $this->characterSheetRepository->addHability(
            $characterSheetModel,
            $array
        );

        return $characterSheetEntity->toArray();
    }

    private function convertArrayToHabilityArray(array $array): array
    {
        $habilities = [];
        for ($i = 0; $i < count($array['idHability']); $i++) {
            $habilityEntity = $this->verifyHability($array["idHability"][$i]);
            $dice = new Dice($array['points'][$i]);
            $habilities[$habilityEntity->getName()->value()] = $dice->getResultDice();
        }
        return $habilities;
    }

    private function verifyHability(string $idHability): Hability
    {
        $commandFindHability = new FindHabilityCommand(
            $idHability
        );
        $habilityEntity = $this->commandBus->execute($commandFindHability);
        return $habilityEntity;
    }
}
