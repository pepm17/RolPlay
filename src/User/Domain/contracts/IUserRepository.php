<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;

interface IUserRepository
{
    public function find(UserId $userId): array;
    public function register(UserModel $userModel): array;
    public function login(UserModel $userModel): ?string;
}
