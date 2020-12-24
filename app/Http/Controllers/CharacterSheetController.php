<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\CharacterSheet\Application\AddHability\AddHabilityCommand;
use Src\CharacterSheet\Application\Create\CreateCharacterSheetCommand;
use Src\CharacterSheet\Application\Create\CreateCharacterSheetCommandHandler;
use Src\Shared\Domain\CommandBus;

class CharacterSheetController extends Controller
{
    private $commandBus;
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }
    public function store(Request $req)
    {
        $command = new CreateCharacterSheetCommand(
            $req['name'],
            $req['description'],
            $req['lifePoints']
        );
        return $this->commandBus->execute($command);
    }
}
