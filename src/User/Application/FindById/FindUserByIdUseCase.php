<?php

namespace Src\User\Application\FindById;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Exceptions\UserNotFound;
use Src\User\Domain\UserId;
use Src\User\Domain\UserModel;

final class FindUserByIdUseCase
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UserId $id): UserModel
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            throw new UserNotFound("User not found");
        }
        return $user;
    }
}
