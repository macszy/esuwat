<div>
    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <td class="border border-gray-300 px-4 py-2">Created Date</td>
                <td class="border border-gray-300 px-4 py-2">Updated Date</td>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks->count() > 0)
                @foreach ($tasks as $task)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->created_at->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $task->updated_at->diffForHumans() }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            
                            {{--View, Edit, Delete Button--}}
                            <button wire:click="view({{ $task->id }})" class="bg-green-500 text-green px-2 py-1 rounded">View</button>
                            <button wire:click="edit({{ $task->id }})" class="bg-blue-500 text-blue px-2 py-1 rounded">Edit</button>
                            <button wire:click="delete({{ $task->id }})" class="bg-red-500 text-red px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center text-red-500 py-4">No tasks found.</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $tasks->links() }}
</div>

