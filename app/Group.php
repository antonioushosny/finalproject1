<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable=
    ['group_name'];

    public function categories()
    {
        return $this->belongsToMany('App\Category','categ_groups','group_id','categ_id');
    }
    public function brands()
    {
        return $this->belongsToMany('App\Brand','group_brands','group_id','brand_id');
    }
}
