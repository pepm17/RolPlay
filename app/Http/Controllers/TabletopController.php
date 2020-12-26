<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Hability\Application\Create\CreateHabilityCommand;
use Src\Shared\Domain\CommandBus;
use Src\Tabletop\Application\Create\CreateTabletopCommand;

class TabletopController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function store(Request $request)
    {
        $command = new CreateTabletopCommand(
            $request['name'],
            $request['description'],
            $request['dungeonMaster']
        );
        return $this->commandBus->execute($command);
    }
}
