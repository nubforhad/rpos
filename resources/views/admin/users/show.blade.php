@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row
                sm:items-center
                sm:justify-between
                gap-4 mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                User Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View user and access information
            </p>

        </div>

        <div class="flex flex-wrap gap-2">

            <a href="{{ route('admin.users.index') }}"
               class="px-4 py-2.5
                      bg-gray-100
                      text-gray-700
                      rounded-lg
                      hover:bg-gray-200">

                ← Back

            </a>

            <a href="{{ route('admin.users.edit', $user) }}"
               class="px-4 py-2.5
                      bg-indigo-600
                      text-white
                      rounded-lg
                      hover:bg-indigo-700">

                Edit User

            </a>

        </div>

    </div>


    {{-- User Profile --}}
    <div class="bg-white rounded-xl
                shadow-sm
                border border-gray-200
                overflow-hidden">


        {{-- Profile Header --}}
        <div class="p-6 sm:p-8">

            <div class="flex flex-col sm:flex-row
                        items-start sm:items-center gap-5">

                <div class="w-24 h-24
                            rounded-full
                            bg-indigo-100
                            text-indigo-700
                            flex items-center
                            justify-center
                            text-3xl
                            font-bold
                            shrink-0">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ $user->name }}
                    </h2>

                    <p class="text-gray-500 mt-1">
                        {{ $user->email }}
                    </p>

                    <div class="mt-3">

                        @if($user->email_verified_at)

                            <span class="inline-flex items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-green-100
                                         text-green-700">

                                ✓ Verified

                            </span>

                        @else

                            <span class="inline-flex items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-yellow-100
                                         text-yellow-700">

                                Unverified

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Information --}}
        <div class="border-t border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-2">


                {{-- Company --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Company

                    </p>

                    @if($user->company)

                        <p class="mt-2 text-lg
                                  font-semibold text-gray-800">

                            {{ $user->company->name }}

                        </p>

                        <p class="text-sm text-gray-500 mt-1">

                            Code:
                            {{ $user->company->code }}

                        </p>

                    @else

                        <p class="mt-2 text-gray-500">
                            Not assigned
                        </p>

                    @endif

                </div>


                {{-- Branch --}}
                <div class="p-6 border-b border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Branch

                    </p>

                    @if($user->branch)

                        <p class="mt-2 text-lg
                                  font-semibold text-gray-800">

                            {{ $user->branch->name }}

                        </p>

                        <p class="text-sm text-gray-500 mt-1">

                            Code:
                            {{ $user->branch->code }}

                        </p>

                    @else

                        <p class="mt-2 text-gray-500">
                            Not assigned
                        </p>

                    @endif

                </div>


                {{-- Email --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Email

                    </p>

                    <a href="mailto:{{ $user->email }}"
                       class="mt-2 block
                              text-indigo-600
                              font-medium
                              break-all">

                        {{ $user->email }}

                    </a>

                </div>


                {{-- Created --}}
                <div class="p-6 border-b border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Created At

                    </p>

                    <p class="mt-2 text-gray-800 font-medium">

                        {{ $user->created_at?->format('d M Y, h:i A') }}

                    </p>

                </div>


                {{-- Updated --}}
                <div class="p-6 md:border-r border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Last Updated

                    </p>

                    <p class="mt-2 text-gray-800 font-medium">

                        {{ $user->updated_at?->format('d M Y, h:i A') }}

                    </p>

                </div>


                {{-- User ID --}}
                <div class="p-6">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        User ID

                    </p>

                    <p class="mt-2 text-gray-800 font-bold">

                        #{{ $user->id }}

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Access Summary --}}
    <div class="mt-6
                bg-white
                rounded-xl
                shadow-sm
                border border-gray-200">

        <div class="p-6">

            <h3 class="text-lg font-semibold text-gray-800">
                Access Scope
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                This determines where the user can work in rPos.
            </p>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-5">

                <div class="rounded-xl
                            border border-blue-200
                            bg-blue-50
                            p-5">

                    <p class="text-xs uppercase
                              tracking-wide
                              text-blue-500
                              font-semibold">

                        Company Access

                    </p>

                    <p class="mt-2 text-lg
                              font-bold text-blue-800">

                        {{ $user->company?->name ?? 'All / Not Assigned' }}

                    </p>

                </div>


                <div class="rounded-xl
                            border border-green-200
                            bg-green-50
                            p-5">

                    <p class="text-xs uppercase
                              tracking-wide
                              text-green-600
                              font-semibold">

                        Branch Access

                    </p>

                    <p class="mt-2 text-lg
                              font-bold text-green-800">

                        {{ $user->branch?->name ?? 'All / Not Assigned' }}

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Danger Zone --}}
    <div class="mt-6
                bg-white
                rounded-xl
                shadow-sm
                border border-red-200">

        <div class="p-6">

            <h3 class="text-lg font-semibold text-red-700">
                Danger Zone
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Delete this user permanently.
            </p>

            <form action="{{ route('admin.users.destroy', $user) }}"
                  method="POST"
                  class="mt-4"
                  onsubmit="return confirm('Are you sure you want to delete this user?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="px-4 py-2.5
                               bg-red-600
                               text-white
                               rounded-lg
                               hover:bg-red-700">

                    Delete User

                </button>

            </form>

        </div>

    </div>

</div>

@endsection