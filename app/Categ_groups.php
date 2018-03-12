<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Categ_groups extends Pivot
{
    //
    protected $table='categ_groups';
    protected $fillable=
    [
        'group_id',
        'categ_id',
    ];

}
