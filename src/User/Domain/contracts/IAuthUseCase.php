<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\DTOs\UserDto;

interface IAuthUseCase
{
    public function register(UserDto $UserDto): array;
    public function login(UserDto $UserDto): array;
    public function logout(): void;
}
