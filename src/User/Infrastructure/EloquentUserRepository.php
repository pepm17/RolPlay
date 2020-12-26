<?php

namespace Src\User\Infrastructure;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Domain\Email;
use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\UserName;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

final class EloquentUserRepository implements UserRepository
{

    public function find(UserId $userId): ?array
    {
        $model = UserEloquentModel::find($userId->getId());
        if (!$model) {
            return null;
        }
        return $model->toArray();
    }

    public function register(UserModel $userModel): ?array
    {
        return UserEloquentModel::create($userModel->toArray())->toArray();
    }

    public function login(UserEloquentModel $userEloquentModel): ?string
    {
        return $userEloquentModel->addToken();
    }

    public function logout(): void
    {
        $tokens = auth()->user()->tokens;
        foreach ($tokens as $token) {
            $token->revoke();
        }
    }

    public function findEmail(Email $email): ?UserEloquentModel
    {
        return UserEloquentModel::where('email', $email->getEmail())->first();
    }

    public function findToAuth(UserModel $userModel): ?UserEloquentModel
    {
        return UserEloquentModel::where(
            'email',
            $userModel->getEmail()->getEmail()
        )->orWhere(
            'username',
            $userModel->getUserName()->getUserName()
        )->first();
    }

    public function findByUsername(UserName $userName): ?UserModel
    {
        $userEloquent = UserEloquentModel::where(
            'username',
            $userName->getUserName()
        )->first();
        if (!$userEloquent) {
            return null;
        }
        return UserModel::fromArray($userEloquent->toArray());
    }
}
