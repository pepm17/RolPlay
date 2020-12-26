<?php

namespace Src\Hability\Domain;

use Src\Tabletop\Domain\TabletopId;

final class Hability
{
    private HabilityId $id;
    private Name $name;
    private TabletopId $tabletopId;
    private Description $description;

    public function __construct(
        HabilityId $id,
        Name $name,
        Description $description,
        TabletopId $tabletopId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->tabletopId = $tabletopId;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new HabilityId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new TabletopId($data['tabletop_id'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'description' => $this->description->value(),
            'tabletop_id' => $this->tabletopId->value(),
        ];
    }

    public function getName()
    {
        return $this->name;
    }
}
