<?php

namespace Src\User\Domain;

use Src\Shared\HashValue;

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
        $this->password = HashValue::makeHash($this->password);
    }
}
