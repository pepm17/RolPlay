<?php

namespace Src\User\Application\Register;

use Src\Shared\Domain\Command;
use Src\Shared\UuidGenerator;

final class RegisterUserCommand implements Command
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct(string $username, string $email, string $password, string $confirmPassword)
    {
        $this->id = UuidGenerator::generator();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
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
    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'confirmPassword' => $this->confirmPassword,
        ];
    }
}
