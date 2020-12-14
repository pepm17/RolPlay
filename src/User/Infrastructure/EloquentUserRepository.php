<?php

namespace Src\User\Infrastructure;

use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\DTOs\LoginDTO;
use Src\User\Domain\DTOs\RegisterDTO;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

final class EloquentUserRepository implements IUserRepository
{

    public function find(UserId $userId): array
    {
        $model = UserEloquentModel::find($userId->getId())->toArray();
        if (null === $model) return null;
        return $model;
    }

    public function register(UserModel $userModel): array
    {
        $model = UserEloquentModel::create($userModel->toArray())->toArray();
        return $model;
    }

    public function login(UserModel $userModel): ?string
    {
        $model = $this->findEmail($userModel->getEmail()->getEmail());
        if (!$model) return null;
        $token = $model->addToken();
        return $token;
    }

    private function findEmail(string $email): ?UserEloquentModel
    {
        $model = UserEloquentModel::where('email', $email)->first();
        if (!$model) return null;
        return $model;
    }
}
