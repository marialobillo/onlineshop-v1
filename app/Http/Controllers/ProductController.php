<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = DB::table('products')->get();

        dd($products);

        return view('products.index');

    }

    public function create()
    {
        return 'THis create';
    }

    public function store()
    {
        return 'this store';
    }

    public function show($product)
    {
        $product = DB::table('products')->where('id', $product)->first();

        dd($product);

        return view('products.show');
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
