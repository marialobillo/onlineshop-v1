<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
            ->withPivot('quantity');
    }
}
