@extends('admin.layouts.app')

@section('title', 'Branches | rPos')

@section('page-title', 'Branches')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">


    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col lg:flex-row
                lg:items-center
                lg:justify-between
                gap-4 mb-6">

        <div class="min-w-0">

            {{-- Breadcrumb --}}

            <div class="flex items-center
                        gap-2
                        mb-1
                        text-xs sm:text-sm">

                <span class="text-gray-400">
                    Master Data
                </span>

                <span class="text-gray-300">
                    /
                </span>

                <span class="text-gray-600">
                    Branches
                </span>

            </div>


            <h1 class="text-xl sm:text-2xl
                       font-bold
                       text-gray-800">

                Branches

            </h1>

            <p class="text-sm
                      text-gray-500
                      mt-1">

                Manage your company branches.

            </p>

        </div>


        {{-- Add Button --}}

        <a href="{{ route('admin.branches.create') }}"
           class="w-full sm:w-auto
                  inline-flex
                  items-center
                  justify-center
                  gap-2
                  px-4 py-2.5
                  bg-indigo-600
                  text-white
                  rounded-lg
                  text-sm
                  font-semibold
                  hover:bg-indigo-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-indigo-500
                  focus:ring-offset-2
                  transition">

            <span class="text-lg leading-none">
                +
            </span>

            Add Branch

        </a>

    </div>



    {{-- =========================================================
         FLASH MESSAGES
    ========================================================== --}}

    @if(session('success'))

        <div class="mb-5
                    flex items-start
                    gap-3
                    rounded-xl
                    bg-green-50
                    border border-green-200
                    px-4 py-3">

            <div class="w-8 h-8
                        rounded-lg
                        bg-green-100
                        text-green-600
                        flex items-center
                        justify-center
                        shrink-0
                        font-bold">

                ✓

            </div>

            <div class="min-w-0">

                <p class="text-sm
                          font-semibold
                          text-green-800">

                    Success

                </p>

                <p class="text-sm
                          text-green-700
                          mt-0.5">

                    {{ session('success') }}

                </p>

            </div>

        </div>

    @endif


    @if(session('error'))

        <div class="mb-5
                    flex items-start
                    gap-3
                    rounded-xl
                    bg-red-50
                    border border-red-200
                    px-4 py-3">

            <div class="w-8 h-8
                        rounded-lg
                        bg-red-100
                        text-red-600
                        flex items-center
                        justify-center
                        shrink-0
                        font-bold">

                !

            </div>

            <div class="min-w-0">

                <p class="text-sm
                          font-semibold
                          text-red-800">

                    Error

                </p>

                <p class="text-sm
                          text-red-700
                          mt-0.5">

                    {{ session('error') }}

                </p>

            </div>

        </div>

    @endif



    {{-- =========================================================
         SUMMARY CARDS
    ========================================================== --}}

    <div class="grid grid-cols-1
                sm:grid-cols-2
                xl:grid-cols-3
                gap-4 mb-6">


        {{-- Total --}}

        <div class="bg-white
                    border border-gray-200
                    rounded-xl
                    shadow-sm
                    p-5
                    hover:shadow-md
                    transition">

            <div class="flex items-center
                        justify-between
                        gap-4">

                <div>

                    <p class="text-sm
                              text-gray-500">

                        Total Branches

                    </p>

                    <p class="text-2xl
                              sm:text-3xl
                              font-bold
                              text-gray-800
                              mt-1">

                        {{ $branches->total() }}

                    </p>

                    <p class="text-xs
                              text-gray-400
                              mt-1">

                        All registered branches

                    </p>

                </div>


                <div class="w-11 h-11
                            rounded-xl
                            bg-indigo-50
                            text-indigo-600
                            flex items-center
                            justify-center
                            shrink-0">

                    🏢

                </div>

            </div>

        </div>



        {{-- Active --}}

        <div class="bg-white
                    border border-gray-200
                    rounded-xl
                    shadow-sm
                    p-5
                    hover:shadow-md
                    transition">

            <div class="flex items-center
                        justify-between
                        gap-4">

                <div>

                    <p class="text-sm
                              text-gray-500">

                        Active Branches

                    </p>

                    <p class="text-2xl
                              sm:text-3xl
                              font-bold
                              text-green-600
                              mt-1">

                        {{ \App\Models\Branch::where('status', true)->count() }}

                    </p>

                    <p class="text-xs
                              text-gray-400
                              mt-1">

                        Currently active

                    </p>

                </div>


                <div class="w-11 h-11
                            rounded-xl
                            bg-green-50
                            text-green-600
                            flex items-center
                            justify-center
                            shrink-0
                            text-lg">

                    ✓

                </div>

            </div>

        </div>



        {{-- Inactive --}}

        <div class="bg-white
                    border border-gray-200
                    rounded-xl
                    shadow-sm
                    p-5
                    hover:shadow-md
                    transition">

            <div class="flex items-center
                        justify-between
                        gap-4">

                <div>

                    <p class="text-sm
                              text-gray-500">

                        Inactive Branches

                    </p>

                    <p class="text-2xl
                              sm:text-3xl
                              font-bold
                              text-red-600
                              mt-1">

                        {{ \App\Models\Branch::where('status', false)->count() }}

                    </p>

                    <p class="text-xs
                              text-gray-400
                              mt-1">

                        Currently inactive

                    </p>

                </div>


                <div class="w-11 h-11
                            rounded-xl
                            bg-red-50
                            text-red-600
                            flex items-center
                            justify-center
                            shrink-0
                            text-lg">

                    ×

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         BRANCH TABLE
    ========================================================== --}}

    <div class="bg-white
                rounded-xl
                shadow-sm
                border border-gray-200
                overflow-hidden">


        {{-- Table Header --}}

        <div class="px-5 sm:px-6
                    py-4
                    border-b
                    border-gray-200
                    flex flex-col
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-2">

            <div>

                <h2 class="text-base
                           sm:text-lg
                           font-semibold
                           text-gray-800">

                    Branch List

                </h2>

                <p class="text-xs sm:text-sm
                          text-gray-500
                          mt-0.5">

                    All branches registered in rPos.

                </p>

            </div>


            <div class="text-xs
                        text-gray-500">

                Showing
                <span class="font-semibold text-gray-700">
                    {{ $branches->firstItem() ?? 0 }}
                </span>

                -
                <span class="font-semibold text-gray-700">
                    {{ $branches->lastItem() ?? 0 }}
                </span>

                of
                <span class="font-semibold text-gray-700">
                    {{ $branches->total() }}
                </span>

            </div>

        </div>



        {{-- =====================================================
             DESKTOP TABLE
        ====================================================== --}}

        <div class="hidden md:block overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50
                              border-b
                              border-gray-200">

                    <tr>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            #

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Branch

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Company

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Code

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Phone

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Opening Balance

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   whitespace-nowrap">

                            Status

                        </th>

                        <th class="px-5 lg:px-6
                                   py-4
                                   font-semibold
                                   text-gray-600
                                   text-right
                                   whitespace-nowrap">

                            Action

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y
                             divide-gray-100">

                    @forelse($branches as $branch)

                        <tr class="hover:bg-gray-50
                                   transition">


                            {{-- Number --}}

                            <td class="px-5 lg:px-6
                                       py-4
                                       text-gray-500">

                                {{ $branches->firstItem() + $loop->index }}

                            </td>



                            {{-- Branch --}}

                            <td class="px-5 lg:px-6
                                       py-4">

                                <div class="min-w-40">

                                    <p class="font-semibold
                                              text-gray-800">

                                        {{ $branch->name }}

                                    </p>

                                    <p class="text-xs
                                              text-gray-500
                                              mt-0.5
                                              break-all">

                                        {{ $branch->email ?? 'No email' }}

                                    </p>

                                </div>

                            </td>



                            {{-- Company --}}

                            <td class="px-5 lg:px-6
                                       py-4">

                                @if($branch->company)

                                    <span class="font-medium
                                                 text-gray-700">

                                        {{ $branch->company->name }}

                                    </span>

                                @else

                                    <span class="inline-flex
                                                 px-2.5 py-1
                                                 rounded-md
                                                 bg-red-50
                                                 border
                                                 border-red-100
                                                 text-red-600
                                                 text-xs
                                                 font-medium">

                                        Company Deleted

                                    </span>

                                @endif

                            </td>



                            {{-- Code --}}

                            <td class="px-5 lg:px-6
                                       py-4">

                                <span class="inline-flex
                                             px-2.5 py-1
                                             rounded-md
                                             bg-gray-100
                                             text-gray-700
                                             text-xs
                                             font-semibold
                                             whitespace-nowrap">

                                    {{ $branch->code }}

                                </span>

                            </td>



                            {{-- Phone --}}

                            <td class="px-5 lg:px-6
                                       py-4
                                       text-gray-600
                                       whitespace-nowrap">

                                {{ $branch->phone ?? '—' }}

                            </td>



                            {{-- Opening Balance --}}

                            <td class="px-5 lg:px-6
                                       py-4
                                       whitespace-nowrap">

                                <span class="font-semibold
                                             text-gray-800">

                                    {{ number_format($branch->opening_balance, 2) }}

                                </span>

                            </td>



                            {{-- Status --}}

                            <td class="px-5 lg:px-6
                                       py-4">

                                @if($branch->status)

                                    <span class="inline-flex
                                                 items-center
                                                 gap-1.5
                                                 px-2.5 py-1
                                                 rounded-full
                                                 text-xs
                                                 font-semibold
                                                 bg-green-50
                                                 border
                                                 border-green-200
                                                 text-green-700
                                                 whitespace-nowrap">

                                        <span class="w-1.5 h-1.5
                                                     rounded-full
                                                     bg-green-500">
                                        </span>

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex
                                                 items-center
                                                 gap-1.5
                                                 px-2.5 py-1
                                                 rounded-full
                                                 text-xs
                                                 font-semibold
                                                 bg-red-50
                                                 border
                                                 border-red-200
                                                 text-red-700
                                                 whitespace-nowrap">

                                        <span class="w-1.5 h-1.5
                                                     rounded-full
                                                     bg-red-500">
                                        </span>

                                        Inactive

                                    </span>

                                @endif

                            </td>



                            {{-- Actions --}}

                            <td class="px-5 lg:px-6
                                       py-4">

                                <div class="flex
                                            justify-end
                                            items-center
                                            gap-1.5">

                                    <a href="{{ route('admin.branches.show', $branch) }}"
                                       class="inline-flex
                                              items-center
                                              justify-center
                                              px-3 py-1.5
                                              text-xs
                                              font-medium
                                              bg-gray-100
                                              text-gray-700
                                              rounded-lg
                                              hover:bg-gray-200
                                              transition">

                                        View

                                    </a>


                                    <a href="{{ route('admin.branches.edit', $branch) }}"
                                       class="inline-flex
                                              items-center
                                              justify-center
                                              px-3 py-1.5
                                              text-xs
                                              font-medium
                                              bg-blue-50
                                              text-blue-700
                                              rounded-lg
                                              hover:bg-blue-100
                                              transition">

                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('admin.branches.destroy', $branch) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this branch?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex
                                                   items-center
                                                   justify-center
                                                   px-3 py-1.5
                                                   text-xs
                                                   font-medium
                                                   bg-red-50
                                                   text-red-700
                                                   rounded-lg
                                                   hover:bg-red-100
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
                                class="px-6 py-14
                                       text-center">

                                <div class="flex flex-col
                                            items-center
                                            justify-center">

                                    <div class="w-16 h-16
                                                rounded-2xl
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

                                    <a href="{{ route('admin.branches.create') }}"
                                       class="mt-4
                                              inline-flex
                                              items-center
                                              gap-2
                                              px-4 py-2.5
                                              bg-indigo-600
                                              text-white
                                              text-sm
                                              font-semibold
                                              rounded-lg
                                              hover:bg-indigo-700
                                              transition">

                                        + Add Branch

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>



        {{-- =====================================================
             MOBILE CARDS
        ====================================================== --}}

        <div class="md:hidden divide-y
                    divide-gray-100">

            @forelse($branches as $branch)

                <div class="p-4
                            hover:bg-gray-50
                            transition">


                    {{-- Top --}}

                    <div class="flex items-start
                                justify-between
                                gap-3">

                        <div class="flex items-start
                                    gap-3
                                    min-w-0">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-indigo-50
                                        text-indigo-600
                                        flex items-center
                                        justify-center
                                        shrink-0">

                                🏢

                            </div>

                            <div class="min-w-0">

                                <h3 class="font-semibold
                                           text-gray-800
                                           truncate">

                                    {{ $branch->name }}

                                </h3>

                                <p class="text-xs
                                          text-gray-500
                                          mt-0.5
                                          break-all">

                                    {{ $branch->email ?? 'No email' }}

                                </p>

                            </div>

                        </div>


                        {{-- Status --}}

                        @if($branch->status)

                            <span class="inline-flex
                                         items-center
                                         gap-1
                                         px-2 py-1
                                         rounded-full
                                         text-[11px]
                                         font-semibold
                                         bg-green-50
                                         text-green-700
                                         shrink-0">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-green-500">
                                </span>

                                Active

                            </span>

                        @else

                            <span class="inline-flex
                                         items-center
                                         gap-1
                                         px-2 py-1
                                         rounded-full
                                         text-[11px]
                                         font-semibold
                                         bg-red-50
                                         text-red-700
                                         shrink-0">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-red-500">
                                </span>

                                Inactive

                            </span>

                        @endif

                    </div>



                    {{-- Details --}}

                    <div class="mt-4
                                grid grid-cols-2
                                gap-3">


                        {{-- Company --}}

                        <div class="rounded-lg
                                    bg-gray-50
                                    border
                                    border-gray-100
                                    p-3">

                            <p class="text-[11px]
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Company

                            </p>

                            <p class="mt-1
                                      text-sm
                                      font-medium
                                      text-gray-700
                                      truncate">

                                {{ $branch->company->name ?? 'Company Deleted' }}

                            </p>

                        </div>



                        {{-- Code --}}

                        <div class="rounded-lg
                                    bg-gray-50
                                    border
                                    border-gray-100
                                    p-3">

                            <p class="text-[11px]
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Code

                            </p>

                            <p class="mt-1
                                      text-sm
                                      font-semibold
                                      text-gray-700">

                                {{ $branch->code }}

                            </p>

                        </div>



                        {{-- Phone --}}

                        <div class="rounded-lg
                                    bg-gray-50
                                    border
                                    border-gray-100
                                    p-3">

                            <p class="text-[11px]
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Phone

                            </p>

                            <p class="mt-1
                                      text-sm
                                      font-medium
                                      text-gray-700
                                      break-all">

                                {{ $branch->phone ?? '—' }}

                            </p>

                        </div>



                        {{-- Opening Balance --}}

                        <div class="rounded-lg
                                    bg-gray-50
                                    border
                                    border-gray-100
                                    p-3">

                            <p class="text-[11px]
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Opening Balance

                            </p>

                            <p class="mt-1
                                      text-sm
                                      font-semibold
                                      text-gray-800">

                                {{ number_format($branch->opening_balance, 2) }}

                            </p>

                        </div>

                    </div>



                    {{-- Actions --}}

                    <div class="mt-4
                                grid grid-cols-3
                                gap-2">

                        <a href="{{ route('admin.branches.show', $branch) }}"
                           class="inline-flex
                                  items-center
                                  justify-center
                                  px-3 py-2
                                  bg-gray-100
                                  text-gray-700
                                  rounded-lg
                                  text-xs
                                  font-semibold
                                  hover:bg-gray-200
                                  transition">

                            View

                        </a>


                        <a href="{{ route('admin.branches.edit', $branch) }}"
                           class="inline-flex
                                  items-center
                                  justify-center
                                  px-3 py-2
                                  bg-blue-50
                                  text-blue-700
                                  rounded-lg
                                  text-xs
                                  font-semibold
                                  hover:bg-blue-100
                                  transition">

                            Edit

                        </a>


                        <form
                            action="{{ route('admin.branches.destroy', $branch) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this branch?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full
                                       inline-flex
                                       items-center
                                       justify-center
                                       px-3 py-2
                                       bg-red-50
                                       text-red-700
                                       rounded-lg
                                       text-xs
                                       font-semibold
                                       hover:bg-red-100
                                       transition">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>


            @empty

                <div class="px-6 py-14
                            text-center">

                    <div class="w-16 h-16
                                mx-auto
                                rounded-2xl
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

                    <a href="{{ route('admin.branches.create') }}"
                       class="mt-4
                              inline-flex
                              items-center
                              gap-2
                              px-4 py-2.5
                              bg-indigo-600
                              text-white
                              text-sm
                              font-semibold
                              rounded-lg
                              hover:bg-indigo-700
                              transition">

                        + Add Branch

                    </a>

                </div>

            @endforelse

        </div>



        {{-- =====================================================
             PAGINATION
        ====================================================== --}}

        @if($branches->hasPages())

            <div class="px-4 sm:px-6
                        py-4
                        border-t
                        border-gray-200
                        overflow-x-auto">

                {{ $branches->links() }}

            </div>

        @endif

    </div>

</div>

@endsection