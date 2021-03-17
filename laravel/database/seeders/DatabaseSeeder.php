<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();\
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
            ]
        ]);

        DB::table('courses')->insert([
            [
                'name' => 'Lập trình Front End',
                'desc' => 'Khóa học lập trình Front End',
                'detail' => 'Khóa học lập trình Front End',
                'tuition' => 8000000,
                'time' => '5 tháng'
            ],
            [
                'name' => 'Lập Trình PHP & Laravel',
                'desc' => 'Khóa học lập trình PHP & Laravel',
                'detail' => 'Khóa học lập trình PHP & Laravel',
                'tuition' => 10000000,
                'time' => '6 tháng'
            ],
            [
                'name' => 'Lập Trình Java từ A-Z',
                'desc' => 'Khóa học lập trình Java từ A-Z',
                'detail' => 'Khóa học lập trình Java từ A-Z',
                'tuition' => 10000000,
                'time' => '6 tháng'
            ],
            [
                'name' => 'Lập trình iOS – Swift',
                'desc' => 'Khóa học lập trình iOS – Swift',
                'detail' => 'Khóa học lập trình iOS – Swift',
                'tuition' => 10000000,
                'time' => '6 tháng'
            ],
            [
                'name' => 'Lập trình Android -Kotlin',
                'desc' => 'Khóa học lập trình Android -Kotlin',
                'detail' => 'Khóa học lập trình Android -Kotlin',
                'tuition' => 10000000,
                'time' => '6 tháng'
            ],
            [
                'name' => 'Kiểm thử phần mềm',
                'desc' => 'Khóa học kiểm thử phần mềm',
                'detail' => 'Khóa học kiểm thử phần mềm',
                'tuition' => 7000000,
                'time' => '3 tháng'
            ]
        ]);

        DB::table('schedules')->insert([
            [
                'course_id' => 1,
                'name' => 'FE 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 2-4-6 từ 19h-21h30'
            ],
            [
                'course_id' => 2,
                'name' => 'PHP 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 3-5-7 từ 19h-21h30'
            ],
            [
                'course_id' => 3,
                'name' => 'JAVA 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 2-4-6 từ 19h-21h30'
            ],
            [
                'course_id' => 4,
                'name' => 'IOS 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 3-5-7 từ 19h-21h30'
            ],
            [
                'course_id' => 5,
                'name' => 'AD 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 2-4-6 từ 19h-21h30'
            ],
            [
                'course_id' => 6,
                'name' => 'TEST 01',
                'start' => '2021-03-17',
                'calendar' => 'Thứ 3-5-7 từ 19h-21h30'
            ]
        ]);
    }
}
