<?php

namespace Src\User\Application\FindByUsername;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Exceptions\UserNotFound;
use Src\User\Domain\UserModel;
use Src\User\Domain\UserName;

final class FindByUsernameUseCase
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UserName $username): UserModel
    {
        $user = $this->userRepository->findByUsername($username);
        if (!$user) {
            throw new UserNotFound("User Not Found");
        }
        return $user;
    }
}
