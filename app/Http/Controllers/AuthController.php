<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Shared\Domain\CommandBus;
use Src\User\Application\Login\LoginUserCommand;
use Src\User\Application\Register\RegisterUserCommand;

class AuthController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function register(Request $req)
    {
        $command = new RegisterUserCommand(
            $req['username'],
            $req['email'],
            $req['password'],
            $req['confirmPassword']
        );
        return $this->commandBus->execute($command);
    }

    public function login(Request $req)
    {
        $command = new LoginUserCommand(
            $req['username'] ? $req['username'] : '',
            $req['email'] ? $req['email'] : '',
            $req['password'],
        );
        return $this->commandBus->execute($command);
    }

    public function logout()
    {
        return response()->json(['logout' => "User succesfully logout"]);
    }
}
