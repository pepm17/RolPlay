<?php

namespace Src\Shared\Domain;

interface Container
{
    public function make($class);
}
