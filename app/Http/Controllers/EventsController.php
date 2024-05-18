<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class EventsController extends Controller
{
    public function show($id, $module_id)
    {
        // Fetch lesson from the database
        $lesson = Lesson::where('id', $id)->where('module_id', $module_id)->firstOrFail();

        return view('Studysmart.lesson-view')
            ->with('name', $lesson->name)
            ->with('lesson_content', $lesson->lesson_content);
    }
}

