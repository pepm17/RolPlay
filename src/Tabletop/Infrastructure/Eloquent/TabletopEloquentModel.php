<?php

namespace Src\Tabletop\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\User\Infrastructure\Eloquent\UserEloquentModel;

final class TabletopEloquentModel extends Model
{
    protected $table = 'tabletop';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'dungeonMaster',
    ];

    public function players()
    {
        return $this->belongsToMany(
            UserEloquentModel::class,
            'tabletop_user',
            'tabletop_id',
            'user_username'
        );
    }
}
