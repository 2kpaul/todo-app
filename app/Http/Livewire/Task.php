<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as Todo;

class Task extends Component
{

    public $task;


    public function getListeners()
    {
        return ['refreshTask' . $this->task->id => '$refresh'];
    }


    public function complete()
    {
        $this->task->completed = !$this->task->completed;
        $this->task->status = ($this->task->completed == 1) ? 'done' : 'pending';
        $this->task->save();
        $this->emitUp('refreshTask' . $this->task->id);
    }

    public function delete()
    {
        $list_id = $this->task->task_list_id;
        $this->task->delete();
        $this->emitUp('refreshList' . $list_id);
    }

    public function mount()
    {
        $this->task = Todo::find($this->task->id);
    }

    public function render()
    {
        $this->mount();
        return view('livewire.task');
    }
}
