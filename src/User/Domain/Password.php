<?php

namespace Src\User\Domain;

final class Password {
    
    /** 
     * @var string
    */
    private $password;

    public function __construct(string $password){
        $this->password = $password;
    }
    
    public function getPassword(): string{
        return $this->password;
    }
}