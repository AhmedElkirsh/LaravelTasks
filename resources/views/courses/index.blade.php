<x-layout>
    <x-slot:heading>
        Courses
    </x-slot:heading>
    
    <form action="{{ route('courses.create') }}" method="GET">
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Add Course</button>
    </form>
    
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maxscore</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $course->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->maxscore }}</td>
                                                    
                        <x-action-buttons resource="courses" :model="$course" />
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-layout>
