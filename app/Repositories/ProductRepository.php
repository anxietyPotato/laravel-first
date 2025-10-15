<?php

namespace App\Repositories;

use App\Models\ProductModel;

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
    public function getAllProducts()
    {
        return $this->productModel->all();
    }

    /**
     * Create a new product
     */
    public function createProduct(array $data)
    {
        if (isset($data['image'])) {
            $imageName = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
            dd($data['image']);
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
    public function updateProduct(ProductModel $product, array $data)
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
    public function getProductById($id){
        return $this->productModel->where(['id'=>$id])->first();
    }
}

