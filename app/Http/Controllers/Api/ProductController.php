<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * Get Products
     * 
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->paginate(10);
        return ProductResource::collection($products);
    }

    /**
     * save Products
     * 
     */
    public function store(ProductRequest $request)
    {
        $request->user()->products()->create($request->toArray());
        return response(['message' => 'product created']);
    }

    /**
     * Update Product
     * 
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response(['message' => 'product updated']);
    }

    /**
     * Delete Product
     * 
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(['message' => 'product deleted']);
    }
}
