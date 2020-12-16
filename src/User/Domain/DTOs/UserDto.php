<?php

namespace Src\User\Domain\DTOs;

final class UserDto
{
    private string $id;
    private string $userName;
    private string $email;
    private string $password;
    private string $confirmPassword;
    private string $token;

    public function __construct(
        string $userName,
        string $email,
        string $password,
        string $confirmPassword = ''
    ) {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->token = '';
        $this->id = '';
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id === '' ? null : $this->id,
            'username' => $this->userName,
            'email' => $this->email,
            'password' => $this->password,
            'token' => $this->token === '' ? null : $this->token,
        ];
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
