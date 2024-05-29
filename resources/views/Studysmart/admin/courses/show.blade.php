<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studysmart - Show Lessons</title>
    <style>
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        th,
        td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 40%;
            /* Adjust as needed */
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 30%;
            /* Adjust as needed */
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 20%;
            /* Adjust as needed */
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lessons for ') . $course->name }}
            </h2>
            <a href="{{ route('admin.courses.index') }}" class="text-green-600 hover:text-blue-500 ml-2">Back to
                Courses</a>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('courses.lessons.create', ['course' => $course->id]) }}">
                            <button type="submit" class="text-green-600 hover:text-blue-500 ml-2">Add Lessons</button>
                        </form>
                        <div class="table-container">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID</th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Questions</th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Answers</th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="lessons-list">
                                    @foreach ($lessons as $lesson)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $lesson->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $lesson->questions }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $lesson->answers }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button type="button" data-lesson-id="{{ $lesson->id }}"
                                                    data-lesson-questions="{{ $lesson->questions }}"
                                                    data-lesson-answers="{{ $lesson->answers }}"
                                                    class="text-indigo-600 hover:text-indigo-900 edit-lesson">{{ __('Edit') }}</button>
                                                <form
                                                    action="{{ route('courses.lessons.destroy', ['course' => $course->id, 'lesson' => $lesson->id]) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900 ml-2">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal -->
                        <div id="lesson-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div
                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <form id="lesson-form" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                        id="modal-title">
                                                        Add/Edit Lesson
                                                    </h3>
                                                    <div class="mt-2">
                                                        <input type="hidden" id="lesson-id" name="lesson-id">
                                                        <div>
                                                            <label for="questions"
                                                                class="block text-sm font-medium text-gray-700">Questions</label>
                                                            <input type="text" id="questions" name="questions"
                                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        <div class="mt-4">
                                                            <label for="answers"
                                                                class="block text-sm font-medium text-gray-700">Answers</label>
                                                            <input type="text" id="answers" name="answers"
                                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Save
                                            </button>
                                            <button type="button" id="cancel-btn"
                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- JavaScript to handle edit event and modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('lesson-modal');
            const editButtons = document.querySelectorAll('.edit-lesson');
            const cancelBtn = document.getElementById('cancel-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const lessonId = this.getAttribute('data-lesson-id');
                    const lessonQuestions = this.getAttribute('data-lesson-questions');
                    const lessonAnswers = this.getAttribute('data-lesson-answers');

                    document.getElementById('lesson-id').value = lessonId;
                    document.getElementById('questions').value = lessonQuestions;
                    document.getElementById('answers').value = lessonAnswers;

                    document.getElementById('lesson-form').action = `/courses/{{ $course->id }}/lessons/${lessonId}`;

                    modal.classList.remove('hidden');
                });
            });

            cancelBtn.addEventListener('click', function () {
                modal.classList.add('hidden');
            });

            // Handle form submission with redirection
            const lessonForm = document.getElementById('lesson-form');
            lessonForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                const formData = new FormData(lessonForm);
                const lessonId = formData.get('lesson-id');
                const url = `/courses/{{ $course->id }}/lessons/${lessonId}`;

                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                if (response.ok) {
                    window.location.href = `/admin/courses/{{ $course->id }}`;
                } else {
                    alert('An error occurred while saving the lesson.');
                }
            });
        });
    </script>
</body>

</html>