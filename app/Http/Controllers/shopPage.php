<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class shopPage extends Controller
{
    public function showForm()
    {
        $products = ProductModel::all(); // only if needed in the form
        return view('AddProduct', compact('products'));
    }


    public function addProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:product',
            'description' => 'required|string',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);

        ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->route('all.products')->with('success', 'Product added successfully!');
    }
}
