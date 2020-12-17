<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;
use App\Models\Task;

class TaskForm extends Component
{
    public $lists, $list, $task, $description;

    protected $listeners = ['refreshList' => '$refresh'];


    protected $rules = [
        'list' => 'required',
        'task' => 'required|min:3'
    ];

    public function submit()
    {
        $this->validate();

        Task::create([
            'task_list_id' => $this->list,
            'name' => $this->task,
            'body' => $this->description
        ]);

        session()->flash('message', 'Task "' . $this->task . '" was created');
        $this->resetInputFields();
        $this->emit('hideCreateTask');
        $this->emit('refreshList');
    }

    public function resetInputFields()
    {
        $this->list = '';
        $this->task = '';
        $this->description = '';
    }

    public function render()
    {
        $this->lists = TaskList::latest()->get();
        return view('livewire.task-form');
    }
}
