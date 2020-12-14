<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\DTOs\UserDto;
use Src\User\Domain\UserModel;

interface IAuthUseCase
{
    public function register(UserDto $UserDto): UserModel;
    public function login(UserDto $UserDto): string;
}
