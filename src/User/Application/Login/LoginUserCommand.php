<?php

namespace Src\User\Application\Login;

use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class LoginUserCommand implements Command
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->id = UuidGenerator::generator();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
