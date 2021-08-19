<?php

namespace App\Models;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];

    public function getPriceInDollarsAttribute()
    {
        return number_format($this->price / 100, 2);
    }
   
}
