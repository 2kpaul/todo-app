<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TaskList extends Component
{

    public $list;

    protected $listeners = ['refreshList' => '$refresh'];


    public function render()
    {
        return view('livewire.task-list');
    }
}
