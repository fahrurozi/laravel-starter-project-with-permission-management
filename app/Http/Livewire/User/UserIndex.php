<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    protected $listeners = [
        'userCreated' => 'showNotification',
        'itemDeleted' => 'showDeleteNotification',
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
        app('flasher')->addSuccess('Data User '.$user['name'].' Berhasil Ditambahkan.');
    }

    public function showDeleteNotification()
    {
        app('flasher')->addSuccess('Data User Berhasil Dihapus.');
    }


}
