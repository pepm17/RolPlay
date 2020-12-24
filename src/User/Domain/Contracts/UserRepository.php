<?php

namespace Src\User\Domain\Contracts;

use Src\User\Domain\Email;
use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

interface UserRepository
{
    public function find(UserId $userId): ?array;
    public function register(UserModel $userModel): ?array;
    public function login(UserEloquentModel $userModel): ?string;
    public function logout(): void;
    public function findEmail(Email $email): ?UserEloquentModel;
    public function findToAuth(UserModel $userModel): ?UserEloquentModel;
}
