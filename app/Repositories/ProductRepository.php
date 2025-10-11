<?php
namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository {

    private $productModel;

    Public function __construct(ProductModel $productModel)
    {
        $this->productModel =new ProductModel();
    }
}
