<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;
use App\Models\Task;

class TaskForm extends Component
{
    public $lists, $list, $task, $description;


    protected $rules = [
        'list' => 'required',
        'task' => 'required|min:3'
    ];

    public function mount()
    {
        $this->lists = TaskList::latest()->get();
    }

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
        return view('livewire.task-form');
    }
}
