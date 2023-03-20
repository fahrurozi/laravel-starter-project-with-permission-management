<?php

namespace App\Http\Livewire\Role;

use App\Services\Contracts\RoleServiceInterface;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{

    protected $listeners = [
        'roleCreated' => 'showNotification',
        'roleDeleted' => 'showDeleteNotification',
        'roleUpdated' => 'showUpdateNotification',
    ];


    public function render()
    {
        return view(
            'livewire..role.role-index',
            [
                'roles' => Role::get(),
            ]
        );
    }

    
    public function getRole($id, RoleServiceInterface $roleService)
    {
        $role = $roleService->getById($id);
        $this->emit('getRole', $role);
        $this->emit('openEditModal');
        
    }


    public function showNotification($role)
    {
        app('flasher')->addSuccess('Data Role ' . $role['name'] . ' Berhasil Ditambahkan.');
    }

    public function showDeleteNotification()
    {
        app('flasher')->addSuccess('Data Role Berhasil Dihapus.');
    }

    public function showUpdateNotification($role)
    {
        app('flasher')->addSuccess('Data Role ' . $role['name'] . ' Berhasil Diubah.');
    }
}
