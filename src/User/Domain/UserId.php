<?php

namespace Src\User\Domain;

final class UserId {
    
    /** 
     * @var int
    */
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }
    
    public function getId(): int{
        return $this->id;
    }
}