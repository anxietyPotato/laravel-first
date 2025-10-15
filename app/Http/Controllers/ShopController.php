<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequests;
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


    public function addProduct(ProductRequests $request) {
        $validated = $request->validated();
        // Delegate creation to repository
        $this->productRepo->createProduct($validated + ['image' => $request->file('image')]);

        return redirect()->route('add.product')->with('success', 'Product added successfully!');
    }
}
