<?php

namespace Src\User\Application\FindById;

use Src\User\Domain\UserId;

final class FindUserByIdCommandHandler
{
    private FindUserByIdUseCase $find;

    public function __construct(FindUserByIdUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindUserByIdCommand $command)
    {
        return $this->find->__invoke(new UserId($command->getId()));
    }
}
