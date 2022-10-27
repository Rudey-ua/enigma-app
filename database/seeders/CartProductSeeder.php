<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_product')->insert([
            [
                'cart_id' => '2',
                'product_id' => '1',
                'count' => '2',
            ],
            [
                'cart_id' => '2',
                'product_id' => '2',
                'count' => '1',
            ],
            [
                'cart_id' => '2',
                'product_id' => '3',
                'count' => '5',
            ],
            [
                'cart_id' => '3',
                'product_id' => '5',
                'count' => '2',
            ],
            [
                'cart_id' => '3',
                'product_id' => '1',
                'count' => '3',
            ],
            [
                'cart_id' => '3',
                'product_id' => '4',
                'count' => '4',
            ]
        ]);
    }
}
