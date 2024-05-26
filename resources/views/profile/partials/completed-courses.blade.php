<!-- resources/views/profile/partials/completed-courses.blade.php -->
<div class="completed-courses">
    <h3>Completed Courses</h3>
    <ul>
        @foreach($completedCourses as $course)
            <li>
                {{ $course->nama_course }}
                <a href="{{ route('certificate.show', $course->id) }}" class="btn btn-primary btn-sm">Show</a>
            </li>
        @endforeach
    </ul>
</div>
