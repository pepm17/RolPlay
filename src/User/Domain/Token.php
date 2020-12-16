<?php

namespace Src\User\Domain;

final class Token
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function value(): string
    {
        return $this->token;
    }
}
