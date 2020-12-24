<?php

namespace Src\User\Application\Login;

final class LoginUserCommandHandler
{
    private LoginUserUseCase $login;

    public function __construct(LoginUserUseCase $login)
    {
        $this->login = $login;
    }

    public function handle(LoginUserCommand $command)
    {
        return $this->login->__invoke($command->toArray());
    }
}
