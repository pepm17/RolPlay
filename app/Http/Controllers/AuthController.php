<?php

namespace App\Http\Controllers;

use Src\User\Domain\contracts\IAuthUseCase;
use Illuminate\Http\Request;
use Src\User\Domain\DTOs\RegisterDTO;

class AuthController extends Controller
{
    private $authUserUseCase;

    public function __construct(IAuthUseCase $authUserUseCase)
    {
        $this->authUserUseCase = $authUserUseCase;
    }
    public function register(Request $req)
    {
        $userDto = new RegisterDTO(
            $req['username'],
            $req['email'],
            $req['password'],
            $req['confirmPassword']
        );
        return $this->authUserUseCase->register($userDto)->toArray();
    }
}
