<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'cat_id', 'sup_id', 'product_code','product_name','	product_image', 'product_route', 'product_garage','buy_date','expire_date','buying_price','selling_price'
    ];
}
