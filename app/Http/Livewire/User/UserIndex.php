<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    protected $listeners = [
        'userCreated' => 'showNotification',
    ];

    public function render()
    {
        return view(
            'livewire.user.user-index',
            [
                'users' => User::latest()->get(),
            ]
        );
    }

    public function showNotification($user)
    {
        session()->flash('message', 'Data User '.$user['name'].' Berhasil Ditambahkan.');
    }
}
