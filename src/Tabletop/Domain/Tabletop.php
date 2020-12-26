<?php

namespace Src\Tabletop\Domain;

use Src\CharacterSheet\Domain\CharacterSheet;
use Src\Hability\Domain\Hability;
use Src\User\Domain\UserModel;
use Src\User\Domain\UserName;

final class Tabletop
{
    private TabletopId $id;
    private Name $name;
    private Description $description;
    private UserName $dungeonMaster;
    private $characterSheets;
    private $habilities;
    private $participants;

    public function __construct(
        TabletopId $id,
        Name $name,
        Description $description,
        UserName $dungeonMaster
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->dungeonMaster = $dungeonMaster;
        $this->characterSheets = [];
        $this->habilities = [];
        $this->participants = [];
    }

    public function addCharacterSheets(CharacterSheet $characterSheets)
    {
        $this->characterSheets[] = $characterSheets;
    }
    public function addHabilities(Hability $habilities)
    {
        $this->habilities[] = $habilities;
    }
    public function addParticipants(UserModel $participants)
    {
        $this->participants[] = $participants;
    }

    public function toArray()
    {
        return [
            "id" => $this->id->value(),
            "name" => $this->name->value(),
            "description" => $this->description->value(),
            "dungeonMaster" => $this->dungeonMaster->getUserName(),
            "characterSheets" => $this->characterSheets,
            "habilities" => $this->habilities,
            "participants" => $this->participants
        ];
    }
}
