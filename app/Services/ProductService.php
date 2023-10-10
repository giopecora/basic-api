<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository)
    {
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        return $this->productRepository->update($product, $data);
    }

    public function listProduct()
    {
        return $this->productRepository->all();
    }

    public function showProduct($id)
    {
        return $this->productRepository->find($id);
    }
}
