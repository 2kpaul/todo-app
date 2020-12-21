<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskList as TaskList;


class TaskLists extends Component
{
    public $lists;

    protected $listeners = ['refreshLists' => '$refresh'];

    public function mount()
    {
        $this->lists = TaskList::with('tasks')->latest()->get();
    }

    public function render()
    {
        $this->mount();
        return view('livewire.task-lists');
    }
}
