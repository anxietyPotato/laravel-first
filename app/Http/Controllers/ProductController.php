<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('allProducts', compact('products'));

    }
    public function delete($products){
        $singleProduct = ProductModel::where('id', $products)->first();
        if ($singleProduct == null) {
        die("this product doesn't exist");}
        $singleProduct->delete();
        return redirect()->back();
    }

    public function singleProduct(request $request,ProductModel $product){


        return view('products.edit', compact('product'));
    }
    public function update(request $request, ProductModel  $product)
    {



                $product->name= $request->get('name');
                $product->description= $request->get('description');
                $product->price= $request->get('price');
                $product->amount= $request->get('amount');
                $product->image= $request->get('image');
                $product->save();
                return redirect(route('all.products'));
    }


}
