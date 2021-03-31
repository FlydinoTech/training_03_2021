<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Lập trình Front End',
            'description' => 'Khóa học lập trình Front End',
            'detail' => 'Khóa học lập trình Front End',
            'tuition' => 8000000,
            'time' => '5 tháng',
        ]);

        Course::create([
            'name' => 'Lập Trình PHP & Laravel',
            'description' => 'Khóa học lập trình PHP & Laravel',
            'detail' => 'Khóa học lập trình PHP & Laravel',
            'tuition' => 10000000,
            'time' => '6 tháng',
        ]);

        Course::create([

            'name' => 'Lập Trình Java từ A-Z',
            'description' => 'Khóa học lập trình Java từ A-Z',
            'detail' => 'Khóa học lập trình Java từ A-Z',
            'tuition' => 10000000,
            'time' => '6 tháng',
        ]);

        Course::create([
            'name' => 'Lập trình iOS – Swift',
            'description' => 'Khóa học lập trình iOS – Swift',
            'detail' => 'Khóa học lập trình iOS – Swift',
            'tuition' => 10000000,
            'time' => '6 tháng',
        ]);

        Course::create([
            'name' => 'Lập trình Android -Kotlin',
            'description' => 'Khóa học lập trình Android -Kotlin',
            'detail' => 'Khóa học lập trình Android -Kotlin',
            'tuition' => 10000000,
            'time' => '6 tháng',
        ]);

        Course::create([
            'name' => 'Kiểm thử phần mềm',
            'description' => 'Khóa học kiểm thử phần mềm',
            'detail' => 'Khóa học kiểm thử phần mềm',
            'tuition' => 7000000,
            'time' => '3 tháng',
        ]);
    }
}
