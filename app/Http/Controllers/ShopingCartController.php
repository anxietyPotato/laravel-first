<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\ShopingCartRepositoryInterface;

class ShopingCartController extends Controller
{
protected ShopingCartRepositoryInterface $cart;

public function __construct(ShopingCartRepositoryInterface $cart)
{
$this->cart = $cart;
}

public function add(Request $request): RedirectResponse
{
$validated = $request->validate([
'product_id' => 'required|integer',
'name' => 'required|string',
'price' => 'required|numeric',
'quantity' => 'required|integer|min:1',
'image' => 'nullable|string',
]);

$this->cart->add($validated);

return redirect()->back()->with('success', 'Product added to cart!');
}

public function show(): View
{
$items = $this->cart->get();
return view('shopingcart', compact('items'));
}
}
