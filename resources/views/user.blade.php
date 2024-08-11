<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10 p-4">
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gray-50 text-gray-500 text-xl p-4">
            User Details
        </div>
        <div class="p-6">
            <p class="mb-2"><span class="font-semibold">ID:</span> {{ $user['id'] }}</p>
            <p class="mb-2"><span class="font-semibold">Name:</span> {{ $user['name'] }}</p>
            <p class="mb-4"><span class="font-semibold">Age:</span> {{ $user['age'] }}</p>
            <div class="w-full flex justify-end"><a href="/users" class="text-blue-500 hover:text-blue-700">Back to Users List</a></div>
        </div>
    </div>
</div>

</body>
</html>
