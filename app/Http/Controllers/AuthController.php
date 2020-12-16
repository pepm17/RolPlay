<?php

namespace App\Http\Controllers;

use Src\User\Domain\contracts\IAuthUseCase;
use Illuminate\Http\Request;
use Src\User\Domain\DTOs\UserDto;

class AuthController extends Controller
{
    private IAuthUseCase $authUserUseCase;

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
        return $this->authUserUseCase->register($userDto);
    }
    public function login(Request $req)
    {
        $userDto = new UserDto(
            $req['username'] ? $req['username'] : null,
            $req['email'],
            $req['password'],
        );
        return $this->authUserUseCase->login($userDto);
    }

    public function logout()
    {
        return response()->json(['logout' => "User succesfully logout"]);
    }
}
