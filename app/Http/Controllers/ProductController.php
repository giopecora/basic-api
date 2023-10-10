<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     *
     * @param ProductService $productService
     */
    public function __construct(protected ProductService $productService)
    {}

    /**
     * store
     *
     * @param ProductRequest $request
     * @return ProductResource
     */
    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productService->createProduct($request->toArray());

        return new ProductResource($product);
    }

    /**
     * update
     *
     * @param ProductRequest $request
     * @param $id
     * @return ProductResource
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->showProduct($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $this->productService->updateProduct($product, $request->toArray());

        return new ProductResource($product);
    }

    /**
     * index
     *
     * @return ProductResource
     */
    public function index()
    {
        $products = $this->productService->listProduct();

        return ProductResource::collection($products);
    }

    /**
     * show
     *
     * @param $id
     * @return ProductResource
     */
    public function show($id): ProductResource
    {
        $product = $this->productService->showProduct($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return new ProductResource($product);
    }
}
