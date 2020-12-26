<?php

namespace Src\Tabletop\Application\Find;

use Src\Tabletop\Domain\Contracts\TabletopRepository;
use Src\Tabletop\Domain\Exceptions\TabletopNotExist;
use Src\Tabletop\Domain\Tabletop;
use Src\Tabletop\Domain\TabletopId;

final class FindTabletopUseCase
{
    private TabletopRepository $TabletopRepository;

    public function __construct(TabletopRepository $TabletopRepository)
    {
        $this->TabletopRepository = $TabletopRepository;
    }

    public function __invoke(TabletopId $id): Tabletop
    {
        $TabletopArrayRepository = $this->TabletopRepository->find($id);
        if (!$TabletopArrayRepository) {
            throw new TabletopNotExist("Tabletop Not Exist");
        }
        return $TabletopArrayRepository;
    }
}
