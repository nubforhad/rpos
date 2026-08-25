@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-4">

            <div>

                <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                    {{ $role->name }}
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Role details and assigned permissions
                </p>

            </div>


            <div class="grid grid-cols-2 sm:flex gap-2">

                <a href="{{ route('admin.roles.edit', $role) }}"
                   class="inline-flex items-center justify-center
                          rounded-xl bg-indigo-600
                          px-4 py-2.5
                          text-sm font-semibold text-white
                          hover:bg-indigo-700">

                    Edit

                </a>

                <a href="{{ route('admin.roles.index') }}"
                   class="inline-flex items-center justify-center
                          rounded-xl border border-gray-300
                          bg-white
                          px-4 py-2.5
                          text-sm font-medium text-gray-700
                          hover:bg-gray-50">

                    Back

                </a>

            </div>

        </div>

    </div>


    {{-- Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

        <div class="rounded-2xl border border-indigo-100
                    bg-indigo-50 p-5">

            <p class="text-sm text-indigo-600">
                Role
            </p>

            <p class="mt-1 text-lg font-bold text-indigo-900">
                {{ $role->name }}
            </p>

        </div>


        <div class="rounded-2xl border border-emerald-100
                    bg-emerald-50 p-5">

            <p class="text-sm text-emerald-600">
                Permissions
            </p>

            <p class="mt-1 text-2xl font-bold text-emerald-900">
                {{ $role->permissions->count() }}
            </p>

        </div>


        <div class="rounded-2xl border border-blue-100
                    bg-blue-50 p-5">

            <p class="text-sm text-blue-600">
                Assigned Users
            </p>

            <p class="mt-1 text-2xl font-bold text-blue-900">
                {{ $usersCount }}
            </p>

        </div>

    </div>


    {{-- Permissions --}}
    <div class="overflow-hidden rounded-2xl
                border border-gray-200
                bg-white shadow-sm">

        <div class="border-b border-gray-200 p-5 sm:p-6">

            <h2 class="text-lg font-semibold text-gray-800">
                Assigned Permissions
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Permissions currently assigned to this role.
            </p>

        </div>


        <div class="p-5 sm:p-6">

            @if($role->permissions->count())

                <div class="grid grid-cols-1
                            sm:grid-cols-2
                            lg:grid-cols-3
                            gap-3">

                    @foreach($role->permissions->sortBy('name') as $permission)

                        <div class="flex items-center gap-2
                                    rounded-xl
                                    border border-gray-200
                                    bg-gray-50
                                    px-4 py-3">

                            <div class="h-2 w-2 rounded-full bg-indigo-500"></div>

                            <span class="text-sm text-gray-700">
                                {{ $permission->name }}
                            </span>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="py-10 text-center">

                    <p class="text-sm text-gray-500">
                        No permissions assigned to this role.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection