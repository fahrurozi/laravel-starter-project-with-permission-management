<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        return view(
            'livewire.user.user-index',
            [
                'users' => User::latest()->get(),
            ]
        );
    }
}
