<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UserCreate extends Component
{

    protected $userService;

    public $name, $email, $password, $password_confirmation;


    public $isOpen = 0;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    protected $listeners = [
        'openCreateModal' => 'showModal',
        'closeModal' => 'hideModal',
    ];

    public function mount(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function render()
    {
        return view('livewire.user.user-create');
    }
    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->resetValidation();
    }

    public function store(UserServiceInterface $userService)
    {
        $validatedData = $this->validate();

        $user = $userService->create($validatedData);

        $this->hideModal();
        $this->emit('userCreated', $user);
    }
}
