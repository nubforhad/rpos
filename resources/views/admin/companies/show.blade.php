@extends('admin.layouts.app')

@section('title', 'Company Details | rPos')

@section('page-title', 'Company Details')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">


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
                        text-sm">

                <a href="{{ route('admin.companies.index') }}"
                   class="text-gray-500
                          hover:text-indigo-600
                          transition">

                    Companies

                </a>

                <span class="text-gray-400">
                    /
                </span>

                <span class="text-gray-700">
                    Details
                </span>

            </div>


            <h1 class="text-xl sm:text-2xl
                       font-bold
                       text-gray-800">

                Company Details

            </h1>

            <p class="text-sm
                      text-gray-500
                      mt-1">

                View complete company information.

            </p>

        </div>


        {{-- Action Buttons --}}

        <div class="flex flex-col
                    xs:flex-row
                    sm:flex-row
                    gap-2
                    w-full lg:w-auto">


            <a href="{{ route('admin.companies.index') }}"
               class="w-full sm:w-auto
                      inline-flex
                      items-center
                      justify-center
                      gap-2
                      px-4 py-2.5
                      bg-white
                      border border-gray-300
                      text-gray-700
                      text-sm font-medium
                      rounded-lg
                      hover:bg-gray-50
                      transition">

                <span>
                    ←
                </span>

                Back

            </a>


            <a href="{{ route('admin.companies.edit', $company) }}"
               class="w-full sm:w-auto
                      inline-flex
                      items-center
                      justify-center
                      gap-2
                      px-4 py-2.5
                      bg-indigo-600
                      text-white
                      text-sm font-semibold
                      rounded-lg
                      hover:bg-indigo-700
                      focus:outline-none
                      focus:ring-2
                      focus:ring-indigo-500
                      focus:ring-offset-2
                      transition">

                <span>
                    ✎
                </span>

                Edit Company

            </a>

        </div>

    </div>



    {{-- =========================================================
         COMPANY PROFILE CARD
    ========================================================== --}}

    <div class="bg-white
                rounded-xl
                shadow-sm
                border border-gray-200
                overflow-hidden">


        {{-- =====================================================
             COMPANY TOP SECTION
        ====================================================== --}}

        <div class="p-5 sm:p-6 lg:p-7">

            <div class="flex flex-col
                        sm:flex-row
                        sm:items-center
                        gap-5 sm:gap-6">


                {{-- Logo --}}

                <div class="shrink-0">

                    @if($company->logo)

                        <img
                            src="{{ asset('storage/' . $company->logo) }}"
                            alt="{{ $company->name }}"
                            class="w-20 h-20
                                   sm:w-24 sm:h-24
                                   rounded-2xl
                                   object-cover
                                   border border-gray-200
                                   shadow-sm"
                        >

                    @else

                        <div class="w-20 h-20
                                    sm:w-24 sm:h-24
                                    rounded-2xl
                                    bg-indigo-50
                                    text-indigo-600
                                    border border-indigo-100
                                    flex items-center
                                    justify-center
                                    text-2xl sm:text-3xl
                                    font-bold">

                            {{ strtoupper(substr($company->name, 0, 1)) }}

                        </div>

                    @endif

                </div>


                {{-- Company Information --}}

                <div class="flex-1 min-w-0">

                    <div class="flex flex-col
                                sm:flex-row
                                sm:items-center
                                gap-2 sm:gap-3">


                        <h2 class="text-xl sm:text-2xl
                                   font-bold
                                   text-gray-800
                                   break-words">

                            {{ $company->name }}

                        </h2>


                        {{-- Status --}}

                        @if($company->status)

                            <span class="self-start
                                         inline-flex
                                         items-center
                                         gap-1.5
                                         px-2.5 py-1
                                         rounded-full
                                         text-xs
                                         font-semibold
                                         bg-green-50
                                         text-green-700
                                         border
                                         border-green-200">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-green-500">
                                </span>

                                Active

                            </span>

                        @else

                            <span class="self-start
                                         inline-flex
                                         items-center
                                         gap-1.5
                                         px-2.5 py-1
                                         rounded-full
                                         text-xs
                                         font-semibold
                                         bg-red-50
                                         text-red-700
                                         border
                                         border-red-200">

                                <span class="w-1.5 h-1.5
                                             rounded-full
                                             bg-red-500">
                                </span>

                                Inactive

                            </span>

                        @endif

                    </div>


                    {{-- Company Code --}}

                    <div class="mt-2
                                flex flex-wrap
                                items-center
                                gap-2">

                        <span class="text-sm
                                     text-gray-500">

                            Company Code:

                        </span>

                        <span class="inline-flex
                                     items-center
                                     px-2.5 py-1
                                     rounded-md
                                     bg-gray-100
                                     text-gray-700
                                     text-xs
                                     sm:text-sm
                                     font-semibold">

                            {{ $company->code }}

                        </span>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             INFORMATION GRID
        ====================================================== --}}

        <div class="border-t
                    border-gray-200">

            <div class="grid grid-cols-1
                        sm:grid-cols-2">


                {{-- =================================================
                     PHONE
                ================================================== --}}

                <div class="p-5 sm:p-6
                            border-b
                            sm:border-r
                            border-gray-200
                            hover:bg-gray-50
                            transition">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-blue-50
                                    text-blue-600
                                    flex items-center
                                    justify-center
                                    shrink-0">

                            ☎

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Phone

                            </p>

                            <p class="mt-1.5
                                      text-sm sm:text-base
                                      text-gray-800
                                      font-medium
                                      break-words">

                                {{ $company->phone ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     EMAIL
                ================================================== --}}

                <div class="p-5 sm:p-6
                            border-b
                            border-gray-200
                            hover:bg-gray-50
                            transition">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-purple-50
                                    text-purple-600
                                    flex items-center
                                    justify-center
                                    shrink-0">

                            @

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Email

                            </p>

                            <p class="mt-1.5
                                      text-sm sm:text-base
                                      text-gray-800
                                      font-medium
                                      break-all">

                                {{ $company->email ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     WEBSITE
                ================================================== --}}

                <div class="p-5 sm:p-6
                            border-b
                            sm:border-r
                            border-gray-200
                            hover:bg-gray-50
                            transition">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-indigo-50
                                    text-indigo-600
                                    flex items-center
                                    justify-center
                                    shrink-0">

                            🌐

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Website

                            </p>

                            @if($company->website)

                                <a
                                    href="{{ $company->website }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-1.5
                                           inline-block
                                           text-sm sm:text-base
                                           text-indigo-600
                                           hover:text-indigo-700
                                           hover:underline
                                           break-all">

                                    {{ $company->website }}

                                </a>

                            @else

                                <p class="mt-1.5
                                          text-sm sm:text-base
                                          text-gray-800
                                          font-medium">

                                    Not provided

                                </p>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     TAX
                ================================================== --}}

                <div class="p-5 sm:p-6
                            border-b
                            border-gray-200
                            hover:bg-gray-50
                            transition">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-amber-50
                                    text-amber-600
                                    flex items-center
                                    justify-center
                                    shrink-0
                                    text-xs
                                    font-bold">

                            VAT

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Tax / VAT Number

                            </p>

                            <p class="mt-1.5
                                      text-sm sm:text-base
                                      text-gray-800
                                      font-medium
                                      break-all">

                                {{ $company->tax_number ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     ADDRESS
                ================================================== --}}

                <div class="p-5 sm:p-6
                            sm:col-span-2
                            border-b
                            border-gray-200
                            hover:bg-gray-50
                            transition">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-green-50
                                    text-green-600
                                    flex items-center
                                    justify-center
                                    shrink-0">

                            📍

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs
                                      uppercase
                                      tracking-wide
                                      text-gray-400
                                      font-semibold">

                                Address

                            </p>

                            <p class="mt-1.5
                                      text-sm sm:text-base
                                      text-gray-800
                                      font-medium
                                      whitespace-pre-line
                                      break-words">

                                {{ $company->address ?: 'Not provided' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     CREATED
                ================================================== --}}

                <div class="p-5 sm:p-6
                            border-b
                            sm:border-b-0
                            sm:border-r
                            border-gray-200">

                    <p class="text-xs
                              uppercase
                              tracking-wide
                              text-gray-400
                              font-semibold">

                        Created At

                    </p>

                    <p class="mt-2
                              text-sm sm:text-base
                              text-gray-800
                              font-medium">

                        {{ $company->created_at?->format('d M Y, h:i A') ?? '—' }}

                    </p>

                </div>



                {{-- =================================================
                     UPDATED
                ================================================== --}}

                <div class="p-5 sm:p-6">

                    <p class="text-xs
                              uppercase
                              tracking-wide
                              text-gray-400
                              font-semibold">

                        Last Updated

                    </p>

                    <p class="mt-2
                              text-sm sm:text-base
                              text-gray-800
                              font-medium">

                        {{ $company->updated_at?->format('d M Y, h:i A') ?? '—' }}

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         BRANCH SUMMARY
    ========================================================== --}}

    <div class="mt-6
                bg-white
                rounded-xl
                shadow-sm
                border border-gray-200
                overflow-hidden">


        {{-- Branch Header --}}

        <div class="p-5 sm:p-6">

            <div class="flex items-center
                        justify-between
                        gap-4">

                <div class="flex items-center
                            gap-3
                            min-w-0">

                    <div class="w-10 h-10
                                rounded-lg
                                bg-indigo-50
                                text-indigo-600
                                flex items-center
                                justify-center
                                shrink-0">

                        🏪

                    </div>

                    <div class="min-w-0">

                        <h3 class="text-base sm:text-lg
                                   font-semibold
                                   text-gray-800">

                            Branches

                        </h3>

                        <p class="text-xs sm:text-sm
                                  text-gray-500
                                  mt-0.5">

                            Branches belonging to this company

                        </p>

                    </div>

                </div>


                {{-- Branch Count --}}

                <div class="shrink-0
                            min-w-12
                            h-10
                            px-3
                            rounded-lg
                            bg-indigo-50
                            text-indigo-600
                            flex items-center
                            justify-center
                            text-lg
                            font-bold">

                    {{ $company->branches->count() }}

                </div>

            </div>


            {{-- Branch Notice --}}

            <div class="mt-5
                        flex items-start
                        gap-3
                        p-4
                        rounded-xl
                        bg-gray-50
                        border border-gray-200">

                <div class="w-8 h-8
                            rounded-lg
                            bg-white
                            border border-gray-200
                            flex items-center
                            justify-center
                            shrink-0
                            text-gray-500">

                    i

                </div>

                <div class="min-w-0">

                    <p class="text-sm
                              font-medium
                              text-gray-700">

                        Branch Management

                    </p>

                    <p class="text-xs sm:text-sm
                              text-gray-500
                              mt-1
                              leading-5">

                        Branch management will be available
                        after the Branch module is completed.

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         BOTTOM ACTION
    ========================================================== --}}

    <div class="mt-6
                flex flex-col
                sm:flex-row
                sm:justify-end
                gap-3">

        <a href="{{ route('admin.companies.index') }}"
           class="w-full sm:w-auto
                  inline-flex
                  items-center
                  justify-center
                  px-5 py-2.5
                  bg-white
                  border border-gray-300
                  text-gray-700
                  text-sm font-medium
                  rounded-lg
                  hover:bg-gray-50
                  transition">

            Back to Companies

        </a>


        <a href="{{ route('admin.companies.edit', $company) }}"
           class="w-full sm:w-auto
                  inline-flex
                  items-center
                  justify-center
                  gap-2
                  px-5 py-2.5
                  bg-indigo-600
                  text-white
                  text-sm font-semibold
                  rounded-lg
                  hover:bg-indigo-700
                  transition">

            ✎ Edit Company

        </a>

    </div>

</div>

@endsection