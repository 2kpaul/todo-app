<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList as TaskLists;

class TaskList extends Component
{

    public $lists;

    protected $listeners = ['refreshList' => 'mount'];

    public function mount()
    {
        $this->lists = TaskLists::with('tasks')->latest()->get();
    }


    public function render()
    {
        return view('livewire.task-list');
    }
}
