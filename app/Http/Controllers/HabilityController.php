<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Hability\Application\Create\CreateHabilityCommand;
use Src\Shared\Domain\CommandBus;

class HabilityController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function store(Request $request)
    {
        $command = new CreateHabilityCommand(
            $request['name'],
            $request['description']
        );
        return $this->commandBus->execute($command);
    }
}