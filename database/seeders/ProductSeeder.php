<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Вирізка свиняча КЛАСС',
                'price' => '18.99',
                'img_url' => 'https://klassmarket.ua/image/cache/catalog/data/catalog/myaso/03_066-270x270.png?969571',
                'supermarket_id' => '1',
                'category_id' => '8',
                'measure' => '100г',
            ],
            [
                'name' => 'Сир Голландський/Український 45% ТМ Звени Гора',
                'price' => '70.00',
                'img_url' => 'https://klassmarket.ua/image/cache/catalog/data/catalog/kolbasa_cir/2_5564_-270x270.png?969571',
                'supermarket_id' => '1',
                'category_id' => '5',
                'measure' => '200г',
            ],
            [
                'name' => 'Яблуко Чемпіон',
                'price' => '9.90',
                'img_url' => 'https://klassmarket.ua/image/cache/catalog/data/catalog/frukty_ovoshch%20i/8_5086-270x270.png?969571',
                'supermarket_id' => '2',
                'category_id' => '3',
                'measure' => '1кг',
            ],
            [
                'name' => 'Цибуля зелена свіжа',
                'price' => '11.20',
                'img_url' => 'https://klassmarket.ua/image/cache/catalog/data/catalog/frukty_ovoshch%20i/8_10093-270x270.png?969571',
                'supermarket_id' => '2',
                'category_id' => '2',
                'measure' => '70 гр',
            ],
            [
                'name' => 'Засіб для прання Color рідкий ТМ ARIEL',
                'price' => '199.00',
                'img_url' => 'https://klassmarket.ua/image/cache/catalog/data/catalog/bytovaya_khimi%20ya/07_23800-270x270.png?969571',
                'supermarket_id' => '1',
                'category_id' => '10',
                'measure' => '1,1л',
            ],
        ]);
    }
}
