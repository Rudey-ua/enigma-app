<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryProduct;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return response()->json([
            "status" => true,
            "category" => new CategoryCollection($category)
        ], 200)->setStatusCode(200, 'The resource has been fetched and is transmitted in the message body.');
    }

    public function show($id)
    {
        $category = Category::find($id);

        if(!$category) return response()->json([
            "status" => false,
            "message" => "Category not found!"
        ], 404)->setStatusCode(404, 'Category not found!');

        return response()->json([
            "status" => true,
            "category" => new CategoryResource($category)
        ], 200);
    }

    public function store(Request $request)
    {
        $request->only(['name']);

        $request->validate([
            'name' => 'required|unique:categories|string|min:3|max:100',
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json([
            "status" => true,
            "category" => $category
        ], 201)->setStatusCode(201, 'Category created successfully!');
    }

    public function update($id, Request $request)
    {
        $request->only(['name']);

        if(!isset($request->name)) return response()->json([
            "status" => false,
            "message" => "Empty name field detected!"
        ]);

        if(count(Category::where('name', $request->name)->get())) return response()->json([
           "status" => false,
           "message" => "Category with this name already exist!"
        ]);

        $category = Category::find($id);
        if(!$category) return response()->json([
            "status" => false,
            "message" => "Category not found!"
        ], 404)->setStatusCode(404, 'Category not found!');

        $category->name = $request->name;
        $category->save();

        return response()->json([
            "status" => true,
            "category" => $category
        ], 200)->setStatusCode(200, 'Category is updated!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if(!$category) return response()->json([
            "status" => false,
            "message" => "Category not found!"
        ], 404)->setStatusCode(404, 'Category not found!');

        $category->delete();

        return response()->json([
            "status" => true,
            "message" => 'Category is deleted!'
        ], 200)->setStatusCode(200, 'Category is deleted!');
    }

    public function getProducts($id)
    {
        $category = Category::find($id);

        if(!$category) return response()->json([
            "status" => false,
            "message" => "Category not found!"
        ], 404)->setStatusCode(404, 'Product not found!');

        return response()->json([
            'status' => true,
            'category' => new CategoryProduct($category),
        ]);
    }
}
