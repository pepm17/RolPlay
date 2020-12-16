<?php

namespace App\Http\Controllers;

use Src\User\Domain\contracts\IFindUserUseCase;

class UserController extends Controller
{
    private IFindUserUseCase $findUserUseCase;
    public function __construct(IFindUserUseCase $findUserUseCase)
    {
        $this->findUserUseCase = $findUserUseCase;
    }
    public function show($id)
    {
        $user = $this->findUserUseCase->execute($id);
        return response()->json($user->toArray());
    }
}
