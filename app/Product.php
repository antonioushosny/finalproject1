<?php

namespace App;
use App\Size;
use App\Seller;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=
    [
        'product_serial_num','style_id',
        'product_price','product_desc',
        'mater_id','comp_id','product_price_sale'
    ];

    public function style()
    {
        return $this->belongsTo('App\Style','style_id')->with('category');
    }

    public function material()
    {
        return $this->belongsTo('App\Material','mater_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Seller','comp_id');
    }
    public function colors()
    {
        return $this->belongsToMany('App\Color','product_colors','product_id','color_id')->with('sizes');

    }
    public function styleDetails()
    {
        return $this->belongsToMany('App\StyleDetails','product_style_details','product_id','style_details_id');
    }
   
    public function images()
    {
        return $this->morphMany('App\Media','media');
    }
    
}
