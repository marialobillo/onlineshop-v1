<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index')->with([
            'products' => $products
        ]);

    }

    public function create()
    {

        return view('products.create');
    }

    public function store()
    {

        $product = Product::create(request()->all());

        return $product;
    }

    public function show($product)
    {
        $product = Product::findOrFail($product);

        return view('products.show')->with([
            'product' => $product,
        ]);

    }

    public function edit($product)
    {
        return view('products.edit')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function update($productId)
    {
        $product = Product::findOrFail($productId);

        $product->update(request()->all());

        return $product;
    }

    public function delete($product)
    {
        $product = Product::findOrFail($product);

        $product->delete();

        return $product;
    }
}
