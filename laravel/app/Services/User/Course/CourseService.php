<?php

namespace App\Services\User\Course;

use App\Services\User\Course\BaseService; 
use App\Models\Course;

class CourseService extends BaseService
{
    //private $model;
    
    public function __construct(Course $course)
    {
        $this->model = $course;
    }
    
    public function getlist()
    {
        return $this->model;
    }
    
    public function searchCourse($name)
    {
        return $this->model->where('name', 'like', '%' . $name . '%');
    }
}
