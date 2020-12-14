<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\DTOs\LoginDTO;
use Src\User\Domain\DTOs\RegisterDTO;
use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;

interface IUserRepository
{
    public function find(UserId $userId): array;
    public function register(RegisterDTO $registerDto): array;
    public function login(LoginDTO $loginDTO): string;
}
