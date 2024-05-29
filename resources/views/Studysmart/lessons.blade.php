<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Studysmart - Quiz/Lesson </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->

    <!-- Quiz -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ $course->name }}</h6>
                <h1 class="mb-5">Pertanyaan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-8 col-md-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <div class="exercise-container">
                        <div class="exercise-header">Latihan:</div>
                        <p>{{ $currentLesson->questions }}</p>

                        <form action="{{ route('lessons.submit', $course->id) }}" method="POST">
                            @csrf
                            <input type="text" name="answer" class="form-control mb-3" placeholder="Jawaban Anda">
                            <button type="submit" class="btn btn-primary" style="width: 115px;">Kirim</button>
                        </form>

                        <form action="{{ route('lessons.next', $course->id) }}" method="GET" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary" style="width: 115px;">Selanjutnya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quiz -->


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js"></script>
</body>

</html>