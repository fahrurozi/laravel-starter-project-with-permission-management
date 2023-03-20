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

    protected $rules = [
        'role' => 'required',
    ];

    protected $listeners = [
        'assignRole' => 'assignRole',
        'roleAssigned' => 'showNotification',
    ];

    public function mount()
    {
        $this->role = '';
    }

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
        $validatedData = $this->validate();
        if($this->user->hasRole($validatedData['role'])){
            app('flasher')->addWarning('Role ' . $this->role. ' Sudah Diberikan.');
            return;
        }
        $this->user->assignRole($validatedData);
        $this->emit('roleAssigned');
    }

    public function showNotification(){
        app('flasher')->addSuccess('Role ' . $this->role. ' Berhasil Diberikan.');
    }
}
