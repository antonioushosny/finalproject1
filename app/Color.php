<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable=
    ['color_name'];
   
    public function products()
    {
        return $this->belongsToMany('App\Color','product_colors','product_id','color_id');

    }
    public function sizes()
    {
        return $this->belongsToMany('App\Size','product_color_sizes','product_colors_id','size_id');
    }
}
