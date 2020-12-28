<?php

namespace Src\Tabletop\Application\AddPlayer;

use Src\Tabletop\Domain\TabletopId;
use Src\User\Domain\UserId;

final class AddPlayerCommandHandler
{
    private AddPlayerUseCase $addPlayer;
    public function __construct(AddPlayerUseCase $addPlayer)
    {
        $this->addPlayer = $addPlayer;
    }

    public function handle(AddPlayerCommand $command)
    {
        return $this->addPlayer->__invoke($command->toArray());
    }
}
