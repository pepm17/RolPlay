<?php

namespace Src\User\Domain;

use Src\User\Domain\Exceptions\EmailNotValid;

final class Email
{

    /** 
     * @var string
     */
    private $email;

    public function __construct(string $email)
    {
        $this->validateEmail($email);
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new EmailNotValid("Invalid email");
    }
}
