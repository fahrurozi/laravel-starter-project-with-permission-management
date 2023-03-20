<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


const ROOT_ROLE_PAGES = 'dashboard.authorization.role.';
class RoleController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->__view('index');
    }


    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_ROLE_PAGES . $view, $data);
        } else {
            return view(ROOT_ROLE_PAGES . $view);
        }
    }
}
