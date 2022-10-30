<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Resources\Cart as CartResource;
use App\Http\Resources\CartCollection;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $wishlist = Cart::all();

        return response()->json([
            "status" => true,
            "wishlists" => new CartCollection($wishlist)
        ], 200)->setStatusCode(200, 'The resource has been fetched and is transmitted in the message body.');
    }

    public function show($id)
    {
        $wishlist = Cart::find($id);

        if(!$wishlist) return response()->json([
            "status" => false,
            "message" => "Wishlist not found!"
        ], 404)->setStatusCode(404, 'Wishlist not found!');

        return response()->json([
            "status" => true,
            "wishlist" => new CartResource($wishlist)
        ], 200);
    }

    public function store(Request $request)
    {
        $request->only(['name']);

        $request->validate([
            'name' => 'required|unique:carts|string|min:3|max:100',
        ]);

        $wishlist = Cart::create([
            'name' => $request->name,
            'user_id' => Auth::user()->getAuthIdentifier(),
            'created_at' => now()
        ]);

        return response()->json([
            "status" => true,
            "wishlist" => $wishlist
        ], 201)->setStatusCode(201, 'Wishlist created successfully!');
    }

    public function update($id, Request $request)
    {
        $request->only(['name']);

        $request->validate([
            'name' => 'required|unique:carts|string|min:3|max:100',
        ]);

        $wishlist = Cart::find($id);

        if(!$wishlist) return response()->json([
            "status" => false,
            "message" => "Wishlist not found!"
        ], 404)->setStatusCode(404, 'Wishlist not found!');

        $wishlist->name = $request->name;

        $wishlist->save();

        return response()->json([
            "status" => true,
            "wishlist" => $wishlist
        ], 200)->setStatusCode(200, 'Wishlist information is updated!');
    }

    public function destroy($id)
    {
        $wishlist = Cart::find($id);

        if(!$wishlist) return response()->json([
            "status" => false,
            "message" => "Wishlist not found!"
        ], 404)->setStatusCode(404, 'Wishlist not found!');

        $wishlist->delete();

        return response()->json([
            "status" => true,
            "message" => 'Wishlist is deleted!'
        ], 200)->setStatusCode(200, 'Wishlist is deleted!');
    }
}
