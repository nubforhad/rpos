<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::with('company')
            ->latest()
            ->paginate(10);

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.branches.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => [
                'required',
                'integer',
                'exists:companies,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'opening_balance' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $codeExists = Branch::where('company_id', $validated['company_id'])
            ->where('code', $validated['code'])
            ->exists();

        if ($codeExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'code' => 'This branch code already exists for the selected company.',
                ]);
        }

        $validated['opening_balance'] = $validated['opening_balance'] ?? 0;
        $validated['status'] = $request->boolean('status');

        Branch::create($validated);

        return redirect()
            ->route('admin.branches.index')
            ->with('success', 'Branch created successfully.');
    }

    public function show(Branch $branch)
    {
        $branch->load('company');

        return view('admin.branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.branches.edit', compact(
            'branch',
            'companies'
        ));
    }

    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'company_id' => [
                'required',
                'integer',
                'exists:companies,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'opening_balance' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $codeExists = Branch::where('company_id', $validated['company_id'])
            ->where('code', $validated['code'])
            ->where('id', '!=', $branch->id)
            ->exists();

        if ($codeExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'code' => 'This branch code already exists for the selected company.',
                ]);
        }

        $validated['opening_balance'] = $validated['opening_balance'] ?? 0;
        $validated['status'] = $request->boolean('status');

        $branch->update($validated);

        return redirect()
            ->route('admin.branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()
            ->route('admin.branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}