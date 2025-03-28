<div>
    <input type="text" wire:model="search" placeholder="Search tasks..." class="w-full p-2 border rounded-md">
    
    @if($search)
        <ul class="mt-2 bg-white shadow-md rounded-md p-2">
            @forelse($tasks as $task)
                <li class="p-2 border-b">{{ $task->title }}</li>
            @empty
                <li class="p-2 text-gray-500">No tasks found.</li>
            @endforelse
        </ul>
    @endif
</div>
