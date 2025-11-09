<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['product_id', 'quantity', 'price', 'purchase_date'];

    // Purchase belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

