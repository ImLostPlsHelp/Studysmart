<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description'];
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany(Profile::class, 'completed_courses');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
