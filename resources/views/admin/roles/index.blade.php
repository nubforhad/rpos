@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center
                            rounded-xl bg-indigo-100 text-indigo-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 15l2 2 4-4m4-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                    </svg>

                </div>

                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                        Roles
                    </h1>

                    <p class="text-sm text-gray-500 mt-0.5">
                        Manage user roles and permissions
                    </p>
                </div>

            </div>

            <a href="{{ route('admin.roles.create') }}"
               class="inline-flex items-center justify-center gap-2
                      w-full sm:w-auto
                      px-4 py-2.5
                      rounded-xl
                      bg-indigo-600
                      text-sm font-semibold
                      text-white
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

                Add Role

            </a>

        </div>
    </div>


    {{-- Alerts --}}
    @if(session('success'))

        <div class="mb-5 rounded-xl border border-green-200
                    bg-green-50 px-4 py-3 text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="mb-5 rounded-xl border border-red-200
                    bg-red-50 px-4 py-3 text-sm text-red-700">

            {{ session('error') }}

        </div>

    @endif


    {{-- Desktop Table --}}
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
                            Role
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Permissions
                        </th>

                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Created
                        </th>

                        <th class="px-6 py-4 text-right
                                   text-xs font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($roles as $role)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-800">
                                    {{ $role->name }}
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    Guard: {{ $role->guard_name }}
                                </div>

                            </td>

                            <td class="px-6 py-4">

                                <span class="inline-flex items-center
                                             rounded-full
                                             bg-indigo-50
                                             px-3 py-1
                                             text-xs font-semibold
                                             text-indigo-700">

                                    {{ $role->permissions_count }}
                                    permissions

                                </span>

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $role->created_at?->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('admin.roles.show', $role) }}"
                                       class="px-3 py-2 rounded-lg
                                              bg-gray-100
                                              text-xs font-medium
                                              text-gray-700
                                              hover:bg-gray-200">
                                        View
                                    </a>

                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                       class="px-3 py-2 rounded-lg
                                              bg-indigo-50
                                              text-xs font-medium
                                              text-indigo-700
                                              hover:bg-indigo-100">
                                        Edit
                                    </a>

                                    @if($role->name !== 'Admin')

                                        <form action="{{ route('admin.roles.destroy', $role) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this role?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-3 py-2 rounded-lg
                                                           bg-red-50
                                                           text-xs font-medium
                                                           text-red-700
                                                           hover:bg-red-100">
                                                Delete
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4"
                                class="px-6 py-12 text-center">

                                <p class="text-sm text-gray-500">
                                    No roles found.
                                </p>

                                <a href="{{ route('admin.roles.create') }}"
                                   class="inline-block mt-3
                                          text-sm font-medium
                                          text-indigo-600
                                          hover:text-indigo-700">
                                    Create your first role
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($roles->hasPages())

            <div class="border-t border-gray-200 px-5 py-4">
                {{ $roles->links() }}
            </div>

        @endif

    </div>


    {{-- Mobile Cards --}}
    <div class="md:hidden space-y-3">

        @forelse($roles as $role)

            <div class="rounded-2xl
                        border border-gray-200
                        bg-white
                        p-4
                        shadow-sm">

                <div class="flex items-start justify-between gap-3">

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            {{ $role->name }}
                        </h3>

                        <p class="mt-1 text-xs text-gray-400">
                            Guard: {{ $role->guard_name }}
                        </p>
                    </div>

                    <span class="rounded-full
                                 bg-indigo-50
                                 px-2.5 py-1
                                 text-xs font-semibold
                                 text-indigo-700">

                        {{ $role->permissions_count }}

                    </span>

                </div>


                <div class="mt-4 flex gap-2">

                    <a href="{{ route('admin.roles.show', $role) }}"
                       class="flex-1 rounded-lg
                              bg-gray-100
                              px-3 py-2
                              text-center
                              text-xs font-medium
                              text-gray-700">
                        View
                    </a>

                    <a href="{{ route('admin.roles.edit', $role) }}"
                       class="flex-1 rounded-lg
                              bg-indigo-50
                              px-3 py-2
                              text-center
                              text-xs font-medium
                              text-indigo-700">
                        Edit
                    </a>

                    @if($role->name !== 'Admin')

                        <form class="flex-1"
                              action="{{ route('admin.roles.destroy', $role) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this role?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="w-full rounded-lg
                                           bg-red-50
                                           px-3 py-2
                                           text-xs font-medium
                                           text-red-700">
                                Delete
                            </button>

                        </form>

                    @endif

                </div>

            </div>

        @empty

            <div class="rounded-2xl border border-gray-200
                        bg-white p-8 text-center">

                <p class="text-sm text-gray-500">
                    No roles found.
                </p>

            </div>

        @endforelse


        @if($roles->hasPages())

            <div class="pt-2">
                {{ $roles->links() }}
            </div>

        @endif

    </div>

</div>

@endsection