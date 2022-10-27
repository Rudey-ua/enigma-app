<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Алкоголь'],
            ['name' => 'Овочі'],
            ['name' => 'Фрукти'],
            ['name' => 'Риба'],
            ['name' => 'Сир'],
            ['name' => 'Чай'],
            ['name' => 'Кава'],
            ['name' => 'М`ясо та птиця'],
            ['name' => 'Макарони та крупи'],
            ['name' => 'Побутова хімія'],
            ['name' => 'Дитячі товари']
        ]);
    }
}
