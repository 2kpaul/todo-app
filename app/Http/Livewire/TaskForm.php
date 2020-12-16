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
    public $description;


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

        $this->emit("refreshList");
        $this->list = '';
        $this->task = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
