<?php

namespace Src\User\Domain;

final class UserModel {
    
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
        UserId $id,
        UserName $userName,
        Email $email,
        Password $password
    ){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new UserId($data['id']),
            new UserName($data['username']),
            new Email($data['email']),
            new Password($data['password'])
        );
    }

    public function toArray(): array {
        return [
            'id' => $this->id->getId(),            
            'userName' => $this->userName->getUserName(),            
            'email' => $this->email->getEmail(),            
            'password' => $this->password->getPassword(),            
        ];
    }
}