<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskSearch extends Component
{
    public $search = '';

    public function render()
    {
        $tasks = Task::where('title', 'like', '%' . $this->search . '%')->get();

        return view('livewire.task-search', [
            'tasks' => $tasks,
        ]);
    }
}

