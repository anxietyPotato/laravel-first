<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show Add Product form + list of products
    public function showForm()
    {
        $products = ProductModel::all();
        return view('addProduct', compact('products'));
    }

    // Handle Add Product form submission
    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product', // match your table name
            'description' => 'required|string',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $imageName);

        ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
            'image' => 'products/' . $imageName,
        ]);

        return redirect()->route('add.product')->with('success', 'Product added successfully!');
    }
}
