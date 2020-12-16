<?php

namespace Src\User\Infrastructure;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\Email;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

final class EloquentUserRepository implements IUserRepository
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
}
