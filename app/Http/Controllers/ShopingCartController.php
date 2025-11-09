<?php
namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\ShopingCartRepositoryInterface;
use App\Models\ProductModel; // Add this at the top
use Illuminate\Support\Facades\Session;



class ShopingCartController extends Controller
{
protected ShopingCartRepositoryInterface $cart;

public function __construct(ShopingCartRepositoryInterface $cart)
{
$this->cart = $cart;
}

    public function add(AddToCartRequest $request): RedirectResponse
    {
        try {
            $message = $this->cart->add($request->validated());
            return redirect()->route('shopingcart.show')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }






public function show(): View
{
$items = $this->cart->get();
return view('shopingcart', compact('items'));
}
    public function checkout(): RedirectResponse
    {
        try {
            $message = $this->cart->checkout('Alex'); // or Auth::user()->name
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());

        }

        return redirect()->route('shop')->with('success', $message);

    }
    public function remove(int $id): RedirectResponse
    {
        try {
            $this->cart->remove($id);
        } catch (\Exception $e) {
            return redirect()->route('shopingcart.show')->with('error', $e->getMessage());
        }

        return redirect()->route('shopingcart.show')->with('success', 'Item removed from cart.');
    }
    public function update(Request $request, int $id): RedirectResponse
    {
        $action = $request->input('action');
        $cart = $this->cart->get();

        if (!isset($cart[$id])) {
            return redirect()->route('shopingcart.show')->with('error', 'Item not found.');
        }

        $item = $cart[$id];
        $product = ProductModel::find($id);

        if ($action === 'increase') {
            if ($product && $item['quantity'] < $product->amount) {
                $item['quantity']++;
            }
        } elseif ($action === 'decrease') {
            $item['quantity']--;
            if ($item['quantity'] <= 0) {
                unset($cart[$id]);
                Session::put('shopingcart', $cart);
                return redirect()->route('shopingcart.show')->with('success', 'Item removed from cart.');
            }
        }

        //  Save updated item back into cart
        $cart[$id] = $item;
        Session::put('shopingcart', $cart);

        return redirect()->route('shopingcart.show')->with('success', 'Cart updated.');
    }

}
