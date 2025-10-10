<?php


namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 🧑‍💼 Admin — view all products
    public function index()
    {
        $products = ProductModel::all();
        return view('allProducts', compact('products'));
    }

    // 🧑‍💼 Admin — delete a product
    public function delete($id)
    {
        $product = ProductModel::find($id);
        if (!$product) {
            abort(404, 'Product not found');
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    // 🧑‍💼 Admin — edit a product
    public function singleProduct(ProductModel $product)
    {
        return view('products.edit', compact('product'));
    }

    // 🧑‍💼 Admin — update product
    public function update(Request $request, ProductModel $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        // Update basic fields
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->amount = $request->get('amount');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('all.products')->with('success', 'Product updated successfully!');
    }

    // 🛍️ Public — show shop
    public function showShop()
    {
        $product = ProductModel::all();
        return view('shop', compact('product'));
    }
    public function showSingle(ProductModel $product)
    {
        return view('singleProduct', compact('product'));
    }

}
