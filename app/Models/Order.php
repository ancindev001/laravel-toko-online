<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

/**
 * @method static Order byUser()
 */
class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    function scopeByUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
