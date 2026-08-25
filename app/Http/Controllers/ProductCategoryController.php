<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {  abort(401);  }
        $query = ProductCategory::with([
            'company',
            'branch',
        ])->withCount('products')->latest();

        if ($user->company_id) {
            $query->where('company_id', $user->company_id);
        }
        if ($user->branch_id) {
            $query->where('branch_id', $user->branch_id);
        }
        $categories = $query->paginate(15);
        return view(  'admin.product-categories.index', compact('categories'));
    }


    public function create()
    {
        $user = auth()->user();

        $companies = Company::query()
            ->when(
                $user->company_id,
                fn ($query) =>
                    $query->where('id', $user->company_id)
            )
            ->orderBy('name')
            ->get();

        $branches = Branch::query()
            ->when(
                $user->company_id,
                fn ($query) =>
                    $query->where('company_id', $user->company_id)
            )
            ->when(
                $user->branch_id,
                fn ($query) =>
                    $query->where('id', $user->branch_id)
            )
            ->orderBy('name')
            ->get();

        return view(
            'admin.product-categories.create',
            compact(
                'companies',
                'branches'
            )
        );
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'company_id' => [
                'nullable',
                'exists:companies,id',
            ],

            'branch_id' => [
                'nullable',
                'exists:branches,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Branch User Scope
        |--------------------------------------------------------------------------
        */

        if ($user->company_id) {
            $validated['company_id'] = $user->company_id;
        }

        if ($user->branch_id) {
            $validated['branch_id'] = $user->branch_id;
        }


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = Str::slug(
            $validated['name']
        );


        /*
        |--------------------------------------------------------------------------
        | Duplicate Check
        |--------------------------------------------------------------------------
        */

        $exists = ProductCategory::where(
            'branch_id',
            $validated['branch_id'] ?? null
        )
        ->where(
            'slug',
            $validated['slug']
        )
        ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                        'This category already exists in this branch.',
                ]);
        }


        ProductCategory::create($validated);


        return redirect()
            ->route('admin.product-categories.index')
            ->with(
                'success',
                'Product category created successfully.'
            );
    }


    public function show(ProductCategory $productCategory)
    {
        $this->checkScope($productCategory);

        $productCategory->load([
            'company',
            'branch',
            'products',
        ]);

        return view(
            'admin.product-categories.show',
            compact('productCategory')
        );
    }


    public function edit(ProductCategory $productCategory)
    {
        $this->checkScope($productCategory);

        $user = auth()->user();

        $companies = Company::query()
            ->when(
                $user->company_id,
                fn ($query) =>
                    $query->where('id', $user->company_id)
            )
            ->orderBy('name')
            ->get();

        $branches = Branch::query()
            ->when(
                $user->company_id,
                fn ($query) =>
                    $query->where('company_id', $user->company_id)
            )
            ->when(
                $user->branch_id,
                fn ($query) =>
                    $query->where('id', $user->branch_id)
            )
            ->orderBy('name')
            ->get();

        return view(
            'admin.product-categories.edit',
            compact(
                'productCategory',
                'companies',
                'branches'
            )
        );
    }


    public function update(
        Request $request,
        ProductCategory $productCategory
    ) {
        $this->checkScope($productCategory);

        $user = auth()->user();

        $validated = $request->validate([
            'company_id' => [
                'nullable',
                'exists:companies,id',
            ],

            'branch_id' => [
                'nullable',
                'exists:branches,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'boolean',
            ],
        ]);


        if ($user->company_id) {
            $validated['company_id'] = $user->company_id;
        }

        if ($user->branch_id) {
            $validated['branch_id'] = $user->branch_id;
        }


        $validated['slug'] = Str::slug(
            $validated['name']
        );


        $exists = ProductCategory::where(
            'branch_id',
            $validated['branch_id'] ?? null
        )
        ->where(
            'slug',
            $validated['slug']
        )
        ->where(
            'id',
            '!=',
            $productCategory->id
        )
        ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                        'This category already exists in this branch.',
                ]);
        }


        $productCategory->update($validated);


        return redirect()
            ->route(
                'admin.product-categories.index'
            )
            ->with(
                'success',
                'Product category updated successfully.'
            );
    }


    public function destroy(
        ProductCategory $productCategory
    ) {
        $this->checkScope($productCategory);

        if ($productCategory->products()->exists()) {
            return redirect()
                ->route(
                    'admin.product-categories.index'
                )
                ->with(
                    'error',
                    'This category cannot be deleted because products are assigned to it.'
                );
        }

        $productCategory->delete();

        return redirect()
            ->route(
                'admin.product-categories.index'
            )
            ->with(
                'success',
                'Product category deleted successfully.'
            );
    }


    private function checkScope(
        ProductCategory $productCategory
    ): void {
        $user = auth()->user();

        if (
            $user->company_id &&
            $productCategory->company_id != $user->company_id
        ) {
            abort(403);
        }

        if (
            $user->branch_id &&
            $productCategory->branch_id != $user->branch_id
        ) {
            abort(403);
        }
    }
}