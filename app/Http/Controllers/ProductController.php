<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAllProducts();

        return view('allProducts', compact('products'));
    }

    public function delete($id)
    { $singleProduct = $this->productRepo->getProductById($id);
        if ($singleProduct === null) {
            die("this product doesn't exist");
        }


        $singleProduct->delete($id);


        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function singleProduct(ProductModel $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, ProductModel $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'amount']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath; // e.g., "products/16_photo.jpg"
        }

        $this->productRepo->updateProduct($product, $data);

        return redirect()->route('all.products')->with('success', 'Product updated successfully!');
    }

    public function showShop()
    {
        $products = $this->productRepo->getAllProducts();

        return view('shop', compact('products'));
    }

    public function showSingle(ProductModel $product)
    {
        return view('singleProduct', compact('product'));
    }
}
