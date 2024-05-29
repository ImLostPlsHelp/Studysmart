<!-- resources/views/profile/partials/completed-courses.blade.php -->
<div class="completed-courses">
<h2 class="text-lg font-medium text-gray-900">
            {{ __('Completed Course') }}
        </h2>
    <ul class="course-list">
        @foreach($completedCourses as $course)
            <li class="course-item">
                <span style="text-transform: uppercase;">{{ $course->nama_course }}</span>
                <span class="course-date">{{ $course->created_at->format('H:i:s d-m-Y') }}</span>
            </li>
        @endforeach
    </ul>
</div>

<!-- Tambahkan link ke file CSS atau inline CSS -->
<style>
    .course-list {
        list-style-type: none;
        padding: 0;
    }

    .course-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0px 5px 0px;
        border-bottom: 1px solid #ccc;
    }

    .course-item span.course-date {
        font-size: 0.9em;
        color: #888;
    }
</style>
