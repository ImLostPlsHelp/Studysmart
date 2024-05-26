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

    public function show_details($id)
    {
        $course = Course::findOrFail($id);
        return view('Studysmart.course-view', compact('course'));
    }

    public function create()
    {
        return view('Studysmart.admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer|unique:courses,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Menyertakan ID dalam pembuatan kursus baru
        Course::create([
            'id' => $request->input('course_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('Studysmart.admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_id' => 'required|integer|unique:courses,id,' . $course->id,
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Menyertakan ID dalam pembaruan kursus
        $course->update([
            'id' => $request->input('course_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

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

