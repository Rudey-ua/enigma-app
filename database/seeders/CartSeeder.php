<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            [
                'name' => 'Вечірка',
                'user_id' => '1',
                'created_at' => now(),
            ],
            [
                'name' => 'Вечеря',
                'user_id' => '2',
                'created_at' => now(),
            ],
            [
                'name' => 'День народження',
                'user_id' => '1',
                'created_at' => now(),
            ],
        ]);
    }
}
