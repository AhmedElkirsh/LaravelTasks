<x-layout>
    <x-slot:heading>
        Course
    </x-slot:heading>
    <div class="container mx-auto mt-10 p-4 bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="border-b border-gray-200 pb-4">
            <h2 class="text-2xl font-semibold text-gray-900">Course Details</h2>
        </div>

        <div class="mt-4">
            <div class="text-lg font-medium text-gray-700">Course Information</div>
            <div class="mt-2">
                <p class="text-md text-gray-600"><strong>ID:</strong> {{ $course->id }}</p>
                <p class="text-md text-gray-600"><strong>Name:</strong> {{ $course->name }}</p>
                <p class="text-md text-gray-600"><strong>Maxscore:</strong> {{ $course->maxscore }}</p>
            </div>
        </div>

        <div class="mt-6">
            <div class="text-lg font-medium text-gray-700">Associated Tracks</div>
            <ul class="mt-2 space-y-2">
                @forelse($course->tracks as $track)
                    <li class="bg-gray-100 p-3 rounded-md shadow-sm">
                        {{ $track->name }}
                    </li>
                @empty
                    <li class="text-gray-500">No associated tracks</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6 flex items-center gap-x-4">
            <x-button href="{{ route('courses.index') }}">Back to List</x-button>
            <x-button href="{{ route('courses.edit', $course) }}" class="bg-blue-500 hover:bg-blue-700">Edit Course</x-button>
        </div>
    </div>
</x-layout>

