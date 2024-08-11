<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full overflow-hidden">
    <div class="container mx-auto mt-10 p-2">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Student</h2>
            
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                </div>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                </div>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                @error('gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                    <input type="text" name="grade" id="grade" value="{{ old('grade', $student->grade) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                </div>
                @error('grade')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $student->address) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                </div>
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @if($student->image)
                        <p class="mt-2 text-sm text-gray-500">Current image: <a href="{{ asset('storage/' . $student->image) }}" class="text-blue-500 underline" target="_blank">View</a></p>
                    @endif
                </div>
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mb-4">
                    <label for="track_id" class="block text-sm font-medium text-gray-700">Track</label>
                    <select name="track_id" id="track" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-8 pl-4" required>
                        <!-- Assuming you have a list of tracks in the controller -->
                        @foreach($tracks as $track)
                            <option value="{{ $track->id }}" {{ old('track_id', $student->track_id) == $track->id ? 'selected' : '' }}>{{ $track->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
