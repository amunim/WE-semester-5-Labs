<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('attendance')->insert([
            ['classid' => 1, 'studentid' => 1, 'isPresent' => 0, 'comments' => '', 'marked_at' => '2024-11-26 17:35:02'],
            ['classid' => 3, 'studentid' => 1, 'isPresent' => 1, 'comments' => '', 'marked_at' => '2024-11-25 20:06:26'],
            ['classid' => 2, 'studentid' => 1, 'isPresent' => 1, 'comments' => '', 'marked_at' => '2024-11-25 20:06:26'],
            ['classid' => 2, 'studentid' => 1, 'isPresent' => 0, 'comments' => '', 'marked_at' => '2024-11-25 20:06:26'],
            ['classid' => 3, 'studentid' => 1, 'isPresent' => 1, 'comments' => '', 'marked_at' => '2024-11-25 20:14:38'],
            ['classid' => 3, 'studentid' => 1, 'isPresent' => 0, 'comments' => '', 'marked_at' => '2024-11-25 20:15:01'],
            ['classid' => 3, 'studentid' => 1, 'isPresent' => 1, 'comments' => '', 'marked_at' => '2024-11-26 20:19:30'],
            ['classid' => 5, 'studentid' => 1, 'isPresent' => 1, 'comments' => '', 'marked_at' => '2024-11-26 17:59:45'],
            ['classid' => 7, 'studentid' => 1, 'isPresent' => 0, 'comments' => '', 'marked_at' => '2024-11-26 17:56:02'],
        ]);
    }
}
