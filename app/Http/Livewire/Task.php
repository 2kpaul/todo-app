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
        $this->task->status = ($this->task->completed == 1) ? 'done' : 'pending';
        $this->task->save();
        $this->emit('$refresh');
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
