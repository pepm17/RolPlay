<?php

namespace Src\CharacterSheet\Application\Create;

class CreateCharacterSheetCommandHandler
{
    private CreateCharacterSheetUseCase $create;

    public function __construct(CreateCharacterSheetUseCase $create)
    {
        $this->create = $create;
    }

    public function handle(CreateCharacterSheetCommand $command)
    {
        return $this->create->__invoke($command->toArray());
    }
}
