<?php

namespace Src\User\Domain;

final class UserModel
{
    /** 
     * @var UserId
     */
    public $id;

    /** 
     * @var UserName
     */
    private $userName;

    /** 
     * @var Email
     */
    private $email;

    /** 
     * @var Password
     */
    private $password;

    public function __construct(
        UserId $id = null,
        UserName $userName,
        Email $email,
        Password $password
    ) {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $id = ($data['id'] !== null) ? new UserId($data['id']) : null,
            new UserName($data['username']),
            new Email($data['email']),
            new Password($data['password'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => ($this->id !== null) ? $this->id->getId() : '',
            'username' => $this->userName->getUserName(),
            'email' => $this->email->getEmail(),
            'password' => $this->password->getPassword(),
        ];
    }

    public function passwordEqual(string $confirmPassword): void
    {
        $this->password->passwordEqual($confirmPassword);
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}
