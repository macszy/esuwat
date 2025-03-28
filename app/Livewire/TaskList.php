<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]

class TaskList extends Component
{
    use WithPagination;

    // public $selectedTaskId;

    protected $paginationTheme = "tailwind";

    public function view($id)
    {
        $this->selectedTaskId = $id;
        $this->dispatch('openViewModal');
    }
    public function edit($id)
    {
        $this->selectedTaskId = $id;
        $this->dispatch('openEditModal');
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => Task::where('user_id', Auth::id())->paginate(5),
        ]);
    }
}

