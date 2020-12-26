<?php

namespace Src\User\Application\Login;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Exceptions\IncorrectCredential;
use Src\User\Domain\Password;
use Src\User\Domain\UserModel;

final class LoginUserUseCase
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(array $data)
    {
        $userModel = $this->userRepository->login(UserModel::fromArray($data));
        if (!$userModel) {
            throw new IncorrectCredential("Incorrect credentials");
        }

        $userModel->correctPassword(new Password($data['password']));

        return $userModel->toArray();
    }
}
