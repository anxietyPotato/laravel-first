<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class shopPage extends Controller
{
    public function index(){
  $product = ProductModel::all();
        return view('shop',compact('product'));

    }


    public function addProduct(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:product',
            'description' => 'required|string',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
        ]);



        ProductModel::create($validated);

        return redirect()->route('all.products')->with('success', 'Product added successfully!');
    }

    public function showForm() {
        $products = ProductModel::all();
        return view('addproduct', compact('products'));
    }


}
