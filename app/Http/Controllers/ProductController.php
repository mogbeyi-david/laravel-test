<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('create-product');
    }

    public function store(Request $request)
    {
        $products = $this->getExistingProducts();
        $newProduct = [
            "name" => $request['name'],
            "quantity_in_stock" => $request['quantity_in_stock'],
            "price_per_item" => $request['price_per_item'],
            "created_at" => now()
        ];
        array_push($products, $newProduct);
        Storage::put('products.json', \GuzzleHttp\json_encode($products));
        return $newProduct;
    }

    public function getExistingProducts()
    {
        $products = Storage::get('products.json');
        return \GuzzleHttp\json_decode($products, true);
    }

}
