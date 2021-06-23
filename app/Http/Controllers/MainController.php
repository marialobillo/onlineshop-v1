<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
//        \DB::connection()->enableQueryLog();
        $products = Product::all();

        return view('welcome')->with([
            'products' => $products,
        ]);
    }
}
