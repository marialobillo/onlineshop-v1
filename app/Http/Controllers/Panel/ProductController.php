<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Scopes\AvailableScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\PanelProduct;

class ProductController extends Controller
{

    public function index()
    {
        $products = PanelProduct::all();

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

        $product = PanelProduct::create(request()->validated());

        session()->flash('success', "The new product with id {$product->id} was created");

        return redirect()
            ->route('products.index')
            ->withSucess("The product with id {$product->id} was created.");
    }

    public function show(PanelProduct $product)
    {
        return view('products.show')->with([
            'product' => $product,
        ]);

    }

    public function edit(PanelProduct $product)
    {
        return view('products.edit')->with([
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, PanelProduct $product)
    {
        $product->update($request->validated());
        session()->flash('success', "The product with id {$product->id} was upated.");

        return redirect()->route('products.index');
    }

    public function destroy(PanelProduct $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted.");
    }
}
