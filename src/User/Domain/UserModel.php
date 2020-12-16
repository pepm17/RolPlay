<?php

namespace Src\User\Domain;

final class UserModel
{
    private $id;
    private UserName $userName;
    private Email $email;
    private Password $password;
    private $token;

    public function __construct(
        UserName $userName,
        Email $email,
        Password $password,
        UserId $id = null
    ) {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->token = null;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new UserName($data['username']),
            new Email($data['email']),
            new Password($data['password']),
            ($data['id'] !== null) ? new UserId($data['id']) : null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => ($this->id !== null) ? $this->id->getId() : '',
            'username' => $this->userName->getUserName(),
            'email' => $this->email->getEmail(),
            'password' => $this->password->getPassword(),
            'token' => ($this->token !== null) ? $this->token->value() : '',
        ];
    }

    public function passwordEqual(string $confirmPassword): void
    {
        $this->password->passwordEqual($confirmPassword);
    }

    public function correctPassword(string $confirmPassword): void
    {
        $this->password->correctPassword($confirmPassword);
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function addToken(string $token)
    {
        $this->token = new Token($token);
    }
}
