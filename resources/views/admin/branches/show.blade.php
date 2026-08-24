@extends('admin.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Branch Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View complete branch information
            </p>
        </div>

        <div class="flex flex-wrap gap-2">

            <a href="{{ route('admin.branches.index') }}"
               class="inline-flex items-center px-4 py-2.5
                      bg-gray-100 text-gray-700
                      rounded-lg hover:bg-gray-200 transition">

                ← Back

            </a>

            <a href="{{ route('admin.branches.edit', $branch) }}"
               class="inline-flex items-center px-4 py-2.5
                      bg-indigo-600 text-white
                      rounded-lg hover:bg-indigo-700 transition">

                Edit Branch

            </a>

        </div>

    </div>


    {{-- Main Branch Card --}}
    <div class="bg-white rounded-xl shadow-sm
                border border-gray-200 overflow-hidden">

        {{-- Branch Header --}}
        <div class="p-6 sm:p-8">

            <div class="flex flex-col sm:flex-row
                        sm:items-center gap-5">

                {{-- Branch Icon --}}
                <div class="w-24 h-24 sm:w-28 sm:h-28
                            rounded-2xl
                            bg-indigo-50
                            text-indigo-600
                            flex items-center justify-center
                            text-4xl
                            shrink-0">

                    🏢

                </div>


                {{-- Branch Name --}}
                <div class="flex-1">

                    <div class="flex flex-wrap
                                items-center gap-3">

                        <h2 class="text-2xl sm:text-3xl
                                   font-bold text-gray-800">

                            {{ $branch->name }}

                        </h2>


                        {{-- Status --}}
                        @if($branch->status)

                            <span class="inline-flex items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-green-100
                                         text-green-700">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-green-500 mr-2">
                                </span>

                                Active

                            </span>

                        @else

                            <span class="inline-flex items-center
                                         px-3 py-1
                                         rounded-full
                                         text-xs font-semibold
                                         bg-red-100
                                         text-red-700">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-red-500 mr-2">
                                </span>

                                Inactive

                            </span>

                        @endif

                    </div>


                    {{-- Branch Code --}}
                    <div class="mt-2">

                        <span class="text-sm text-gray-500">
                            Branch Code:
                        </span>

                        <span class="text-sm font-semibold
                                     text-gray-800">

                            {{ $branch->code }}

                        </span>

                    </div>


                    {{-- Company --}}
                    <div class="mt-1">

                        <span class="text-sm text-gray-500">
                            Company:
                        </span>

                        @if($branch->company)

                            <span class="text-sm font-semibold
                                         text-indigo-600">

                                {{ $branch->company->name }}

                            </span>

                        @else

                            <span class="text-sm font-semibold
                                         text-red-600">

                                Company Deleted

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Information Grid --}}
        <div class="border-t border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-2">


                {{-- Phone --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <div class="flex items-start gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-blue-50
                                    text-blue-600
                                    flex items-center justify-center">

                            ☎

                        </div>

                        <div>

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-gray-400">

                                Phone

                            </p>

                            <p class="mt-1 text-gray-800 font-medium">

                                {{ $branch->phone ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Email --}}
                <div class="p-6 border-b border-gray-200">

                    <div class="flex items-start gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-purple-50
                                    text-purple-600
                                    flex items-center justify-center">

                            @

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-gray-400">

                                Email

                            </p>

                            @if($branch->email)

                                <a href="mailto:{{ $branch->email }}"
                                   class="mt-1 block
                                          text-indigo-600
                                          font-medium
                                          break-all
                                          hover:text-indigo-700">

                                    {{ $branch->email }}

                                </a>

                            @else

                                <p class="mt-1 text-gray-800 font-medium">
                                    Not provided
                                </p>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Opening Balance --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <div class="flex items-start gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-green-50
                                    text-green-600
                                    flex items-center justify-center">

                            ৳

                        </div>

                        <div>

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-gray-400">

                                Opening Balance

                            </p>

                            <p class="mt-1 text-xl
                                      font-bold text-gray-800">

                                ৳ {{ number_format($branch->opening_balance, 2) }}

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Company --}}
                <div class="p-6 border-b border-gray-200">

                    <div class="flex items-start gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-indigo-50
                                    text-indigo-600
                                    flex items-center justify-center">

                            🏢

                        </div>

                        <div>

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-gray-400">

                                Company

                            </p>

                            @if($branch->company)

                                <p class="mt-1 text-gray-800
                                          font-semibold">

                                    {{ $branch->company->name }}

                                </p>

                                <p class="text-xs text-gray-500 mt-0.5">

                                    Code:
                                    {{ $branch->company->code }}

                                </p>

                            @else

                                <p class="mt-1 text-red-600 font-medium">

                                    Company Deleted

                                </p>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Address --}}
                <div class="p-6 md:col-span-2
                            border-b border-gray-200">

                    <div class="flex items-start gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-orange-50
                                    text-orange-600
                                    flex items-center justify-center">

                            📍

                        </div>

                        <div>

                            <p class="text-xs font-semibold
                                      uppercase tracking-wide
                                      text-gray-400">

                                Address

                            </p>

                            <p class="mt-1 text-gray-800
                                      font-medium
                                      whitespace-pre-line">

                                {{ $branch->address ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Created --}}
                <div class="p-6
                            border-b md:border-b-0
                            md:border-r
                            border-gray-200">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Created At

                    </p>

                    <p class="mt-2 text-gray-800 font-medium">

                        {{ $branch->created_at?->format('d M Y, h:i A') }}

                    </p>

                </div>


                {{-- Updated --}}
                <div class="p-6">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                        Last Updated

                    </p>

                    <p class="mt-2 text-gray-800 font-medium">

                        {{ $branch->updated_at?->format('d M Y, h:i A') }}

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Company Information --}}
    @if($branch->company)

        <div class="mt-6 bg-white
                    rounded-xl shadow-sm
                    border border-gray-200">

            <div class="p-6">

                <div class="flex flex-col sm:flex-row
                            sm:items-center
                            sm:justify-between gap-4">

                    <div>

                        <p class="text-xs font-semibold
                                  uppercase tracking-wide
                                  text-gray-400">

                            Parent Company

                        </p>

                        <h3 class="text-xl font-bold
                                   text-gray-800 mt-1">

                            {{ $branch->company->name }}

                        </h3>

                        <p class="text-sm text-gray-500 mt-1">

                            Company Code:
                            <span class="font-medium text-gray-700">

                                {{ $branch->company->code }}

                            </span>

                        </p>

                    </div>


                    <a href="{{ route('admin.companies.show', $branch->company) }}"
                       class="inline-flex items-center
                              justify-center
                              px-4 py-2.5
                              bg-indigo-50
                              text-indigo-700
                              rounded-lg
                              hover:bg-indigo-100">

                        View Company

                    </a>

                </div>

            </div>

        </div>

    @endif


    {{-- Danger Zone --}}
    <div class="mt-6 bg-white
                rounded-xl shadow-sm
                border border-red-200">

        <div class="p-6">

            <h3 class="text-lg font-semibold text-red-700">
                Danger Zone
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Deleting this branch may affect its related POS records.
            </p>

            <form
                action="{{ route('admin.branches.destroy', $branch) }}"
                method="POST"
                class="mt-4"
                onsubmit="return confirm('Are you sure you want to delete this branch? This action cannot be undone.')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-4 py-2.5
                           bg-red-600
                           text-white
                           rounded-lg
                           hover:bg-red-700
                           transition"
                >

                    Delete Branch

                </button>

            </form>

        </div>

    </div>

</div>

@endsection