<?php

namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class ProductRepository
{
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    /**
     * Get all products
     */
    public function getAllProducts(): Collection
    {
        return $this->productModel->all();
    }

    /**
     * Create a new product
     */
    public function createProduct(array $data): ProductModel
    {
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('products', 'public'); // saves to storage/app/public/products
            $data['image'] = $imagePath; // e.g., "products/1708535332_mala.jpg"


        }

        return $this->productModel->create([
            'name'        => $data['name'],
            'description' => $data['description'],
            'price'       => $data['price'],
            'amount'      => $data['amount'],
            'image'       => $data['image'] ?? null,
        ]);
    }

    /**
     * Update an existing product
     */
    public function updateProduct(ProductModel $product, array $data): ProductModel
    {
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->amount = $data['amount'];

        if (isset($data['image'])) {
            $product->image = $data['image'];
        }

        $product->save();
        return $product;
    }
    public function getProductById($id): ?ProductModel
    {
        return $this->productModel->where(['id'=>$id])->first();
    }
}

