<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'course_id' => 1,
            'name' => 'FE 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 2-4-6 từ 19h-21h30',
        ]);

        Schedule::create([
            'course_id' => 2,
            'name' => 'PHP 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 3-5-7 từ 19h-21h30',
        ]);

        Schedule::create([
            'course_id' => 3,
            'name' => 'JAVA 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 2-4-6 từ 19h-21h30',
        ]);

        Schedule::create([
            'course_id' => 4,
            'name' => 'IOS 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 3-5-7 từ 19h-21h30',
        ]);

        Schedule::create([
            'course_id' => 5,
            'name' => 'AD 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 2-4-6 từ 19h-21h30',
        ]);

        Schedule::create([
            'course_id' => 6,
            'name' => 'TEST 01',
            'start' => '2021-03-17',
            'calendar' => 'Thứ 3-5-7 từ 19h-21h30',
        ]);
    }
}
