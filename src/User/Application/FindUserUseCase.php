<?php

namespace Src\User\Application;

use Src\User\Domain\contracts\IFindUserUseCase;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\Exceptions\UserNotFound;
use Src\User\Domain\UserModel;
use Src\User\Domain\UserId;

final class FindUserUseCase implements IFindUserUseCase
{

    private $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $id): ?UserModel
    {
        $user = $this->userRepository->find(new UserId($id));
        if (!$user) {
            throw new UserNotFound("User not found");
        }
        return UserModel::fromArray($user);
    }
}
