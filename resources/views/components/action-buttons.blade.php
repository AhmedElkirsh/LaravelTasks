@props(['resource', 'model'])

<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center flex justify-center space-x-4">
    <form action="{{ route($resource . '.show', $model) }}" method="GET">
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">View</button>
    </form>
    <form action="{{ route($resource . '.edit', $model) }}" method="GET">
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">Edit</button>
    </form>
    <form action="{{ route($resource . '.destroy', $model) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Delete</button>
    </form>
</td>
