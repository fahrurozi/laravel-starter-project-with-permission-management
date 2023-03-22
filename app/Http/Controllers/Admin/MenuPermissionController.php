<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuPermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class MenuPermissionController extends Controller
{
    //
    public function index()
    {
        $menuPermissions = MenuPermission::all();

        return view('menu_permissions.index', compact('menuPermissions'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('menu_permissions.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|unique:menu_permissions|max:255',
            'permission_name' => 'required',
        ]);

        $menuPermission = MenuPermission::create([
            'menu_name' => $request->input('menu_name'),
            'permission_name' => $request->input('permission_name'),
        ]);

        $permission = Permission::findByName($menuPermission->permission_name);
        $permission->menu = $menuPermission->menu_name;
        $permission->save();

        return redirect()->route('menu_permissions.index')
            ->with('success', 'Menu Permission created successfully');
    }

    public function edit(MenuPermission $menuPermission)
    {
        $permissions = Permission::all();

        return view('menu_permissions.edit', compact('menuPermission', 'permissions'));
    }

    public function update(Request $request, MenuPermission $menuPermission)
    {
        $request->validate([
            'menu_name' => 'required|max:255|unique:menu_permissions,menu_name,' . $menuPermission->id,
            'permission_name' => 'required',
        ]);

        $menuPermission->update([
            'menu_name' => $request->input('menu_name'),
            'permission_name' => $request->input('permission_name'),
        ]);

        $permission = Permission::findByName($menuPermission->permission_name);
        $permission->menu = $menuPermission->menu_name;
        $permission->save();

        return redirect()->route('menu_permissions.index')
            ->with('success', 'Menu Permission updated successfully');
    }

    public function destroy(MenuPermission $menuPermission)
    {
        $menuPermission->delete();

        return redirect()->route('menu_permissions.index')
            ->with('success', 'Menu Permission deleted successfully');
    }
}
