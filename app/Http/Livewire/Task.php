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
        $task_name = $this->task->name;
        $this->task->delete();
        $this->emitTo('alerts', 'alert', ['type' => 'danger', 'message' => 'Task "' . $task_name . '" was deleted']);
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
