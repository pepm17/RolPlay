<?php

namespace App\Http\Controllers;

use Src\User\Domain\contracts\IAuthUseCase;
use Illuminate\Http\Request;
use Src\User\Domain\DTOs\UserDto;

class AuthController extends Controller
{
    private $authUserUseCase;

    public function __construct(IAuthUseCase $authUserUseCase)
    {
        $this->authUserUseCase = $authUserUseCase;
    }
    public function register(Request $req)
    {
        $userDto = new UserDto(
            $req['username'],
            $req['email'],
            $req['password'],
            $req['confirmPassword']
        );
        return $this->authUserUseCase->register($userDto)->toArray();
    }
    public function login(Request $req)
    {
        $userDto = new UserDto(
            $req['username'] ? $req['username'] : null,
            $req['email'],
            $req['password'],
        );
        return response()->json(['Token' => $this->authUserUseCase->login($userDto)]);
    }
}
