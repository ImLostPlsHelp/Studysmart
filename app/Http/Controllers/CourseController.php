<?php

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

    public function indexAdmin()
    {
        $courses = Course::all();
        return view('Studysmart.admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $lessons = $course->lessons;
        return view('Studysmart.admin.courses.show', compact('course', 'lessons'));
    }

    public function create()
    {
        return view('Studysmart.admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Course::create($request->all());

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('Studysmart.admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $course->update($request->only(['name', 'description']));

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        // Menghapus semua lessons yang terkait dengan course ini
        $course->lessons()->delete();

        // Setelah semua lessons dihapus, baru hapus course
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
