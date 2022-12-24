<?php

namespace App\Helpers;

class ProductHelper
{
    public static function StoreAndUpdateValidation($request): void
    {
        $request->only(['name', 'price', 'img_url', 'supermarket_id', 'category_id', 'measure']);

        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'price' => 'required|numeric',
            'img_url' => 'required|mimes:jpg,png|max:2048',
            'supermarket_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'measure' => 'required',
        ]);
    }

    public function GetProductFilePath($request): mixed
    {
        $file = $request->file('img_url');
        $fileName = time().'_'.$file->getClientOriginalName();
        return $request->file('img_url')->storeAs('uploads', $fileName, 'public');
    }
}
