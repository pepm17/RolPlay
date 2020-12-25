<?php

namespace Src\Hability\Application\Create;

final class CreateHabilityCommandHandler
{
    private CreateHabilityUseCase $create;

    public function __construct(CreateHabilityUseCase $create)
    {
        $this->create = $create;
    }

    public function handle(CreateHabilityCommand $command)
    {
        return $this->create->__invoke($command->toArray());
    }
}
