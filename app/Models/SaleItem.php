<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'price', 'subtotal'
    ];

    // SaleItem belongs to Sale
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    // SaleItem belongs to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

