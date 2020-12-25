<?php

namespace Src\Hability\Application\Create;

use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class CreateHabilityCommand implements Command
{
    private $id;
    private $name;
    private $description;

    public function __construct(string $name, string $description)
    {
        $this->id = UuidGenerator::generator();
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
