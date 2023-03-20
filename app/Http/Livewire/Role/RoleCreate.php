<?php

namespace App\Http\Livewire\Role;

use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Livewire\Component;

class RoleCreate extends Component
{
    public $name;
    public $isOpen = 0;

    protected $listeners = [
        'openCreateModal' => 'showModal',
        'closeModal' => 'hideModal',
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:255']
    ];

    public function render()
    {
        return view('livewire..role.role-create');
    }

    public function showModal()
    {
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
        $this->resetValidation();
    }

    public function store(RoleServiceInterface $roleService)
    {
        $validatedData = $this->validate();

        $role = $roleService->create($validatedData);

        $this->hideModal();
        $this->emit('roleCreated', $role);
    }
}
