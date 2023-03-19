<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $phone;

    public $isOpen = 0;

    protected $listeners = [
        'openModal' => 'showModal',
        'closeModal' => 'hideModal',
    ];
    public function render()
    {
        return view('livewire.user.user-create');
    }
    public function showModal()
    {
        logger('Method showModal dipanggil!');
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        User::create($validatedData);

        session()->flash('message', 'Data Berhasil Ditambahkan.');

        $this->hideModal();
    }
}
