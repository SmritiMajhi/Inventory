<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'supplier_id',
        'quantity', 'buy_price', 'sell_price'
    ];

    // Product belongs to one Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product belongs to one Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Product has many Purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Product has many SaleItems
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    // Product has one Stock
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}
