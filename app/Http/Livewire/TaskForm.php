<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;
use App\Models\Task;

class TaskForm extends Component
{
    public $lists, $list, $task, $description, $task_id;
    public $update = false;

    protected $listeners = ['refreshList' => '$refresh', 'toggleTaskModal' => 'toggleTaskModal'];


    protected $rules = [
        'list' => 'required',
        'task' => 'required|min:3'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
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

    public function update()
    {
        $this->validate();

        $task = Task::find($this->task_id);
        $task->task_list_id = $this->list;
        $task->name = $this->task;
        $task->body = $this->description;
        $task->save();
        $this->resetInputFields();
        $this->emit('hideCreateTask');
        $this->emit('refreshList');
    }

    public function toggleTaskModal(Task $task)
    {
        if ($task->id) {
            $this->update = true;
            $this->task_id = $task->id;
            $this->list = $task->task_list_id;
            $this->task = $task->name;
            $this->description = $task->body;
        } else {
            $this->resetInputFields();
        }
    }

    public function resetInputFields()
    {
        $this->update = false;
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
