<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with([
            'company',
            'branch',
        ])
            ->latest()
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.users.create', compact(
            'companies',
            'branches'
        ));
    }

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


        $validated['password'] = Hash::make(
            $validated['password']
        );

        User::create($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load([
            'company',
            'branch',
        ]);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.users.edit', compact(
            'user',
            'companies',
            'branches'
        ));
    }

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


        $user->update($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Prevent deleting currently logged-in user
        |--------------------------------------------------------------------------
        */

        if (auth()->id() === $user->id) {

            return back()
                ->with('error', 'You cannot delete your own account.');

        }


        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}