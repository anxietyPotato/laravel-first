<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequests;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index(): View
    {
        $products = $this->productRepo->getAllProducts();

        return view('allProducts', compact('products'));
    }

    public function delete($id) : RedirectResponse
    { $singleProduct = $this->productRepo->getProductById($id);
        if ($singleProduct === null) {
            die("this product doesn't exist");
        }


        $singleProduct->delete($id);


        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function singleProduct(ProductModel $product): View
    {
        return view('products.edit', compact('product'));
    }



    public function update(ProductRequests $request, ProductModel $product)
    {
        $data = $request->validated(); // ✅ uses rules from ProductRequests



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
