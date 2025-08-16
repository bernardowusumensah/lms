<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Welcome to Student Management System!</h3>
                    <p class="mb-6">{{ __("You're logged in!") }} Manage your students efficiently.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-blue-800 dark:text-blue-200">Students</h4>
                            <p class="text-2xl font-bold text-blue-600 dark:text-blue-300">{{ \App\Models\Student::count() }}</p>
                            <a href="{{ route('students.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">View All Students</a>
                        </div>
                        
                        <div class="bg-purple-50 dark:bg-purple-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-purple-800 dark:text-purple-200">Courses</h4>
                            <p class="text-2xl font-bold text-purple-600 dark:text-purple-300">{{ \App\Models\Course::count() }}</p>
                            <a href="{{ route('courses.index') }}" class="text-purple-600 dark:text-purple-400 hover:underline">View All Courses</a>
                        </div>
                        
                        <div class="bg-orange-50 dark:bg-orange-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-orange-800 dark:text-orange-200">Professors</h4>
                            <p class="text-2xl font-bold text-orange-600 dark:text-orange-300">{{ \App\Models\Professor::count() }}</p>
                            <a href="{{ route('professors.index') }}" class="text-orange-600 dark:text-orange-400 hover:underline">View All Professors</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-green-50 dark:bg-green-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-800 dark:text-green-200">Add Student</h4>
                            <p class="text-sm text-green-600 dark:text-green-300">Create new student record</p>
                            <a href="{{ route('students.create') }}" class="text-green-600 dark:text-green-400 hover:underline">Add New Student</a>
                        </div>
                        
                        <div class="bg-green-50 dark:bg-green-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-800 dark:text-green-200">Add Course</h4>
                            <p class="text-sm text-green-600 dark:text-green-300">Create new course record</p>
                            <a href="{{ route('courses.create') }}" class="text-green-600 dark:text-green-400 hover:underline">Add New Course</a>
                        </div>
                        
                        <div class="bg-green-50 dark:bg-green-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-800 dark:text-green-200">Add Professor</h4>
                            <p class="text-sm text-green-600 dark:text-green-300">Create new professor record</p>
                            <a href="{{ route('professors.create') }}" class="text-green-600 dark:text-green-400 hover:underline">Add New Professor</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-red-50 dark:bg-red-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-800 dark:text-red-200">Trashed Students</h4>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-300">{{ \App\Models\Student::onlyTrashed()->count() }}</p>
                            <a href="{{ route('students.trashed') }}" class="text-red-600 dark:text-red-400 hover:underline">View Trashed Students</a>
                        </div>
                        
                        <div class="bg-red-50 dark:bg-red-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-red-800 dark:text-red-200">Trashed Courses</h4>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-300">{{ \App\Models\Course::onlyTrashed()->count() }}</p>
                            <a href="{{ route('courses.trashed') }}" class="text-red-600 dark:text-red-400 hover:underline">View Trashed Courses</a>
                        </div>
                    </div>
                            <a href="{{ route('students.trashed') }}" class="text-red-600 dark:text-red-400 hover:underline">View Trashed Students</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
