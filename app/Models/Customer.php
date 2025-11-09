<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address'];

    // One Customer → Many Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

