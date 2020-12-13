<?php

namespace Src\User\Domain;

final class Email {
    
    /** 
     * @var string
    */
    private $email;

    public function __construct(string $email){
        $this->email = $email;
    }
    
    public function getEmail(): string{
        return $this->email;
    }
}