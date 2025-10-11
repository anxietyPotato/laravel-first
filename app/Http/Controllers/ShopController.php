<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    // Show Add Product form + list of products
    public function showForm()
    {
        $products = $this->productRepo->getAllProducts();
        return view('addProduct', compact('products'));
    }

    // Handle Add Product form submission
    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|unique:product,name',
            'description' => 'required|string',
            'amount'      => 'required|integer|min:1',
            'price'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Delegate creation to repository
        $this->productRepo->createProduct($validated + ['image' => $request->file('image')]);

        return redirect()->route('add.product')->with('success', 'Product added successfully!');
    }
}
