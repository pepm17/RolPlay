<?php

namespace Src\User\Domain;

final class UserName {
    
    /** 
     * @var string
    */
    private $userName;

    public function __construct(string $userName){
        $this->userName = $userName;
    }
    
    public function getUserName(): string{
        return $this->userName;
    }
}