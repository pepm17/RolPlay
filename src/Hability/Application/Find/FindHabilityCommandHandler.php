<?php

namespace Src\Hability\Application\Find;

final class FindHabilityCommandHandler
{
    private FindHabilityUseCase $find;

    public function __construct(FindHabilityUseCase $find)
    {
        $this->find = $find;
    }

    public function handle(FindHabilityCommand $command)
    {
        return $this->find->__invoke($command->toArray());
    }
}
