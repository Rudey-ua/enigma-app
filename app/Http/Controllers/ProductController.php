<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            "status" => true,
            "products" => $products
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found');

        return response()->json([
            "status" => true,
            "product" => $product
        ], 200);
    }

    public function store(Request $request)
    {
        $request->only(['name', 'price', 'img_url', 'supermarket_id', 'category_id', 'measure']);

        $request->validate([
            'name' => 'required|unique:products|string|min:5|max:100',
            'price' => 'required|numeric',
            'img_url' => 'required|mimes:jpg|max:2048',
            'supermarket_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'measure' => 'required',
        ]);

        $file = $request->file('img_url');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $request->file('img_url')->storeAs('uploads', $fileName, 'public');

        $product = Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "img_url" => '/storage/' . $filePath,
            "supermarket_id" => $request->supermarket_id,
            "category_id" => $request->category_id,
            "measure" => $request->measure,
        ]);

        return response()->json([
            "status" => true,
            "product" => $product
        ], 201)->setStatusCode(201, 'Product created successfully');
    }

    public function update($id, Request $request)
    {
        $request->only(['name', 'price', 'img_url', 'supermarket_id', 'category_id', 'measure']);

        $request->validate([
            'name' => 'required|unique:products|string|min:5|max:100',
            'price' => 'required|numeric',
            'img_url' => 'required|mimes:jpg,png|max:2048',
            'supermarket_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'measure' => 'required',
        ]);

        $file = $request->file('img_url');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $request->file('img_url')->storeAs('uploads', $fileName, 'public');

        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found');

        $product->name = $request->name;
        $product->price = $request->price;
        $product->img_url = '/storage/' . $filePath;
        $product->supermarket_id = $request->supermarket_id;
        $product->category_id = $request->category_id;
        $product->measure = $request->measure;
        $product->save();

        return response()->json([
            "status" => true,
            "product" => $product
        ], 200)->setStatusCode(200, 'Product is updated');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product) return response()->json([
            "status" => false,
            "message" => "Product not found!"
        ], 404)->setStatusCode(404, 'Product not found');

        $product->delete();

        return response()->json([
            "status" => true,
            "message" => 'Product is deleted'
        ], 200)->setStatusCode(200, 'Product is deleted');
    }
}
