<?php

namespace App\Http\Livewire\Role;

use App\Models\Role as ModelsRole;
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
        // $role = $roleService->delete($roleId);
        $role = ModelsRole::find($roleId);
        if($role->delete()){
            $this->emit('roleDeleted');
        }
    }
}
