<?php

// app/Models/Lesson.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['questions', 'answers', 'course_id'];

    // Jika ada relasi dengan Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public $timestamps = false;
}

