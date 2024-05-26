<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  @method static OrderDetail byOrderId
 */
class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    function scopeByOrderId($query, $orderId)
    {
        return $query->where('order_id', $orderId);
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }
}
