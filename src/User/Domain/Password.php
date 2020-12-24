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

    public function passwordEqual(Password $confirmPassword): void
    {
        if ($confirmPassword->getPassword() !== ($this->password)) {
            throw new PasswordNotEqual("The passwords not equals");
        }

        $this->hashPassword();
    }

    public function correctPassword(Password $password): void
    {
        if (!HashValue::checkHash($password->getPassword(), $this->password)) {
            throw new IncorrectCredential("Incorrect credentials");
        }
    }

    private function hashPassword(): void
    {
        $this->password = HashValue::makeHash($this->password);
    }
}
