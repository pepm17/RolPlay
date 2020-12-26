<?php

namespace Src\Tabletop\Application\Create;

use Src\Tabletop\Domain\Description;
use Src\Tabletop\Domain\Name;
use Src\Tabletop\Domain\TabletopId;
use Src\User\Domain\UserName;

final class CreateTabletopCommandHandler
{
    private CreateTableTopUseCase $create;

    public function __construct(CreateTabletopUseCase $create)
    {
        $this->create = $create;
    }

    public function handle(CreateTabletopCommand $command)
    {
        return $this->create->__invoke(
            new TabletopId($command->getId()),
            new Name($command->getName()),
            new Description($command->getDescription()),
            new UserName($command->getDungeonMaster())
        );
    }
}
