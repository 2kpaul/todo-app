<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList as TodoList;

class TaskList extends Component
{

    public $list;


    public function getListeners()
    {
        return ['refreshList' . $this->list->id => '$refresh'];
    }

    public function mount()
    {
        $this->list = TodoList::find($this->list->id);
    }

    public function render()
    {
        $this->mount();
        return view('livewire.task-list');
    }
}
