<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class);
    }

    function product() {
        return $this->belongsTo(Product::class);
    }
}
