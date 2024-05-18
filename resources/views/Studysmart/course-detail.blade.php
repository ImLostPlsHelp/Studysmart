<!-- resources/views/Studysmart/course-detail.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->name }}</title>
</head>
<body>
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>

    <h2>Modules</h2>
    @foreach ($course->modules as $module)
        <div>
            <h3>{{ $module->name }}</h3>
            <ul>
                @foreach ($module->lessons as $lesson)
                    <li>
                        <a href="{{ route('lessons.show', ['id' => $lesson->id, 'module_id' => $module->id]) }}">{{ $lesson->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</body>
</html>
