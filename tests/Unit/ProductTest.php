<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function get_product_price_in_dollars()
    {
        $product = Product::factory()->make([
            'price' => 1990,
        ]);

        $this->assertEquals('19.90', $product->price_in_dollars);
    }

    
}
