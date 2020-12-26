<?php

namespace Src\Tabletop\Application\Find;

use Src\Tabletop\Domain\TabletopId;

final class FindTabletopCommandHandler
{
    private FindTabletopUseCase $find;

    public function __construct(FindTabletopUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindTabletopCommand $command)
    {
        return $this->find->__invoke(
            new TabletopId($command->getId())
        );
    }
}
