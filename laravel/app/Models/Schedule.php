<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [
        'id',
        'course_id',
        'start',
        'registered',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
