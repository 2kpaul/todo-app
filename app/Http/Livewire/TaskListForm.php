<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;

class TaskListForm extends Component
{
    public $list, $list_id;
    public $update = false;

    protected $listeners = ['toggleListModal' => 'toggleListModal'];

    protected $rules = [
        'list' => 'required',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->validate();

        TaskList::create([
            'name' => $this->list,
        ]);

        $this->emitTo('alerts', 'alert', ['type' => 'success', 'message' => 'List "' . $this->list . '" was created']);
        $this->resetInputFields();
        $this->emit('hideCreateList');
        $this->emit('refreshFormList');
        $this->emit('refreshLists');
    }

    public function update()
    {
        $this->validate();

        $list = TaskList::find($this->list_id);
        $list->name = $this->list;
        $list->save();
        $this->emitTo('alerts', 'alert', ['type' => 'info', 'message' => 'List "' . $list->name . '" was updated']);
        $this->resetInputFields();
        $this->emit('hideCreateList');
        $this->emit('refreshList' . $list->id);
    }

    public function toggleListModal(TaskList $list)
    {
        if ($list->id) {
            $this->update = true;
            $this->list_id = $list->id;
            $this->list = $list->name;
        } else {
            $this->resetInputFields();
        }
    }

    public function resetInputFields()
    {
        $this->list = '';
        $this->update = false;
        $this->list_id = '';
    }

    public function render()
    {
        return view('livewire.task-list-form');
    }
}
