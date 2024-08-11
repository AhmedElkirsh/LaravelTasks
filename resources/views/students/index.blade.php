<x-layout>
    <x-slot:heading>
        Students
    </x-slot:heading>
    
    <form action={{route('students.create')}} method="GET">
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Add Student</button>
    </form>
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Gender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Grade</th>
                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Age</th> --}}
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Track</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="w-10 h-10 rounded-full overflow-hidden">
                                <img src="{{ asset($student['image']) }}" alt="student image" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $student['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $student['gender'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $student['grade'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $student['address'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            <form action="{{ route('tracks.show', $student->track->id) }}" method="GET" class="inline-block">
                                <button type="submit" class="text-blue-400 font-medium hover:text-blue-600 py-2 px-4 rounded-lg">
                                    {{ $student->track->name }}
                                </button>
                            </form>                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center flex justify-center space-x-4">
                            <form action={{route('students.show', $student->id )}} method="GET">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">View</button>
                            </form>
                            <form action={{route('students.edit', $student->id )}} method="GET">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">Edit</button>
                            </form>
                            <form action={{route('students.destroy', $student->id )}} method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-layout>
