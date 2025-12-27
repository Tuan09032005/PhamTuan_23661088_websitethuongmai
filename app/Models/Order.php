<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Matches the existing `orders` table created by user
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'order_date', 'order_customer', 'order_status', 'order_note'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    // Accessor example: formatted date
    public function getFormattedDateAttribute()
    {
        if (!$this->order_date) return null;
        return date('d/m/Y H:i', strtotime($this->order_date));
    }
}
