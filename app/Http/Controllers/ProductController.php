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
        dd('Estamos en store');
        return 'this store';
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
        return 'This edit';
    }

    public function update($product)
    {
        return 'This update';
    }

    public function delete($product)
    {
        return 'This delete';
    }
}
