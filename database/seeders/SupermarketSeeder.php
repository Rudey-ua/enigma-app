<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupermarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supermarkets')->insert([
            [
                'address' => 'Харків, пр. Московський, 259',
                'phone' => '+380577586261'
            ],
            [
                'address' => 'Харків, пр. Гагаріна, 178',
                'phone' => '+380577164365'
            ],
            [
                'address' => 'Харків, Салтівське Шосе, 248',
                'phone' => '+380577164365'
            ],
            [
                'address' => 'Харків, вул. 23-го Серпня, 33а',
                'phone' => '+380577570051'
            ],
        ]);
    }
}
