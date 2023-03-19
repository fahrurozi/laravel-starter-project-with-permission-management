<?php

namespace App\Http\Livewire\User;

use App\Models\User;
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

    public function destroyItem($userId)
    {
        $user = User::find($userId);
        $user->delete();

        $this->emit('itemDeleted');
    }
}
