<?php

namespace Src\CharacterSheet\Application\AddHability;

final class AddHabilityCommandHandler
{
    private AddHabilityUseCase $addHabilityUseCase;

    public function __construct(AddHabilityUseCase $addHabilityUseCase)
    {
        $this->addHabilityUseCase = $addHabilityUseCase;
    }
    public function handle(AddHabilityCommand $command)
    {
        return $this->addHabilityUseCase->__invoke($command->toArray());
    }
}
