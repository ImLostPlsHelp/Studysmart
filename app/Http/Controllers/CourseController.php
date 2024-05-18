<?php

// app/Http/Controllers/CourseController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('Studysmart.courses', compact('courses'));
    }
}
