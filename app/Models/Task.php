<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'slug',
        'description',
        'status',
        'deadline'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
