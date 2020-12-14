<?php

namespace Src\User\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

final class UserEloquentModel extends Model
{
    use HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
    ];
}
