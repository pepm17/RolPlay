<?php

namespace Src\Hability\Domain;

final class Hability
{
    private HabilityId $id;
    private Name $name;
    private Description $description;
    private PointsHability $point;

    public function __construct(
        HabilityId $id,
        Name $name,
        Description $description,
        PointsHability $point
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->point = $point;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new HabilityId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new PointsHability($data['pointsHability'])
        );
    }

    public function useHability(int $dadoResult)
    {
        return $this->point->value() + $dadoResult;
    }

    public function toArray(): array
    {
        return [
            'id' => ($this->id !== null) ? $this->id->value() : '',
            'Name' => $this->name->value(),
            'Description' => $this->description->value(),
            'Points' => $this->point->value(),
        ];
    }

    public function getPoint()
    {
        return $this->point;
    }
}
