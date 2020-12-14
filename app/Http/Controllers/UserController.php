<?php

namespace App\Http\Controllers;

use Src\User\Application\FindUserUseCase;
use Src\User\Domain\contracts\IFindUserUseCase;
use Src\User\Infrastructure\EloquentUserRepository;

class UserController extends Controller
{
    private $findUserUseCase;
    public function __construct(IFindUserUseCase $findUserUseCase)
    {
        $this->findUserUseCase = $findUserUseCase;
    }
    public function show($id)
    {
        $user = $this->findUserUseCase->execute($id);
        return $user->toArray();
    }
}
