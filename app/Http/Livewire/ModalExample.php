<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalExample extends Component
{

    public $inputs = [];

    public function render()
    {
        return view('livewire.modal-example');
    }

    public function openModal()
    {
        $this->emit('openModal');
    }

    public function submit()
    {
        // Handle form submission here
    }
}
