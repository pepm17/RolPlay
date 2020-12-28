<?php

namespace Src\User\Infrastructure;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Token;
use Src\User\Domain\UserName;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

final class EloquentUserRepository implements UserRepository
{

    public function find(UserId $userId): ?UserModel
    {
        $model = UserEloquentModel::find($userId->getId());
        if (!$model) {
            return null;
        }
        return UserModel::fromArray($model->toArray());
    }

    public function register(UserModel $userModel): ?array
    {
        $eloquentModel = $this->findToAuth($userModel);
        if ($eloquentModel) {
            return null;
        }
        return UserEloquentModel::create($userModel->toArray())->toArray();
    }

    public function login(UserModel $user): ?UserModel
    {
        $eloquentModel = $this->findToAuth($user);

        if (!$eloquentModel) {
            return null;
        }
        $userModel = UserModel::fromArray($eloquentModel->toArray());
        $userModel->addToken(new Token($eloquentModel->addToken()));
        return $userModel;
    }

    public function logout(): void
    {
        $tokens = auth()->user()->tokens;
        foreach ($tokens as $token) {
            $token->revoke();
        }
    }

    private function findToAuth(UserModel $userModel): ?UserEloquentModel
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
