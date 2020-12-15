<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as Todo;

class Task extends Component
{

    public $task;


    public function complete()
    {
        $this->task->completed = !$this->task->completed;
        $this->task->save();
    }

    public function delete(Todo $task)
    {
        $this->task->delete();
        $this->emitUp('refreshList');
    }

    public function render()
    {
        return view('livewire.task');
    }
}
