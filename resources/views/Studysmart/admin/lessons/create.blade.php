<!-- resources/views/Studysmart/admin/lessons/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pertanyaan untuk Kursus ') . $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('courses.lessons.store', $course->id) }}">
                        @csrf
                        <div>
                            <label for="questions" class="block font-medium text-sm text-gray-700">
                                {{ __('Pertanyaan') }}
                            </label>
                            <input id="questions" class="block mt-1 w-full" type="text" name="questions" required autofocus />
                        </div>
                        <div class="mt-4">
                            <label for="answers" class="block font-medium text-sm text-gray-700">
                                {{ __('Jawaban') }}
                            </label>
                            <input id="answers" class="block mt-1 w-full" type="text" name="answers" required />
                        </div>
                        <div class="mt-4">
                            <input type="hidden" name="course_id" value="{{ $course->id }}" />
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150" style="background-color: #06BBCC;">
                                {{ __('Tambah Pertanyaan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
