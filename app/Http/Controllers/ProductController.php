<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        return 'This is the products list from Controller';
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
        return 'This show';
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
