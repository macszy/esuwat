<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]

class TaskManager extends Component
{
    use WithPagination;

    protected $paginationTheme = "tailwind";

    public $tasks, $title, $description, $create_at, $updated_at;
    public $updateMode = false;

    protected $rules = [
        'title' => 'required|string|min:3',
        'description' => 'nullable|min:5',
];

    public $task;
    public function mount($task = null)
    {
        $this->task = $task ?? new Task();
    }
    // Create Task
    public function store()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        $this->resetFields();
        session()->flash('message', 'Task Created Successfully.');

        // $this->emit('taskAdded');
    }

    // Edit Task
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->taskId = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->updateMode = true;
    }

    // Update Task
    public function update()
    {
        $this->validate();
        $task = Task::findOrFail($this->taskId);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetFields();
        session()->flash('message', 'Task Updated Successfully.');
        $this->updateMode = false;
    }

    // Delete Task
    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }

    // Reset Form Fields
    private function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->taskId = null;
        $this->updateMode = false;
    }

    public function render()
    {
        return view('livewire.task-manager', [
            'tasks'=> Task::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
}
