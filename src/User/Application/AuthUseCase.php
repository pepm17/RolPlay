<?php

namespace Src\User\Application;

use Src\User\Domain\contracts\IAuthUseCase;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\UserModel;
use Src\User\Domain\DTOs\UserDto;
use Src\User\Domain\Exceptions\UserAlreadyExist;
use Src\User\Domain\Exceptions\UserNotFound;

final class AuthUseCase implements IAuthUseCase
{
    private $userModel;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDto $UserDto): UserModel
    {
        $userModel = UserModel::fromArray($UserDto->toArray());

        $userModel->passwordEqual($UserDto->getConfirmPassword());

        $user = $this->userRepository->register($userModel);
        if (!$user) throw new UserAlreadyExist("User already Exist");

        return UserModel::fromArray($user);
    }

    public function login(UserDto $UserDto): string
    {
        $userModel = UserModel::fromArray($UserDto->toArray());
        $token = $this->userRepository->login($userModel);
        if (!$token) throw new UserNotFound("User not found");
        return $token;
    }
}
