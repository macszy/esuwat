
    <!-- <x-slot name="header">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notes Management') }}
            </h2>
        </div>
    </x-slot> -->

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
                @if (session()->has('message'))
                    <p style="color: green;">{{ session('message') }}</p>
                @endif

                <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="space-y-4">
                    
                    <!--Task Title-->
                    <div>
                        <input type="text" wire:model="title" placeholder="Notes Title" required
                            class="w=full border rounded-md p-2">
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    
                    <br>
                    <!--Task description-->
                    <div>
                        <textarea wire:model="description" placeholder="Note Description"
                            class="w-full border rounded-md p2"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <br>
                    <!--Created Date-->
                    @if($task && $task->exists)
                        <div>
                            <label class="block text-gray-700">--Created At:</label>
                            <p class="text-gray-500">{{ $task->created_at ? $task->created_at->format('Y-m-d H:i') : 'Not Available'}}</p>
                        </div>
                    @endif
                    <br>

                    <br>
                    <!--Updated Date-->
                    @if($task && $task->exists)
                        <div>
                            <label class="block text-gray-700">Last Updated:</label>
                            <p class="text-gray-500">{{ $task->updated_at ? $task->updated_at->diffForHumans() : 'Not available'}}</p>
                        </div>
                    @endif
                    <br>

                    <!--Buttons-->
                    <div class="flex space-x-4"></div>
                        <button wire:click="store" class="bg-blue-500 text-black px-4 py-2 rounded-md dark:bg-blue-500">Add Notes</button>
                        @if($updateMode)
                            <button type="button" wire:click="resetFields" class="bg-gray-500 text-black px-4 py-2 rounded-md">Cancel</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
        
