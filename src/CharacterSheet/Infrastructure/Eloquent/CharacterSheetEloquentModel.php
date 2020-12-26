<?php

namespace Src\CharacterSheet\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\Hability\Infrastructure\Eloquent\HabilityEloquentModel;

final class CharacterSheetEloquentModel extends Model
{
    protected $table = 'charactersheet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'lifePoint',
        'tabletop_id',
        'user_id'
    ];

    public function habilities()
    {
        return $this->belongsToMany(
            HabilityEloquentModel::class,
            'charactersheet_habilities',
            'charactersheet_id',
            'hability_id',
        )->withPivot('points');
    }
}
