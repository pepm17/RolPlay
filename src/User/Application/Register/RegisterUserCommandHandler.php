<?php

namespace Src\User\Application\Register;

final class RegisterUserCommandHandler
{
    private RegisterUserUseCase $register;
    public function __construct(RegisterUserUseCase $register)
    {
        $this->register = $register;
    }

    public function handle(RegisterUserCommand $command)
    {
        return $this->register->__invoke($command->toArray());
    }
}
