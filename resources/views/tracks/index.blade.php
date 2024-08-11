<x-layout>
    <x-slot:heading>
        Tracks
    </x-slot:heading>
    
    <form action={{route('tracks.create')}} method="GET">
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Add Track</button>
    </form>
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Prerequisite</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Hours</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tracks as $track)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="w-10 h-10 rounded-full overflow-hidden">
                                <img src="{{ asset($track['image']) }}" alt="student image" class="w-full h-full object-cover">
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $track['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $track['prerequisite'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $track['hours'] }}</td>
                                                    
                        <x-action-buttons resource="tracks" :model="$track" />
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-layout>
