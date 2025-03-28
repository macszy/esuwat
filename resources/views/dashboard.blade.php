<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notes Lists') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg p-6">

                {{--Livewire Task List Component--}}
                <!-- @livewire('task-list') -->
                
                {{-- Floating Add Task Button --}}
                <a href="{{ route('task.manager') }}"style="display:block !important;" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full fixed bottom-10 right-10 z-50">
                    +
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
