<?php


namespace App\Repositories;

interface ShopingCartRepositoryInterface
{
    public function add(array $data): string;

    public function get(): array;

    public function remove(int $productId): void;

    public function clear(): void;
    public function checkout(string $customerName): string;
}
