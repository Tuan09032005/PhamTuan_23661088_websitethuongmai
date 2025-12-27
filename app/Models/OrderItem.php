<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Match existing user table `order_detail`
    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;

    protected $fillable = ['order_id', 'order_product_id', 'order_product_quantity', 'order_product_price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'order_product_id', 'product_id');
    }
}
