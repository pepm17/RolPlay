<?php

namespace Src\Tabletop\Application\AddPlayer;

use Src\Shared\Domain\Command;

final class AddPlayerCommand implements Command
{
    private $idTabletop;
    private array $idPlayer;

    public function __construct(string $idTabletop, array $idPlayer)
    {
        $this->idTabletop = $idTabletop;
        $this->idPlayer = $idPlayer;
    }

    public function getIdTabletop()
    {
        return $this->idTabletop;
    }
    public function getIdPlayer()
    {
        return $this->idPlayer;
    }

    public function toArray()
    {
        return [
            'tabletop_id' => $this->idTabletop,
            'user_id' => $this->idPlayer
        ];
    }
}
