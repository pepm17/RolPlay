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

    public function addHability(Hability $hability)
    {
        array_push($this->habilities, $hability->toArray());
    }

    public function damage(Hability $hability, Dice $dado)
    {
        foreach ($this->habilities as $value) {
            if ($value === $hability) {
                $this->lifePoints = ($value->getPoint()->value() + $this->lifePoints) - $dado->getResultDice();
                return;
            }
        }
        throw new HabilityNotExist("The CharacterSheet haven't this hability");
    }

    public function health(Hability $hability, Dice $dado)
    {
        foreach ($this->habilities as $value) {
            if ($value === $hability) {
                $this->lifePoints = ($value->getPoint()->value() + $this->lifePoints) + $dado->getResultDice();
                return;
            }
        }
        throw new HabilityNotExist("The CharacterSheet hasn't this hability");
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'Name' => $this->name->value(),
            'Description' => $this->description->value(),
            'LifePoints' => $this->lifePoints->value(),
            'Habilities' => $this->habilities
        ];
    }
}
