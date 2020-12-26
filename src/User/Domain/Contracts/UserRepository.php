<?php

namespace Src\User\Domain\Contracts;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Domain\UserName;

interface UserRepository
{
    public function find(UserId $userId): ?UserModel;
    public function register(UserModel $userModel): ?array;
    public function login(UserModel $user): ?UserModel;
    public function logout(): void;
    public function findByUsername(UserName $userName): ?UserModel;
}
