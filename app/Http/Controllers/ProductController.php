<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0)
        {
            session()->flash('error', 'If available must have stock');

            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock');
        }



        $product = Product::create(request()->all());

        session()->flash('success', "The new product with id {$product->id} was created");

        return redirect()->route('products.index');
    }

    public function show($product)
    {
        $product = Product::query()->findOrFail($product);

        return view('products.show')->with([
            'product' => $product,
        ]);

    }

    public function edit($product)
    {
        $product = Product::query()->findOrFail($product);

        return view('products.edit')->with([
            'product' => $product
        ]);
    }

    public function update($productId)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        $product = Product::query()->findOrFail($productId);

        $product->update(request()->all());

        return redirect()->route('products.index');
    }

    public function delete($product)
    {
        $product = Product::query()->findOrFail($product);

        $product->delete();

        return redirect()->route('products.index');
    }
}
