<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $users = User::with([
            'company',
            'branch',
            'roles',
        ])
            ->latest()
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        $roles = Role::where('guard_name', 'web')
            ->orderBy('name')
            ->get();

        return view('admin.users.create', compact(
            'companies',
            'branches',
            'roles'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'company_id' => [
                'nullable',
                'exists:companies,id',
            ],

            'branch_id' => [
                'nullable',
                'exists:branches,id',
            ],

            'role' => [
                'required',
                'exists:roles,name',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Branch must belong to selected company
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['branch_id']) &&
            !empty($validated['company_id'])
        ) {

            $branchBelongsToCompany = Branch::where('id', $validated['branch_id'])
                ->where('company_id', $validated['company_id'])
                ->exists();

            if (!$branchBelongsToCompany) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'branch_id' =>
                            'Selected branch does not belong to the selected company.',
                    ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Password
        |--------------------------------------------------------------------------
        */

        $validated['password'] = Hash::make(
            $validated['password']
        );


        /*
        |--------------------------------------------------------------------------
        | Store Role Separately
        |--------------------------------------------------------------------------
        */

        $role = $validated['role'];

        unset($validated['role']);


        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */

        $user = User::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Assign Role
        |--------------------------------------------------------------------------
        */

        $user->assignRole($role);


        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        $user->load([
            'company',
            'branch',
            'roles',
        ]);

        return view('admin.users.show', compact('user'));
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(User $user)
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        $roles = Role::where('guard_name', 'web')
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Current Role
        |--------------------------------------------------------------------------
        */

        $currentRole = $user->roles->first()?->name;


        return view('admin.users.edit', compact(
            'user',
            'companies',
            'branches',
            'roles',
            'currentRole'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'company_id' => [
                'nullable',
                'exists:companies,id',
            ],

            'branch_id' => [
                'nullable',
                'exists:branches,id',
            ],

            'role' => [
                'required',
                'exists:roles,name',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Branch must belong to selected company
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['branch_id']) &&
            !empty($validated['company_id'])
        ) {

            $branchBelongsToCompany = Branch::where('id', $validated['branch_id'])
                ->where('company_id', $validated['company_id'])
                ->exists();

            if (!$branchBelongsToCompany) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'branch_id' =>
                            'Selected branch does not belong to the selected company.',
                    ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Password
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['password'])) {

            $validated['password'] = Hash::make(
                $validated['password']
            );

        } else {

            unset($validated['password']);

        }


        /*
        |--------------------------------------------------------------------------
        | Store Role Separately
        |--------------------------------------------------------------------------
        */

        $role = $validated['role'];

        unset($validated['role']);


        /*
        |--------------------------------------------------------------------------
        | Update User
        |--------------------------------------------------------------------------
        */

        $user->update($validated);


        /*
        |--------------------------------------------------------------------------
        | Sync Role
        |--------------------------------------------------------------------------
        |
        | Old role will be removed and selected role will be assigned.
        |
        */

        $user->syncRoles([$role]);


        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}