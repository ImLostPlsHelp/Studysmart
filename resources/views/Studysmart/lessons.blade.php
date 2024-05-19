<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Custom Stylesheet -->
    <style>
        .exercise-container {
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .exercise-header {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .code-box {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            font-family: "Courier New", Courier, monospace;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .btn-submit {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ $course->name }}</h6>
                <h1 class="mb-5">Question</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-8 col-md-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <div class="exercise-container">
                        <div class="exercise-header">Exercise:</div>
                        <p>{{ $currentLesson->questions }}</p>
                
                        <form action="{{ route('lessons.submit', $course->id) }}" method="POST">
                            @csrf
                            <input type="text" name="answer" class="form-control mb-3" placeholder="Your Answer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <form action="{{ route('lessons.next', $course->id) }}" method="GET" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Next</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>