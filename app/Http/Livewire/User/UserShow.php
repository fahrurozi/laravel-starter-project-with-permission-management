<?php

namespace App\Http\Livewire\User;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class UserShow extends Component
{
    public $user, $userRole;

    protected $listeners = [
        'roleAssigned' => 'render',
        'deleteItemConfirmed' => 'destroyItem',
        'itemDeleted' => 'showNotification',
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

    public function destroyItem(Role $userRole)
    {
        $this->userRole = $userRole;
        if (!$this->user->hasRole($userRole)) {

            $this->emit('itemDeleted', 'F');
            return;
        }
        $this->user->removeRole($userRole);

        $this->emit('itemDeleted', 'T');
    }

    public function showNotification($status)
    {
        if ($status == 'T') {
            app('flasher')->addSuccess('Role ' . $this->userRole->name . ' Berhasil di cabut.');
        } else {
            app('flasher')->addWarning('User' . $this->user->name . " tidak memiliki role" . $this->userRole->name);
        }
    }
}
