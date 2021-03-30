<?php

namespace App\Services\User\Course;

use App\Models\Course;

class CourseService
{
    private $course;
    
    public function __construct(Course $course)
    {
        $this->course = $course;
    }
    
    public function getlist()
    {
        return $this->course;
    }
    
    public function searchCourse($name)
    {
        
        return $this->course->where('name', 'like', '%' . $name . '%');
    }
}
