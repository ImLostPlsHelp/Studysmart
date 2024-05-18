<!-- resources/views/lesson-result.blade.php -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">{{ $course->name }}</h6>
            <h1 class="mb-5">Result</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-8 col-md-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="result-item bg-light p-4 text-center">
                    @if($isCorrect)
                        <h5 class="mb-4 text-success">Correct!</h5>
                        <form action="{{ route('lessons.next', $course->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Next</button>
                        </form>
                    @else
                        <h5 class="mb-4 text-danger">Wrong! Please try again.</h5>
                        <form action="{{ route('lessons.show', $course->id) }}" method="GET" class="mt-3">
                            <button type="submit" class="btn btn-primary">Retry</button>
                        </form>
                    @endif
                    <p>{{ $currentLesson->questions }}</p>
                    <p>Correct Answer: {{ $currentLesson->answers }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
