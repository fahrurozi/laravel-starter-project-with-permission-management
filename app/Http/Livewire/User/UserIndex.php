<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Livewire\Component;

class UserIndex extends Component
{

    protected $listeners = [
        'userCreated' => 'showNotification',
        'itemDeleted' => 'showDeleteNotification',
        'userUpdated' => 'showUpdateNotification',
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

    public function getUser($id, UserServiceInterface $userService)
    {
        $user = $userService->getById($id);
        $this->emit('getUser', $user);
        $this->emit('openEditModal');
        
    }

    public function showNotification($user)
    {
        app('flasher')->addSuccess('Data User ' . $user['name'] . ' Berhasil Ditambahkan.');
    }

    public function showDeleteNotification()
    {
        app('flasher')->addSuccess('Data User Berhasil Dihapus.');
    }

    public function showUpdateNotification($user)
    {
        app('flasher')->addSuccess('Data User ' . $user['name'] . ' Berhasil Diubah.');
    }
}
