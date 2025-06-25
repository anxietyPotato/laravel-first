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
      if ($singleProduct==null) {
      die("this product doesn't exist");}
      $singleProduct->delete();
      return redirect()->back();
    }

}
