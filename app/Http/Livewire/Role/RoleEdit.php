<?php

namespace App\Http\Livewire\Role;

use App\Services\Contracts\RoleServiceInterface;
use Livewire\Component;

class RoleEdit extends Component
{

    public $roleId, $name;
    public $isDataReady = false;

    protected $listeners = [
        'getRole' => 'showRole',
        'closeModal' => 'resetInputFields',
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:255']
    ];


    public function render()
    {
        return view('livewire..role.role-edit');
    }

    public function showRole($role){
        $this->roleId = $role['id'];
        $this->name = $role['name'];
        $this->isDataReady = true;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->isDataReady = false;
        $this->resetValidation();
    }

    public function update(RoleServiceInterface $roleService)
    {
        $this->validate();

        $role = $roleService->update($this->roleId, ["name"=>$this->name]);

        $this->emit('roleUpdated', $role);
    }
}
