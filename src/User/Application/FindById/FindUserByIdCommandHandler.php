<?php

namespace Src\User\Application\FindById;

final class FindUserByIdCommandHandler
{
    private FindUserByIdUseCase $find;

    public function __construct(FindUserByIdUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindUserByIdCommand $command)
    {
        return $this->find->__invoke($command->getId());
    }
}
