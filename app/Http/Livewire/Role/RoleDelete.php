<?php

namespace App\Http\Livewire\Role;

use App\Services\Contracts\RoleServiceInterface;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleDelete extends Component
{
    public $userId;

    protected $listeners = [
        'deleteItemConfirmed' => 'destroyItem',
    ];

    public function render()
    {
        return view('livewire.role.role-delete');
    }

    public function destroyItem($roleId, RoleServiceInterface $roleService)
    {
        $role = $roleService->delete($roleId);

        $this->emit('roleDeleted');
    }
}
