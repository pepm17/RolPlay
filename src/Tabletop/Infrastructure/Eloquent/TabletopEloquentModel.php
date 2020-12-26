<?php

namespace Src\Tabletop\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\CharacterSheet\Infrastructure\Eloquent\CharacterSheetEloquentModel;

final class TabletopEloquentModel extends Model
{
    protected $table = 'tabletop';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'dungeonMaster',
    ];
}
