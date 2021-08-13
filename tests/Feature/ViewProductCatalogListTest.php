<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewProductCatalogListTest extends TestCase
{
    /**
     *
     * @test
     */
    public function user_can_view_a_product_listing()
    {

        $product = Product::create([
            'title' => 'Test Product',
            'description' => 'Description of a product',
            'product_price' => 1990,
            'image' => 'https://source.unsplash.com/random',
            'stock' => 80,
            'status' => 'available'
        ]);

        $response = $this->get('/products/' . $product->id);

        $response->assertSee('Test Product');
        $response->assertSee('Description of a product');
        $response->assertSee('19.90');
        // $response->assertSee('https://source.unsplash.com/random');
        $response->assertSee('80');
        
    }
}
