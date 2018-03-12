<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_style_details extends Model
{
    protected $table='product_style_details';
    protected $fillable=
    [
        'product_id',
        'style_details_id'
        
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function styledetails()
    {
        return $this->belongsTo('App\StyleDetails');
    }
}
