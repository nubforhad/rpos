@extends('admin.layouts.app')

@section('content')

<div class="max-w-screen-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Users
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Manage rPos users and their company and branch access
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center justify-center
                  px-4 py-2.5
                  bg-indigo-600 text-white
                  rounded-lg
                  hover:bg-indigo-700
                  transition">

            + Add User

        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="mb-5 flex items-center gap-3
                    rounded-lg
                    bg-green-50
                    border border-green-200
                    px-4 py-3
                    text-green-700">

            <div class="w-8 h-8 rounded-full
                        bg-green-100
                        flex items-center justify-center">

                ✓

            </div>

            <p class="text-sm font-medium">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="mb-5 flex items-center gap-3
                    rounded-lg
                    bg-red-50
                    border border-red-200
                    px-4 py-3
                    text-red-700">

            <div class="w-8 h-8 rounded-full
                        bg-red-100
                        flex items-center justify-center">

                !

            </div>

            <p class="text-sm font-medium">
                {{ session('error') }}
            </p>

        </div>

    @endif


    {{-- Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">

        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Total Users
                    </p>

                    <p class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $users->total() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-indigo-50
                            text-indigo-600
                            flex items-center justify-center">

                    👤

                </div>

            </div>

        </div>


        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Assigned Companies
                    </p>

                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        {{ $users->getCollection()->whereNotNull('company_id')->count() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-blue-50
                            text-blue-600
                            flex items-center justify-center">

                    🏢

                </div>

            </div>

        </div>


        <div class="bg-white border border-gray-200
                    rounded-xl p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Assigned Branches
                    </p>

                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ $users->getCollection()->whereNotNull('branch_id')->count() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-green-50
                            text-green-600
                            flex items-center justify-center">

                    🏪

                </div>

            </div>

        </div>

    </div>


    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm
                border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            User
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Company
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Branch
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Created
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600 text-right">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($users as $user)

                        <tr class="hover:bg-gray-50 transition">

                            {{-- Number --}}
                            <td class="px-6 py-4 text-gray-500">
                                {{ $users->firstItem() + $loop->index }}
                            </td>


                            {{-- User --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full
                                                bg-indigo-100
                                                text-indigo-700
                                                flex items-center
                                                justify-center
                                                font-bold">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <div class="font-semibold text-gray-800">
                                            {{ $user->name }}
                                        </div>

                                        <div class="text-xs text-gray-500 mt-0.5">
                                            {{ $user->email }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- Company --}}
                            <td class="px-6 py-4">

                                @if($user->company)

                                    <div class="font-medium text-gray-800">
                                        {{ $user->company->name }}
                                    </div>

                                    <div class="text-xs text-gray-500">
                                        {{ $user->company->code }}
                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        All / Not Assigned
                                    </span>

                                @endif

                            </td>


                            {{-- Branch --}}
                            <td class="px-6 py-4">

                                @if($user->branch)

                                    <div class="font-medium text-gray-800">
                                        {{ $user->branch->name }}
                                    </div>

                                    <div class="text-xs text-gray-500">
                                        {{ $user->branch->code }}
                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        All / Not Assigned
                                    </span>

                                @endif

                            </td>


                            {{-- Created --}}
                            <td class="px-6 py-4 text-gray-600">

                                {{ $user->created_at?->format('d M Y') }}

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end items-center gap-2">

                                    <a href="{{ route('admin.users.show', $user) }}"
                                       class="px-3 py-1.5
                                              text-sm
                                              bg-gray-100
                                              text-gray-700
                                              rounded-lg
                                              hover:bg-gray-200">

                                        View

                                    </a>


                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="px-3 py-1.5
                                              text-sm
                                              bg-blue-100
                                              text-blue-700
                                              rounded-lg
                                              hover:bg-blue-200">

                                        Edit

                                    </a>


                                    <form action="{{ route('admin.users.destroy', $user) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this user?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5
                                                       text-sm
                                                       bg-red-100
                                                       text-red-700
                                                       rounded-lg
                                                       hover:bg-red-200">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-6 py-14 text-center">

                                <div class="text-4xl">
                                    👤
                                </div>

                                <h3 class="mt-4 text-lg
                                           font-semibold text-gray-700">

                                    No Users Found

                                </h3>

                                <p class="mt-1 text-sm text-gray-500">

                                    Create your first rPos user.

                                </p>

                                <a href="{{ route('admin.users.create') }}"
                                   class="inline-flex mt-4
                                          px-4 py-2.5
                                          bg-indigo-600
                                          text-white
                                          rounded-lg
                                          hover:bg-indigo-700">

                                    + Add User

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($users->hasPages())

            <div class="px-6 py-4 border-t border-gray-200">

                {{ $users->links() }}

            </div>

        @endif

    </div>

</div>

@endsection