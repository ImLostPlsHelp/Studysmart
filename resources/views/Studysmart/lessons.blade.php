<!-- resources/views/lesson.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Studysmart - lessons</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
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
                    <div class="question-item bg-light p-4">
                        <h5 class="mb-4">{{ $currentLesson->title }}</h5>
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
    </div>
    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>