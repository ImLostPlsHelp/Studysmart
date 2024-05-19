<?php

// app/Http/Controllers/LessonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\CompletedCourse;
use Illuminate\Support\Facades\Auth;
use Session;

class LessonController extends Controller
{
    public function showQuestion($course_id)
    {
        $course = Course::findOrFail($course_id);
        $lessons = Lesson::where('course_id', $course_id)->get();

        if (!Session::has('question_index')) {
            Session::put('question_index', 0);
        }

        $index = Session::get('question_index');
        $currentLesson = $lessons[$index];

        $correctlyAnswered = Session::get('correctly_answered', []);

        return view('Studysmart.lessons', compact('course', 'currentLesson', 'correctlyAnswered'));
    }

    public function nextQuestion(Request $request, $course_id)
    {
        $lessons = Lesson::where('course_id', $course_id)->get();
        $index = Session::get('question_index');

        // Cek apakah semua soal sudah dijawab dengan benar
        $correctlyAnswered = Session::get('correctly_answered', []);
        $allCorrect = count($correctlyAnswered) === count($lessons) && !in_array(false, $correctlyAnswered, true);
        $course = Course::findOrFail($course_id);

        if ($allCorrect) {
            // Simpan data kursus yang telah selesai
            $user = Auth::user();
            CompletedCourse::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'nama_course' => $course->name,
            ]);

            // Reset session jika semua soal sudah benar
            Session::forget('question_index');
            Session::forget('correctly_answered');
            return view('Studysmart.congratulations', compact('course'));
        }

        if ($index < count($lessons) - 1) {
            Session::put('question_index', $index + 1);
        } else {
            Session::put('question_index', 0); // Restart to the first question if we reach the end
        }

        return redirect()->route('lessons.show', $course_id);
    }

    public function submitAnswer(Request $request, $course_id)
    {
        $lessons = Lesson::where('course_id', $course_id)->get();
        $index = Session::get('question_index');
        $currentLesson = $lessons[$index];
        $course = Course::findOrFail($course_id);

        $answer = $request->input('answer');
        $isCorrect = ($answer == $currentLesson->answers); // Asumsi terdapat kolom `correct_answer` di tabel `lessons`

        if ($isCorrect) {
            $correctlyAnswered = Session::get('correctly_answered', []);
            $correctlyAnswered[$index] = true;
            Session::put('correctly_answered', $correctlyAnswered);
            return redirect()->route('lessons.next', $course_id);
        } else {
            $correctlyAnswered = Session::get('correctly_answered', []);
            $correctlyAnswered[$index] = false;
            Session::put('correctly_answered', $correctlyAnswered);
            return view('Studysmart.lessons-result', compact('course', 'currentLesson', 'isCorrect'));
        }
    }
}


