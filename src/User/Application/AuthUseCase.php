<?php

namespace Src\User\Application;

use Src\User\Domain\contracts\IAuthUseCase;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Domain\UserModel;
use Src\User\Domain\DTOs\UserDto;
use Src\User\Domain\Email;
use Src\User\Domain\Exceptions\IncorrectCredential;
use Src\User\Domain\Exceptions\UserAlreadyExist;
use Src\User\Domain\UserId;

final class AuthUseCase implements IAuthUseCase
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDto $userDto): array
    {
        $userExist = $this->userRepository->findEmail(new Email($userDto->getEmail()));
        if ($userExist) {
            throw new UserAlreadyExist("User already Exist");
        }
        $userModel = UserModel::fromArray($userDto->toArray());

        $userModel->passwordEqual($userDto->getConfirmPassword());

        $user = $this->userRepository->register($userModel);

        return UserModel::fromArray($user)->toArray();
    }

    public function login(UserDto $userDto): array
    {
        $userExist = $this->userRepository->findEmail(new Email($userDto->getEmail()));
        if (!$userExist) {
            throw new IncorrectCredential("Incorrect credentials");
        }
        $userModel = UserModel::fromArray($userExist->toArray());
        $userModel->correctPassword($userDto->getPassword());
        $token = $this->userRepository->login($userExist);
        $userModel->addToken($token);
        return  $userModel->toArray();
    }

    public function logout(): void
    {
        return $this->userRepository->logout();
    }
}
