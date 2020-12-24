<?php

namespace Src\Shared\Domain;

interface Inflector
{
    public function inflect(Command $command);
}
