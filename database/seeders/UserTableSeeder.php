<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            ['id' => 1, 'fullname' => 'Abdul Munim', 'email' => 'amunim@amunim.me', 'class' => '13', 'role' => 'student'],
            ['id' => 2, 'fullname' => 'Ammar Shahzad', 'email' => 'ammar@gmail.com', 'class' => '13', 'role' => 'teacher'],
        ]);
    }
}
