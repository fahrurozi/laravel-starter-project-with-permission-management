<?php

namespace App\Http\Livewire\User;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class UserShow extends Component
{
    public $user;

    protected $listeners = [
        'roleAssigned' => 'render',
    ];

    public function render()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $data = [
            'user' => $this->user,
            'roles' => $roles,
            'permissions' => $permissions,
        ];
        return view('livewire.user.user-show', $data);
    }
}
