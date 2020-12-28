<?php

namespace Src\CharacterSheet\Application\AddHability;

use Src\CharacterSheet\Application\Find\FindCharacterSheetCommand;
use Src\CharacterSheet\Domain\CharacterSheet;
use Src\CharacterSheet\Domain\CharacterSheetHability;
use Src\CharacterSheet\Domain\CharacterSheetId;
use Src\CharacterSheet\Domain\Contracts\CharacterSheetRepository;
use Src\CharacterSheet\Domain\Exception\CharacterSheetNotExist;
use Src\CharacterSheet\Domain\Exception\InvalidArguments;
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
        $characterSheetEntity = $this->find($array["idCharacterSheet"]);
        $habilities = $this->habilitiesInArray($array['idHability'], $array['points']);

        $characterSheetEntity->addHability(
            new CharacterSheetHability($habilities)
        );

        $this->characterSheetRepository->addHability(
            new CharacterSheetId($array["idCharacterSheet"]),
            $array['idHability'],
            $array['points']
        );

        return $characterSheetEntity->toArray();
    }

    private function habilitiesInArray(array $idHability, array $points): array
    {
        if (count($idHability) !== count($points)) {
            throw new InvalidArguments("All habilities must have points");
        }

        $habilities = [];

        for ($i = 0; $i < count($idHability); $i++) {
            $hability = $this->commandBus->execute(
                new FindHabilityCommand($idHability[$i])
            );
            $dice = new Dice($points[$i]);
            $habilities[$hability->getName()->value()] = $dice->getResultDice();
        }

        return $habilities;
    }

    private function find(string $id): CharacterSheet
    {
        return $this->commandBus->execute(
            new FindCharacterSheetCommand($id)
        );
    }
}
