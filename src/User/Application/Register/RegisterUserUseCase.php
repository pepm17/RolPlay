<?php

namespace Src\User\Application\Register;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Exceptions\UserAlreadyExist;
use Src\User\Domain\Password;
use Src\User\Domain\UserModel;

final class RegisterUserUseCase
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(array $data)
    {
        $userModel = UserModel::fromArray($data);
        $userModel->validateEmail();
        $userModel->passwordEqual(new Password($data['confirmPassword']));

        $user = $this->userRepository->register($userModel);
        if (!$user) {
            throw new UserAlreadyExist("User already Exist");
        }

        return UserModel::fromArray($user)->toArray();
    }
}
