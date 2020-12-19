<?php

namespace Src\Hability\Domain;

final class PointsHability
{
    private int $points;

    public function __construct(int $points)
    {
        $this->$points = $points;
    }

    public function value()
    {
        return $this->points;
    }
}
