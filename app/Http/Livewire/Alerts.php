<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alerts extends Component
{
    public $alert;

    protected $listeners = ['alert'];

    public function alert($data)
    {
        $this->alert = $data;
    }

    public function render()
    {
        return view('livewire.alerts');
    }
}
