<?php

namespace Src\User\Domain\DTOs;

use Src\User\Domain\Email;
use Src\User\Domain\Password;
use Src\User\Domain\UserName;

final class LoginDTO
{
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
}
