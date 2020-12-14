<?php

namespace Src\User\Domain\contracts;

use Src\User\Domain\UserModel;

interface IFindUserUseCase
{
    public function execute(int $id): ?UserModel;
}
