<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\DTOs\LoginDTO;
use Src\User\Domain\DTOs\RegisterDTO;
use Src\User\Domain\UserModel;

interface IAuthUseCase
{
    public function register(RegisterDTO $registerDto): UserModel;
    public function login(LoginDTO $loginDTO): string;
}
