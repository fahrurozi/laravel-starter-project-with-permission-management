<?php

namespace App\Http\Livewire\User\UserRole;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleIndex extends Component
{
    public $user, $role;

    protected $listeners = [
        'assignRole' => 'assignRole',
        'roleAssigned' => 'showNotification',
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

        debug($data);
        return view('livewire.user.user-role.user-role-index', $data);
    }

    public function assignRole()
    {
        $this->user->assignRole($this->role);
        $this->emit('roleAssigned');
    }

    public function showNotification(){
        app('flasher')->addSuccess('Role ' . $this->role. ' Berhasil Diberikan.');
    }
}
