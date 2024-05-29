<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kursus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="#" id="add-course-btn" class="mb-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150" style="background-color: #06BBCC;">
                        {{ __('Tambah Kursus') }}
                    </a>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="courses-list">
                            @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $course->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $course->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.courses.show', $course->id) }}" class="text-green-600 hover:text-green-900 pr-3">Lihat Pelajaran</a>
                                    <button type="button" data-course-id="{{ $course->id }}" data-course-name="{{ $course->name }}" data-course-description="{{ $course->description }}" class="text-indigo-600 hover:text-indigo-900 edit-course">{{ __('Edit') }}</button>
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">{{ __('Hapus') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Add Course Modal -->
                    <div id="add-course-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <form id="add-course-form" method="POST" action="/admin/courses">
                                    @csrf
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Tambah Kursus
                                                </h3>
                                                <div class="mt-2">
                                                    <div>
                                                        <label for="add-course-id" class="block text-sm font-medium text-gray-700">ID</label>
                                                        <input type="text" id="add-course-id" name="course_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="add-name" class="block text-sm font-medium text-gray-700">Nama</label>
                                                        <input type="text" id="add-name" name="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="add-description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                        <input type="text" id="add-description" name="description" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm" style="background-color: #06BBCC;">
                                            Simpan
                                        </button>
                                        <button type="button" id="cancel-add-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Course Modal -->
                    <div id="edit-course-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <form id="edit-course-form" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Edit Kursus
                                                </h3>
                                                <div class="mt-2">
                                                    <div>
                                                        <label for="edit-course-id" class="block text-sm font-medium text-gray-700">ID</label>
                                                        <input type="text" id="edit-course-id" name="course_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="edit-name" class="block text-sm font-medium text-gray-700">Nama</label>
                                                        <input type="text" id="edit-name" name="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="mt-4">
                                                        <label for="edit-description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                        <input type="text" id="edit-description" name="description" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm" style="background-color: #06BBCC;">
                                            Simpan
                                        </button>
                                        <button type="button" id="cancel-edit-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const addCourseBtn = document.getElementById('add-course-btn');
                            const editButtons = document.querySelectorAll('.edit-course');
                            const addModal = document.getElementById('add-course-modal');
                            const editModal = document.getElementById('edit-course-modal');
                            const cancelAddBtn = document.getElementById('cancel-add-btn');
                            const cancelEditBtn = document.getElementById('cancel-edit-btn');
                            const addForm = document.getElementById('add-course-form');
                            const editForm = document.getElementById('edit-course-form');
                            const addCourseIdInput = document.getElementById('add-course-id');
                            const editCourseIdInput = document.getElementById('edit-course-id');
                            const nameInput = document.getElementById('edit-name');
                            const descriptionInput = document.getElementById('edit-description');

                            addCourseBtn.addEventListener('click', function() {
                                addForm.reset();
                                addModal.classList.remove('hidden');
                            });

                            editButtons.forEach(button => {
                                button.addEventListener('click', function() {
                                    const courseId = this.getAttribute('data-course-id');
                                    const courseName = this.getAttribute('data-course-name');
                                    const courseDescription = this.getAttribute('data-course-description');

                                    editCourseIdInput.value = courseId;
                                    nameInput.value = courseName;
                                    descriptionInput.value = courseDescription;

                                    editForm.action = `/admin/courses/${courseId}`;
                                    editModal.classList.remove('hidden');
                                });
                            });

                            cancelAddBtn.addEventListener('click', function() {
                                addModal.classList.add('hidden');
                            });

                            cancelEditBtn.addEventListener('click', function() {
                                editModal.classList.add('hidden');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>