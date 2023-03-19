<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Livewire\Component;

class UserEdit extends Component
{

    public $userId, $name, $email, $password, $password_confirmation;
    public $isDataReady = false;

    protected $listeners = [
        'getUser' => 'showUser',
        'closeModal' => 'resetInputFields',
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['confirmed'],
    ];


    public function render()
    {
        return view('livewire..user.user-edit');
    }

    public function showUser($user)
    {
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->isDataReady = true;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->isDataReady = false;
        $this->resetValidation();
    }

    public function update(UserServiceInterface $userService)
    {
        $this->validate();

        if ($this->password == null || $this->password == '') {
            $user = $userService->update($this->userId, ["name"=>$this->name, "email"=>$this->email]);
        } else {
            $user = $userService->update($this->userId, ["name"=>$this->name, "email"=>$this->email, "password"=>$this->password]);
        }

        $this->emit('userUpdated', $user);
    }
}
