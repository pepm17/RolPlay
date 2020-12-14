<?php

namespace Src\User\Domain\DTOs;

final class RegisterDTO
{
    /** 
     * @var string
     */
    private $userName;

    /** 
     * @var string
     */
    private $email;

    /** 
     * @var string
     */
    private $password;

    /** 
     * @var string
     */
    private $confirmPassword;

    public function __construct(string $userName, string $email, string $password, string $confirmPassword)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->userName,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }
}
