<?php

namespace Src\Hability\Domain;

final class Hability
{
    private HabilityId $id;
    private Name $name;
    private Description $description;

    public function __construct(
        HabilityId $id,
        Name $name,
        Description $description
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new HabilityId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'description' => $this->description->value(),
        ];
    }

    public function getName()
    {
        return $this->name;
    }
}
