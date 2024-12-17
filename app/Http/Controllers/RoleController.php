<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admins.roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::all();
        return view('admins.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('roleName');
        $role->save();
        $role->syncPermissions($request->input('permission_id') ?? []);

        return redirect()->route('role.index');
    }

    public function show($id)
    {
    }

    public function edit(Role $role)
    {
        if (auth()->user()->getRoleNames()[0] == $role->name || $role->name == "super-admin") {
            return redirect()->route('role.index')->with('error', 'این عمیلیات برای شما امکان پذیر نیست.');
        }
        $permission = Permission::all();
        return view('admins.roles.edit', compact('role', 'permission'));
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->input('roleName');
        $role->save();
        $role->syncPermissions($request->input('permission_id') ?? []);

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        if (auth()->user()->getRoleNames()[0] == $role->name || $role->name == "super-admin") {
            return redirect()->route('role.index')->with('error', 'این عمیلیات برای شما امکان پذیر نیست.');
        }
        $role->delete();
        $role->permissions()->detach();
        return redirect()->route('role.index');
    }
}
