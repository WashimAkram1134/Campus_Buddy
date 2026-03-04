<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'user_id',
        'course_code',
        'title',
        'description',
        'deadline',
        'department',
        'batch',
        'section',
        'major',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}