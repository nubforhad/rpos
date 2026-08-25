<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index()
    {
        $roles = Role::withCount('permissions')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admin.roles.create', compact('permissions'));
    }


    /**
     * Store a newly created role.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:roles,name',
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        if (!empty($validated['permissions'])) {
            $permissions = Permission::whereIn(
                'id',
                $validated['permissions']
            )->get();

            $role->syncPermissions($permissions);
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role created successfully.');
    }


    /**
     * Display the specified role.
     */
    public function show(Role $role)
    {
        $role->load('permissions');

        $usersCount = $role->users()->count();

        return view(
            'admin.roles.show',
            compact('role', 'usersCount')
        );
    }


    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();

        $role->load('permissions');

        $assignedPermissions = $role->permissions
            ->pluck('id')
            ->toArray();

        return view(
            'admin.roles.edit',
            compact(
                'role',
                'permissions',
                'assignedPermissions'
            )
        );
    }


    /**
     * Update the specified role.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:roles,name,' . $role->id,
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $role->update([
            'name' => $validated['name'],
        ]);

        if (!empty($validated['permissions'])) {

            $permissions = Permission::whereIn(
                'id',
                $validated['permissions']
            )->get();

            $role->syncPermissions($permissions);

        } else {

            $role->syncPermissions([]);

        }

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }


    /**
     * Remove the specified role.
     */
    public function destroy(Role $role)
    {
        if ($role->name === 'Admin') {
            return redirect()
                ->route('admin.roles.index')
                ->with('error', 'The Admin role cannot be deleted.');
        }

        if ($role->users()->exists()) {
            return redirect()
                ->route('admin.roles.index')
                ->with(
                    'error',
                    'This role cannot be deleted because users are assigned to it.'
                );
        }

        $role->delete();

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role deleted successfully.');
    }
}