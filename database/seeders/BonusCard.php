<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BonusCard extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bonus_cards')->insert([
            [
                'user_id' => '1',
                'balance' => '0',
                'created_at' => now()
            ],
            [
                'user_id' => '2',
                'balance' => '0',
                'created_at' => now()
            ],
        ]);
    }
}
