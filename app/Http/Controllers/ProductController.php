<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('create-product');
    }

    public function store(Request $request)
    {
        $newProduct = [
            "name" => $request['name'],
            "quantity_in_stock" => $request['quantity_in_stock'],
            "price_per_item" => $request['price_per_item']
        ];
        return $newProduct;
    }
}
