<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


const ROOT_ROLE_PAGES = 'dashboard.authorization.role.';
class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return $this->__view('index');
    }

    public function show($id)
    {
        $data = [
            'role' => $this->roleService->getById($id),
        ];
        return $this->__view('show', $data);
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
