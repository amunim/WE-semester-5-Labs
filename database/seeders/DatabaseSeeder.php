<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AttendanceTableSeeder::class,
            ClassTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
