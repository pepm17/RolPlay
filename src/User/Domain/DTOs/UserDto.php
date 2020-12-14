<?php

namespace Src\User\Domain\DTOs;

final class UserDto
{
    /** 
     * @var string
     */
    private $id;

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

    public function __construct(
        string $userName,
        string $email,
        string $password,
        string $confirmPassword = null
    ) {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->id = null;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->userName,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }
}
