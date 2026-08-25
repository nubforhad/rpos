@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between
                    gap-4">

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-xl bg-indigo-100 text-indigo-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"/>

                    </svg>

                </div>

                <div>

                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                        Product Categories
                    </h1>

                    <p class="mt-1 text-sm text-gray-500">
                        Manage your product categories
                    </p>

                </div>

            </div>


            <a href="{{ route('admin.product-categories.create') }}"
               class="inline-flex items-center justify-center gap-2
                      w-full sm:w-auto
                      rounded-xl bg-indigo-600
                      px-4 py-2.5
                      text-sm font-semibold text-white
                      shadow-sm
                      hover:bg-indigo-700
                      transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 4v16m8-8H4"/>

                </svg>

                Add Category

            </a>

        </div>

    </div>


    {{-- Alerts --}}
    @if(session('success'))

        <div class="mb-5 rounded-xl
                    border border-green-200
                    bg-green-50
                    px-4 py-3
                    text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="mb-5 rounded-xl
                    border border-red-200
                    bg-red-50
                    px-4 py-3
                    text-sm text-red-700">

            {{ session('error') }}

        </div>

    @endif


    {{-- Desktop --}}
    <div class="hidden md:block overflow-hidden
                rounded-2xl border border-gray-200
                bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Company
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Branch
                        </th>

                        <th class="px-6 py-4 text-center
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Products
                        </th>

                        <th class="px-6 py-4 text-center
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($categories as $category)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-800">
                                    {{ $category->name }}
                                </div>

                                <div class="mt-1 text-xs text-gray-400">
                                    {{ $category->slug }}
                                </div>

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $category->company?->name ?? '—' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $category->branch?->name ?? '—' }}

                            </td>


                            <td class="px-6 py-4 text-center">

                                <span class="inline-flex rounded-full
                                             bg-blue-50
                                             px-3 py-1
                                             text-xs font-semibold
                                             text-blue-700">

                                    {{ $category->products_count ?? $category->products()->count() }}

                                </span>

                            </td>


                            <td class="px-6 py-4 text-center">

                                @if($category->status)

                                    <span class="inline-flex rounded-full
                                                 bg-green-50
                                                 px-3 py-1
                                                 text-xs font-semibold
                                                 text-green-700">

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex rounded-full
                                                 bg-red-50
                                                 px-3 py-1
                                                 text-xs font-semibold
                                                 text-red-700">

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route(
                                        'admin.product-categories.show',
                                        $category
                                    ) }}"
                                       class="rounded-lg
                                              bg-gray-100
                                              px-3 py-2
                                              text-xs font-medium
                                              text-gray-700
                                              hover:bg-gray-200">

                                        View

                                    </a>


                                    <a href="{{ route(
                                        'admin.product-categories.edit',
                                        $category
                                    ) }}"
                                       class="rounded-lg
                                              bg-indigo-50
                                              px-3 py-2
                                              text-xs font-medium
                                              text-indigo-700
                                              hover:bg-indigo-100">

                                        Edit

                                    </a>


                                    <form method="POST"
                                          action="{{ route(
                                              'admin.product-categories.destroy',
                                              $category
                                          ) }}"
                                          onsubmit="return confirm(
                                              'Are you sure you want to delete this category?'
                                          );">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg
                                                       bg-red-50
                                                       px-3 py-2
                                                       text-xs font-medium
                                                       text-red-700
                                                       hover:bg-red-100">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-6 py-12 text-center">

                                <p class="text-sm text-gray-500">
                                    No product categories found.
                                </p>

                                <a href="{{ route(
                                    'admin.product-categories.create'
                                ) }}"
                                   class="mt-3 inline-block
                                          text-sm font-medium
                                          text-indigo-600">

                                    Create your first category

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($categories->hasPages())

            <div class="border-t border-gray-200 px-5 py-4">
                {{ $categories->links() }}
            </div>

        @endif

    </div>


    {{-- Mobile --}}
    <div class="md:hidden space-y-3">

        @forelse($categories as $category)

            <div class="rounded-2xl
                        border border-gray-200
                        bg-white p-4 shadow-sm">

                <div class="flex items-start
                            justify-between gap-3">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            {{ $category->name }}
                        </h3>

                        <p class="mt-1 text-xs text-gray-400">
                            {{ $category->slug }}
                        </p>

                    </div>


                    @if($category->status)

                        <span class="rounded-full
                                     bg-green-50
                                     px-2.5 py-1
                                     text-xs font-semibold
                                     text-green-700">

                            Active

                        </span>

                    @else

                        <span class="rounded-full
                                     bg-red-50
                                     px-2.5 py-1
                                     text-xs font-semibold
                                     text-red-700">

                            Inactive

                        </span>

                    @endif

                </div>


                <div class="mt-4 grid grid-cols-2 gap-3">

                    <div class="rounded-xl bg-gray-50 p-3">

                        <p class="text-xs text-gray-400">
                            Company
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-700">
                            {{ $category->company?->name ?? '—' }}
                        </p>

                    </div>


                    <div class="rounded-xl bg-gray-50 p-3">

                        <p class="text-xs text-gray-400">
                            Branch
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-700">
                            {{ $category->branch?->name ?? '—' }}
                        </p>

                    </div>

                </div>


                <div class="mt-4 flex gap-2">

                    <a href="{{ route(
                        'admin.product-categories.show',
                        $category
                    ) }}"
                       class="flex-1 rounded-lg
                              bg-gray-100
                              px-3 py-2
                              text-center text-xs
                              font-medium text-gray-700">

                        View

                    </a>


                    <a href="{{ route(
                        'admin.product-categories.edit',
                        $category
                    ) }}"
                       class="flex-1 rounded-lg
                              bg-indigo-50
                              px-3 py-2
                              text-center text-xs
                              font-medium text-indigo-700">

                        Edit

                    </a>

                </div>

            </div>

        @empty

            <div class="rounded-2xl
                        border border-gray-200
                        bg-white p-8 text-center">

                <p class="text-sm text-gray-500">
                    No product categories found.
                </p>

            </div>

        @endforelse


        @if($categories->hasPages())

            <div class="pt-2">
                {{ $categories->links() }}
            </div>

        @endif

    </div>

</div>

@endsection