<!-- resources/views/profile/partials/completed-courses.blade.php -->
<div class="completed-courses">
    <h3>Completed Courses</h3>
    <ul>
        @foreach($completedCourses as $course)
            <li>{{ $course->nama_course }}</li>
        @endforeach
    </ul>
</div>
