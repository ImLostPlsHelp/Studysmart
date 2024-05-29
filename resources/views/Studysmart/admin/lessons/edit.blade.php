<!-- resources/views/Studysmart/admin/lessons/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pertanyaan untuk Kursus ') . $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('courses.lessons.update', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="questions" :value="__('Pertanyaan')" />
                            <x-input id="questions" class="block mt-1 w-full" type="text" name="questions" value="{{ $lesson->questions }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="answers" :value="__('Jawaban')" />
                            <x-input id="answers" class="block mt-1 w-full" type="text" name="answers" value="{{ $lesson->answers }}" required />
                        </div>
                        <div class="mt-4">
                            <x-button>
                                {{ __('Perbarui Pertanyaan') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
