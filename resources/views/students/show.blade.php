<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .button-icon {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            font-size: 1.25rem;
        }

        .image-container {
            height: 16rem; /* Set a fixed height for the container */
        }

        .image-container img {
            height: 100%;
            width: auto;
            object-fit: cover;
            border-radius: 0.5rem; /* Ensure image is rounded within the container */
        }
    </style>
</head>
<body class="h-full">
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex items-center">

            <div class="w-1/3 p-4 flex items-center justify-center image-container">
                <img src="{{ asset($student->image) }}" alt="Student Image" class="shadow-md w-full object-cover">
            </div>

            <div class="w-2/3 p-6 flex">
                <div class="bg-gray-50 p-4 rounded-lg shadow-md h-full space-y-4 flex-grow">
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Name:</span> {{ $student->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Email:</span> {{ $student->email }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Gender:</span> {{ $student->gender }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Grade:</span> {{ $student->grade }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Address:</span> {{ $student->address }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Track:</span> {{ $student->track->name }}</p>
                </div>
                <div class="flex flex-col space-y-2 ml-4">
                    <a href="{{ route('students.index') }}" class="button-icon bg-blue-500 text-white hover:bg-blue-700">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-icon bg-red-500 text-white hover:bg-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
