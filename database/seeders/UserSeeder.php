<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Max',
            'email' => 'koctenko525@gmail.com',
            'phone' => '+380660685608',
            'sex' => 'male',
            'dob' => '2002-10-11',
            'password' => '$2y$10$pw2uU70GXL9zDdyL68hSEOhaxvK/.9X9gSeiq37UaAPY51GJzw1Ha' //qwerty123
        ]);

        User::create([
            'name' => 'Mike',
            'email' => 'mike123@gmail.com',
            'phone' => '+380953437680',
            'sex' => 'male',
            'dob' => '1997-09-09',
            'password' => '$2y$10$pw2uU70GXL9zDdyL68hSEOhaxvK/.9X9gSeiq37UaAPY51GJzw1Ha' //qwerty123
        ]);
    }
}
