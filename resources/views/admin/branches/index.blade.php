@extends('admin.layouts.app')

@section('content')

<div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Branches
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Manage company branches
            </p>
        </div>

        <a href="{{ route('admin.branches.create') }}"
           class="inline-flex items-center justify-center
                  px-4 py-2.5
                  bg-indigo-600 text-white
                  rounded-lg
                  hover:bg-indigo-700
                  transition">

            + Add Branch

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="mb-5 flex items-center gap-3
                    rounded-lg
                    bg-green-50
                    border border-green-200
                    px-4 py-3
                    text-green-700">

            <div class="w-8 h-8 rounded-full
                        bg-green-100
                        flex items-center justify-center
                        shrink-0">

                ✓

            </div>

            <p class="text-sm font-medium">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div class="mb-5 flex items-center gap-3
                    rounded-lg
                    bg-red-50
                    border border-red-200
                    px-4 py-3
                    text-red-700">

            <div class="w-8 h-8 rounded-full
                        bg-red-100
                        flex items-center justify-center
                        shrink-0">

                !

            </div>

            <p class="text-sm font-medium">
                {{ session('error') }}
            </p>

        </div>

    @endif


    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">

        {{-- Total --}}
        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Total Branches
                    </p>

                    <p class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $branches->total() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-indigo-50
                            text-indigo-600
                            flex items-center justify-center">

                    🏢

                </div>

            </div>

        </div>


        {{-- Active --}}
        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Active Branches
                    </p>

                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ \App\Models\Branch::where('status', true)->count() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-green-50
                            text-green-600
                            flex items-center justify-center">

                    ✓

                </div>

            </div>

        </div>


        {{-- Inactive --}}
        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Inactive Branches
                    </p>

                    <p class="text-2xl font-bold text-red-600 mt-1">
                        {{ \App\Models\Branch::where('status', false)->count() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-red-50
                            text-red-600
                            flex items-center justify-center">

                    ×

                </div>

            </div>

        </div>

    </div>


    {{-- Table --}}
    <div class="bg-white
                rounded-xl
                shadow-sm
                border border-gray-200
                overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            #
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Branch
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Company
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Code
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Phone
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Opening Balance
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600">
                            Status
                        </th>

                        <th class="px-6 py-4
                                   font-semibold text-gray-600
                                   text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($branches as $branch)

                        <tr class="hover:bg-gray-50 transition">

                            {{-- Number --}}
                            <td class="px-6 py-4 text-gray-500">

                                {{ $branches->firstItem() + $loop->index }}

                            </td>


                            {{-- Branch --}}
                            <td class="px-6 py-4">

                                <div>

                                    <div class="font-semibold text-gray-800">
                                        {{ $branch->name }}
                                    </div>

                                    <div class="text-xs text-gray-500 mt-0.5">
                                        {{ $branch->email ?? 'No email' }}
                                    </div>

                                </div>

                            </td>


                            {{-- Company --}}
                            <td class="px-6 py-4">

                                @if($branch->company)

                                    <span class="font-medium text-gray-700">
                                        {{ $branch->company->name }}
                                    </span>

                                @else

                                    <span class="text-red-500">
                                        Company Deleted
                                    </span>

                                @endif

                            </td>


                            {{-- Code --}}
                            <td class="px-6 py-4">

                                <span class="inline-flex
                                             px-2.5 py-1
                                             rounded-md
                                             bg-gray-100
                                             text-gray-700
                                             text-xs
                                             font-semibold">

                                    {{ $branch->code }}

                                </span>

                            </td>


                            {{-- Phone --}}
                            <td class="px-6 py-4 text-gray-600">

                                {{ $branch->phone ?? '—' }}

                            </td>


                            {{-- Opening Balance --}}
                            <td class="px-6 py-4">

                                <span class="font-semibold text-gray-800">

                                    {{ number_format($branch->opening_balance, 2) }}

                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($branch->status)

                                    <span class="inline-flex items-center
                                                 gap-1.5
                                                 px-2.5 py-1
                                                 rounded-full
                                                 text-xs
                                                 font-medium
                                                 bg-green-100
                                                 text-green-700">

                                        <span class="w-1.5 h-1.5
                                                     rounded-full
                                                     bg-green-500">
                                        </span>

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex items-center
                                                 gap-1.5
                                                 px-2.5 py-1
                                                 rounded-full
                                                 text-xs
                                                 font-medium
                                                 bg-red-100
                                                 text-red-700">

                                        <span class="w-1.5 h-1.5
                                                     rounded-full
                                                     bg-red-500">
                                        </span>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end
                                            items-center gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('admin.branches.show', $branch) }}"
                                       class="px-3 py-1.5
                                              text-sm
                                              bg-gray-100
                                              text-gray-700
                                              rounded-lg
                                              hover:bg-gray-200
                                              transition">

                                        View

                                    </a>


                                    {{-- Edit --}}
                                    <a href="{{ route('admin.branches.edit', $branch) }}"
                                       class="px-3 py-1.5
                                              text-sm
                                              bg-blue-100
                                              text-blue-700
                                              rounded-lg
                                              hover:bg-blue-200
                                              transition">

                                        Edit

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('admin.branches.destroy', $branch) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this branch?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-1.5
                                                   text-sm
                                                   bg-red-100
                                                   text-red-700
                                                   rounded-lg
                                                   hover:bg-red-200
                                                   transition">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="px-6 py-14 text-center">

                                <div class="flex flex-col
                                            items-center
                                            justify-center">

                                    <div class="w-16 h-16
                                                rounded-full
                                                bg-gray-100
                                                flex items-center
                                                justify-center
                                                text-3xl">

                                        🏢

                                    </div>

                                    <h3 class="mt-4
                                               text-lg
                                               font-semibold
                                               text-gray-700">

                                        No Branches Found

                                    </h3>

                                    <p class="mt-1
                                              text-sm
                                              text-gray-500">

                                        Start by creating your first branch.

                                    </p>

                                    <a
                                        href="{{ route('admin.branches.create') }}"
                                        class="mt-4
                                               inline-flex
                                               items-center
                                               px-4 py-2.5
                                               bg-indigo-600
                                               text-white
                                               rounded-lg
                                               hover:bg-indigo-700">

                                        + Add Branch

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($branches->hasPages())

            <div class="px-6 py-4
                        border-t border-gray-200">

                {{ $branches->links() }}

            </div>

        @endif

    </div>

</div>

@endsection