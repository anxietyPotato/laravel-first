<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;

class ShopingCartRepository implements ShopingCartRepositoryInterface
{
    public function add(array $data): void
    {
        $cart = Session::get('shopingcart', []);
        $cart[$data['product_id']] = [
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'image' => $data['image'],
        ];
        Session::put('shopingcart', $cart);
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
}
