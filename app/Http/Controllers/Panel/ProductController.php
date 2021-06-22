<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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

    public function store(ProductRequest $request)
    {

        session()->flash('error', 'If available must have stock');

        $product = Product::create(request()->validated());

        session()->flash('success', "The new product with id {$product->id} was created");

        return redirect()
            ->route('products.index')
            ->withSucess("The product with id {$product->id} was created.");
    }

    public function show(Product $product)
    {
        return view('products.show')->with([
            'product' => $product,
        ]);

    }

    public function edit(Product $product)
    {
        return view('products.edit')->with([
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        session()->flash('success', "The product with id {$product->id} was upated.");

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted.");
    }
}
