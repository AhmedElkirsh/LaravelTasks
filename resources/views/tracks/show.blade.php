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
    </style>
</head>
<body class="h-full">
    <div class="container mx-auto mt-10 p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex">


            <div class="flex-grow p-6 flex ">
                <div class="bg-gray-50 p-4 rounded-lg shadow-md h-full space-y-4 flex-grow">
                    <p class="text-gray-600 mb-2"><span class="font-semibold">ID:</span> {{ $track->id }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Name:</span> {{ $track->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Prerequisite:</span> {{ $track->prerequisite }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Hours:</span> {{ $track->hours }}</p>
                </div>
                <div class="flex flex-col space-y-2 ml-4">

                    <a href="{{ route('students.index') }}" class="button-icon bg-blue-500 text-white hover:bg-blue-700">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
</body>
</html>