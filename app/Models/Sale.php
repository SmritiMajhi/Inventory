<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id', 'total_amount', 'sale_date'];

    // Cast sale_date to a Carbon instance so ->format() works
    protected $casts = [
        'sale_date' => 'date', // automatically converted to Carbon
        'total_amount' => 'decimal:2',
    ];

    // Cast sale_date to a Carbon instance
    protected $casts = [
        'sale_date' => 'datetime',
    ];

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Sale has many SaleItems
    // public function saleItems()
    // {
    //     return $this->hasMany(SaleItem::class);
    // }

    // Relationship: Sale has many items
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}

