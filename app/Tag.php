<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_word',
        'product_id'
    ];
    public function productColors()
    {
        return $this->hasMany('App\Product_color_sizes');

    }
    
}
