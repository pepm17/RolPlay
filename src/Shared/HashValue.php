<?php

namespace Src\Shared;

use Illuminate\Support\Facades\Hash;

final class HashValue
{
    public static function makeHash($value): string
    {
        return Hash::make($value);
    }
}
