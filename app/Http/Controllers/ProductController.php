<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::with('image')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->input('name'),
        ]);

        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, ProductRequest $request)
    {
        $product->name = $request->name;
        $product->save();

        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     */
    public function upload(Product $product, ImageRequest $request)
    {
        $path = $request->file('image')->store('image');
        $image = Image::create([
            'path' => $path,
        ]);
        $product->image_id = $image->id;
        $product->save();

        return ProductResource::make($product);
    }
}
