<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $produto, array $data)
    {
        $produto->update($data);
    }

    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        return Product::find($id);
    }
}
