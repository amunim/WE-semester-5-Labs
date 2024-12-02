<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('class')->insert([
            ['id' => 1, 'teacherid' => 2, 'starttime' => '2024-11-26 18:09:00', 'endtime' => '2024-11-26 18:09:00', 'credit_hours' => 11],
            ['id' => 2, 'teacherid' => 2, 'starttime' => '2024-11-26 18:27:00', 'endtime' => '2024-11-26 23:32:00', 'credit_hours' => 3],
            ['id' => 3, 'teacherid' => 2, 'starttime' => '2024-11-26 18:27:00', 'endtime' => '2024-11-26 23:32:00', 'credit_hours' => 3],
            ['id' => 4, 'teacherid' => 2, 'starttime' => '2024-11-26 18:27:00', 'endtime' => '2024-11-26 23:32:00', 'credit_hours' => 3],
            ['id' => 5, 'teacherid' => 2, 'starttime' => '2024-11-26 20:27:00', 'endtime' => '2024-11-26 21:27:00', 'credit_hours' => 12],
            ['id' => 6, 'teacherid' => 2, 'starttime' => '2024-11-26 20:19:00', 'endtime' => '2024-11-26 21:20:00', 'credit_hours' => 12],
            ['id' => 7, 'teacherid' => 2, 'starttime' => '2024-11-30 22:53:00', 'endtime' => '2024-11-30 13:53:00', 'credit_hours' => 1],
        ]);
    }
}
