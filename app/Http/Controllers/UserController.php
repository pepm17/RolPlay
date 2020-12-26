<?php

namespace App\Http\Controllers;

use Src\Shared\Domain\CommandBus;
use Src\User\Application\FindById\FindUserByIdCommand;

class UserController extends Controller
{
    private CommandBus $commandBus;
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }
    public function show($id)
    {
        $command = new FindUserByIdCommand($id);
        return $this->commandBus->execute($command)->toArray();
    }
}
