<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'available_quantity'];

    // Stock belongs to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
