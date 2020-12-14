<?php

namespace Src\User\Domain;

use Src\Shared\HashValue;
use Src\User\Domain\Exceptions\IncorrectCredential;
use Src\User\Domain\Exceptions\PasswordNotEqual;

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

    public function passwordEqual(string $confirmPassword): void
    {
        if ($this->password !== $confirmPassword)
            throw new PasswordNotEqual("The passwords not equals");

        $this->hashPassword();
    }

    public function isCorrectPassword(string $password): void
    {
        if (HashValue::checkHash($password, $this->password)) throw new IncorrectCredential("Incorrect credentials");
    }

    private function hashPassword(): void
    {
        $this->password = HashValue::makeHash($this->password);
    }
}
