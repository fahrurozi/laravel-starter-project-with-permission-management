<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Livewire\Component;

class UserDelete extends Component
{

    public $userId;

    protected $listeners = [
        'deleteItemConfirmed' => 'destroyItem',
    ];

    public function render()
    {
        return view('livewire.user.user-delete');
    }

    public function destroyItem($userId, UserServiceInterface $userService)
    {
        $user = $userService->delete($userId);

        $this->emit('itemDeleted');
    }
}
