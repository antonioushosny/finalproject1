<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $fillable=
    [
        'product_color_size_id','order_details_quan',
        'order_details_price','order_id'
    ];

    public function orders()
    {
        return $this->belongsTo('App\Order','order_id');
    }
    public function productColorSize()
    {
        return $this->belongsTo('App\Product_color_sizes','product_color_size_id');
    }
   
}
