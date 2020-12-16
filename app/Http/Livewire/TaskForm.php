<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;
use App\Models\Task;

class TaskForm extends Component
{
    public $lists;
    public $list;
    public $task;


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
            'body' => $this->task
        ]);

        $this->emit("refreshList");
        $this->list = '';
        $this->task = '';
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
