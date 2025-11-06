<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

class ShopingCartRepository implements ShopingCartRepositoryInterface
{



    public function add(array $data): string
        //STRING INSTEAD OF VOID Whenever you change a method's return type in a class that implements an interface
        //always update the interface too — otherwise PHP will complain.

    {
        $cart = Session::get('shopingcart', []);

        $product = ProductModel::find($data['product_id']);
        if (!$product) {
            throw new Exception('Product not found.');
        }

        $existingQty = $cart[$data['product_id']]['quantity'] ?? 0;
        $totalRequested = $existingQty + $data['quantity'];

        $message = 'Product added to cart!';

        if ($product->amount < $totalRequested) {
            $totalRequested = $product->amount;
            $message = "Only {$product->amount} units in stock. Quantity adjusted to {$totalRequested}.";
        }

        $cart[$data['product_id']] = [
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $totalRequested,
            'image' => $data['image'],
        ];

        Session::put('shopingcart', $cart);

        return $message;
    }



public function get(): array
    {
        return Session::get('shopingcart', []);
    }

    public function remove(int $productId): void
    {
        $cart = Session::get('shopingcart', []);
        unset($cart[$productId]);
        Session::put('shopingcart', $cart);
    }

    public function clear(): void
    {
        Session::forget('shopingcart');
    }



    public function checkout(string $customerName = null): string
    {
        $cart = $this->get();

        if (empty($cart)) {
            throw new \Exception('Cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $customerName ?? Auth::user()->name ?? 'Guest',
            'total_price' => $total,
        ]);

        foreach ($cart as $productId => $item) {
            // ✅ Save ordered item
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // ✅ Reduce stock
            $product = ProductModel::find($productId);
            if ($product) {
                $product->amount -= $item['quantity'];
                $product->amount = max(0, $product->amount - $item['quantity']);
                $product->save();
            }
        }

        // ✅ Clear cart after successful order
        $this->clear();

        return 'Order placed successfully! Stock updated.';
    }


}
