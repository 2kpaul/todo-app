<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList as TaskList;


class TaskLists extends Component
{
    public $lists;

    protected $listeners = ['refreshList' => '$refresh'];

    public function render()
    {
        $this->lists = TaskList::with('tasks')->latest()->get();
        return view('livewire.task-lists');
    }
}
