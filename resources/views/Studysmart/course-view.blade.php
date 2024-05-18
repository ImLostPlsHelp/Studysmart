<!-- resources/views/Studysmart/course-view.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
</head>
<body>
    <h1>Course List</h1>
    <ul>
        @foreach ($courses as $course)
            <li>
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>