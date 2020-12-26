<?php

namespace Src\CharacterSheet\Domain;

use Src\CharacterSheet\Domain\Exception\HabilityNotExist;
use Src\Hability\Domain\Hability;
use Src\Shared\Domain\Dice;
use Src\Tabletop\Domain\TabletopId;
use Src\User\Domain\UserId;

final class CharacterSheet
{
    private CharacterSheetId $id;
    private Name $name;
    private Description $description;
    private LifePoints $lifePoints;
    private UserId $userId;
    private TabletopId $tabletopId;
    private ?CharacterSheetHability $habilities;

    public function __construct(
        CharacterSheetId $id,
        Name $name,
        Description $description,
        LifePoints $lifePoints,
        TabletopId $tabletopId,
        UserId $userId,
        CharacterSheetHability $habilities = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->lifePoints = $lifePoints;
        $this->tabletopId = $tabletopId;
        $this->userId = $userId;
        $this->habilities = $habilities;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new CharacterSheetId($data['id']),
            new Name($data['name']),
            new Description($data['description']),
            new LifePoints($data['lifePoint']),
            new TabletopId($data['tabletop_id']),
            new UserId($data['user_id'])
        );
    }

    public function addHability(CharacterSheetHability $hability)
    {
        $this->habilities = $hability;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'description' => $this->description->value(),
            'lifePoint' => $this->lifePoints->value(),
            'tabletop_id' => $this->tabletopId->value(),
            'user_id' => $this->userId->getId(),
            'habilities' => $this->habilities ? $this->habilities->value() : []
        ];
    }
}
