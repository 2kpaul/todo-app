<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;
use App\Models\Task;

class TaskForm extends Component
{
    public $lists, $list, $task, $description, $task_id;
    public $update = false;

    protected $listeners = ['refreshTaskFormList' => '$refresh', 'toggleTaskModal' => 'toggleTaskModal'];


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

        $task = Task::create([
            'task_list_id' => $this->list,
            'name' => $this->task,
            'body' => $this->description
        ]);

        $this->emitTo('alerts', 'alert', ['type' => 'success', 'message' => 'Task "' . $this->task . '" was created']);
        $this->emit('hideCreateTask');
        $this->emit('refreshList' . $task->task_list_id);
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate();

        $task = Task::find($this->task_id);
        $current_list_id = $task->task_list_id;
        $task->task_list_id = $this->list;
        $task->name = $this->task;
        $task->body = $this->description;
        $task->save();
        $this->emitTo('alerts', 'alert', ['type' => 'info', 'message' => 'Task "' . $task->name . '" was updated']);
        $this->resetInputFields();
        $this->emit('hideCreateTask');
        $this->emit('refreshTask' . $task->id);
        $this->emit('refreshList' . $task->task_list_id);
        if ($current_list_id != $task->task_list_id) {
            $this->emit('refreshList' . $current_list_id);
        }
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
        $this->task_id = '';
    }


    public function mount()
    {
        $this->lists = TaskList::latest()->get();
    }

    public function render()
    {
        $this->mount();
        return view('livewire.task-form');
    }
}
