<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;


class ShopingCartRepository implements ShopingCartRepositoryInterface
{





    public function add(array $data): string
    {
        $productId = $data['product_id'] ?? null;

        Log::info("🧩 Entered add() method with product ID: " . $productId);

        if (!$productId) {
            Log::warning("❌ Missing product_id in request data");
            throw new \Exception('Invalid product data.');
        }

        $product = ProductModel::find($productId);

        if (!$product) {
            Log::warning("❌ Product not found for ID: " . $productId);
            throw new \Exception('Product not found.');
        }

        Log::info("✅ Found product: {$product->name}, stock: {$product->amount}");

        if ($product->amount <= 0) {
            Log::warning("🚫 Out of stock: {$product->name}");
            throw new \Exception('This item is out of stock.');
        }

        // ✅ FIX: Load cart before checking existing quantity
        $cart = Session::get('shopingcart', []);
        $existingQty = $cart[$data['product_id']]['quantity'] ?? 0;
        $totalRequested = $existingQty + $data['quantity'];

        if ($product->amount < $totalRequested) {
            throw new \Exception('Sorry, not enough items in stock. Try again later.');
        }

        $cart[$data['product_id']] = [
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $totalRequested,
            'image' => $data['image'],
        ];

        Session::put('shopingcart', $cart);

        return 'Product added to cart!';
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
            //  Save ordered item
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
