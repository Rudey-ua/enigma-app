<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            "status" => true,
            "products" => new ProductCollection($products)
        ], 200)->setStatusCode(200, 'The resource has been fetched and transmitted in the message body.');
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found!');

        return response()->json([
            "status" => true,
            "product" => new ProductResource($product)
        ], 200);
    }

    public function store(Request $request)
    {
        ProductHelper::StoreAndUpdateValidation($request);

        $product = Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "img_url" => '/storage/' . (new ProductHelper())->GetProductFilePath($request),
            "supermarket_id" => $request->supermarket_id,
            "category_id" => $request->category_id,
            "measure" => $request->measure,
        ]);

        return response()->json([
            "status" => true,
            "product" => $product
        ], 201)->setStatusCode(201, 'Product created successfully!');
    }

    public function update($id, Request $request)
    {
        ProductHelper::StoreAndUpdateValidation($request);

        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found!');

        $product->name = $request->name;
        $product->price = $request->price;
        $product->img_url = '/storage/' . (new ProductHelper())->GetProductFilePath($request);
        $product->supermarket_id = $request->supermarket_id;
        $product->category_id = $request->category_id;
        $product->measure = $request->measure;
        $product->save();

        return response()->json([
            "status" => true,
            "product" => $product
        ], 200)->setStatusCode(200, 'Product is updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found!');

        $product->delete();

        return response()->json([
            "status" => true,
            "message" => 'Product is deleted!'
        ], 200)->setStatusCode(200, 'Product is deleted!');
    }
}
