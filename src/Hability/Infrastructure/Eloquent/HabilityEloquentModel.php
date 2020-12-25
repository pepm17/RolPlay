<?php

namespace Src\Hability\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\CharacterSheet\Infrastructure\Eloquent\CharacterSheetEloquentModel;

final class HabilityEloquentModel extends Model
{
    protected $table = 'habilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'points',
    ];
}
