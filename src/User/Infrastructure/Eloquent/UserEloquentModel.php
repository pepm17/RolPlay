<?php

namespace Src\User\Infrastructure\Eloquent;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

final class UserEloquentModel extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function addToken(): string
    {
        return $this->createToken('Users')->accessToken;
    }
}
