<?php

namespace Src\Shared;

use Illuminate\Support\Str;

final class UuidGenerator
{
    public static function generator()
    {
        return (string) Str::uuid();
    }
}
