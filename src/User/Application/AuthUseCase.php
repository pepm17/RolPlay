<?php

namespace Src\User\Application;

use Src\User\Domain\contracts\IAuthUseCase;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\UserModel;
use Src\User\Domain\DTOs\LoginDTO;
use Src\User\Domain\DTOs\RegisterDTO;
use Src\User\Domain\PasswordNotEqual;

final class AuthUseCase implements IAuthUseCase
{
    private $userModel;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterDTO $registerDto): UserModel
    {
        $userModel = UserModel::fromArray($registerDto->toArray());

        if (!$userModel->passwordEqual($registerDto->getConfirmPassword()))
            throw new PasswordNotEqual("The passwords not equals");

        $user = $this->userRepository->register($userModel);
        return UserModel::fromArray($user);
    }

    public function login(LoginDTO $loginDTO): string
    {
        return "";
    }
}