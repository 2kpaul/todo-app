<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList;

class TaskListForm extends Component
{
    public $list;

    protected $rules = [
        'list' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        TaskList::create([
            'name' => $this->list,
        ]);

        session()->flash('message', 'List "' . $this->list . '" was created');
        $this->resetInputFields();
        $this->emit('hideCreateList');
        $this->emit('refreshList');
    }

    public function resetInputFields()
    {
        $this->list = '';
    }

    public function render()
    {
        return view('livewire.task-list-form');
    }
}
