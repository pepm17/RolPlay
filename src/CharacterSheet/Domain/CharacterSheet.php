<?php

namespace Src\CharacterSheet\Domain;

use Src\CharacterSheet\Domain\Exception\HabilityNotExist;
use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Dice;

final class CharacterSheet
{
    private CharacterSheetId $id;
    private Name $name;
    private Description $description;
    private LifePoints $lifePoints;
    private $habilities;

    public function __construct(
        CharacterSheetId $id,
        Name $name,
        Description $description,
        LifePoints $lifePoints
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->lifePoints = $lifePoints;
        $this->habilities = array();
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new CharacterSheetId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new LifePoints($data['lifePoints'])
        );
    }

    public function addHability(Hability $hability, Dice $dado)
    {
        $this->habilities[$hability->getName()->value()] = $dado->getResultDice();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'description' => $this->description->value(),
            'lifePoint' => $this->lifePoints->value(),
            'habilities' => $this->habilities
        ];
    }
}
