<?php

namespace Src\User\Domain;

use Illuminate\Support\Facades\Hash;

final class Password
{

    /** 
     * @var string
     */
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function passwordEqual(string $confirmPassword): bool
    {
        if ($this->password === $confirmPassword) {
            $this->hashPassword();
            return true;
        }
        return false;
    }

    private function hashPassword(): void
    {
        $this->password = Hash::make($this->password);
    }
}
