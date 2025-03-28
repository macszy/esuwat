
<x-app-layout>
    <x-slot name="header">
        <div class="max-w-10xl mx-10 px-4 sm:px-6 lg:px-8 flex items-left justify-start ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notes Management') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('task-manager')
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('task-list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
