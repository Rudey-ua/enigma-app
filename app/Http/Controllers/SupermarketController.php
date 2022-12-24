<?php

namespace App\Http\Controllers;

use App\Http\Resources\Supermarket as SupermarketResource;
use App\Http\Resources\SupermarketCollection;
use App\Models\Supermarket;
use App\Http\Resources\SupermarketProduct;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    public function index()
    {
        $supermarket = Supermarket::all();

        return response()->json([
            "status" => true,
            "supermarket" => new SupermarketCollection($supermarket)
        ], 200)->setStatusCode(200, 'The resource has been fetched and is transmitted in the message body.');
    }

    public function show($id)
    {
        $supermarket = Supermarket::find($id);

        if(!$supermarket) return response()->json([
            "status" => false,
            "message" => "Supermarket not found!"
        ], 404)->setStatusCode(404, 'Supermarket not found!');

        return response()->json([
            "status" => true,
            "supermarket" => new SupermarketResource($supermarket)
        ], 200);
    }

    public function store(Request $request)
    {
        $request->only(['address', 'phone']);

        $request->validate([
            'address' => 'required|unique:supermarkets|string|min:3|max:100',
            'phone' => 'required|unique:supermarkets',
        ]);

        $supermarket = Supermarket::create([
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return response()->json([
            "status" => true,
            "supermarket" => $supermarket
        ], 201)->setStatusCode(201, 'Supermarket created successfully!');
    }

    public function update($id, Request $request)
    {
        $request->only(['address', 'phone']);

        $request->validate([
            'address' => 'required|min:3|max:50',
            'phone' => 'required|min:3|max:20',
        ]);

        $supermarket = Supermarket::find($id);
        if(!$supermarket) return response()->json([
            "status" => false,
            "message" => "Supermarket not found!"
        ], 404)->setStatusCode(404, 'Supermarket not found!');

        $supermarket->address = $request->address;
        $supermarket->phone = $request->phone;

        $supermarket->save();

        return response()->json([
            "status" => true,
            "supermarket" => $supermarket
        ], 200)->setStatusCode(200, 'Supermarket information is updated!');
    }

    public function destroy($id)
    {
        $supermarket = Supermarket::find($id);

        if(!$supermarket) return response()->json([
            "status" => false,
            "message" => "Supermarket not found!"
        ], 404)->setStatusCode(404, 'Supermarket not found!');

        $supermarket->delete();

        return response()->json([
            "status" => true,
            "message" => 'Supermarket is deleted!'
        ], 200)->setStatusCode(200, 'Supermarket is deleted!');
    }

    public function getProducts($id)
    {
        $supermarket = Supermarket::find($id);

        if(!$supermarket) return response()->json([
            "status" => false,
            "message" => "Supermarket not found!"
        ], 404)->setStatusCode(404, 'Supermarket not found!');

        return response()->json([
            'status' => true,
            'supermarket' => new SupermarketProduct($supermarket),
        ]);
    }
}
