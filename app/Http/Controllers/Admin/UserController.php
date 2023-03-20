<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

const ROOT_USER_PAGES = 'dashboard.authorization.user.';
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        $data = [
            'users' => $users,
        ];

        return $this->__view('index', $data);
    }

    public function show($id)
    {
        $user = $this->userService->getById($id);

        $data = [
            'user' => $user
        ];

        return $this->__view('show', $data);
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_USER_PAGES . $view, $data);
        } else {
            return view(ROOT_USER_PAGES . $view);
        }
    }
}
