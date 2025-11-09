<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id', 'total_amount', 'sale_date'];

    // Sale belongs to one Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Sale has many SaleItems
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}

