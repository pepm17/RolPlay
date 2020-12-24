<?php

namespace Src\User\Application\Login;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\Exceptions\IncorrectCredential;
use Src\User\Domain\Password;
use Src\User\Domain\Token;
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
        $userExist = $this->userRepository->findToAuth(UserModel::fromArray($data));
        if (!$userExist) {
            throw new IncorrectCredential("Incorrect credentials");
        }

        $userModel = UserModel::fromArray($userExist->toArray());
        $userModel->correctPassword(new Password($data['password']));

        $token = $this->userRepository->login($userExist);

        $userModel->addToken(new Token($token));

        return $userModel->toArray();
    }
}
