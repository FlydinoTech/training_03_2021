<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'tuituion',
        'time',
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'course_id');
    }

    public function register()
    {
        return $this->hasManyThrough(Register::class, Schedule::class, 'course_id', 'schedule_id');
    }
}
