<?php

namespace Src\User\Application\FindByUsername;

use Src\User\Domain\UserName;

final class FindByUsernameCommandHandler
{
    private FindByUsernameUseCase $find;

    public function __construct(FindByUsernameUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindByUsernameCommand $command)
    {
        return $this->find->__invoke(
            new UserName($command->getUsername())
        );
    }
}
