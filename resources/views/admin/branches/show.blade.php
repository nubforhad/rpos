 @extends('admin.layouts.app')

@section('content')

<div class="w-full">

    {{-- Page Container --}}
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

        {{-- =========================================================
             PAGE HEADER
        ========================================================== --}}
        <div class="mb-6">

            <div class="flex flex-col lg:flex-row
                        lg:items-center
                        lg:justify-between
                        gap-4">

                {{-- Title --}}
                <div class="min-w-0">

                    <div class="flex items-center gap-2 mb-1">

                        <a href="{{ route('admin.branches.index') }}"
                           class="text-gray-400 hover:text-indigo-600 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>

                            </svg>

                        </a>

                        <span class="text-sm text-gray-400">
                            Branch Management
                        </span>

                    </div>

                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 truncate">
                        Branch Details
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        View complete information about this branch
                    </p>

                </div>


                {{-- Actions --}}
                <div class="flex flex-col
                            sm:flex-row
                            gap-2
                            w-full
                            lg:w-auto">

                    <a href="{{ route('admin.branches.index') }}"
                       class="inline-flex items-center
                              justify-center
                              gap-2
                              px-4 py-2.5
                              bg-white
                              border border-gray-300
                              text-gray-700
                              rounded-lg
                              hover:bg-gray-50
                              transition
                              text-sm
                              font-medium">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

                        </svg>

                        Back

                    </a>


                    <a href="{{ route('admin.branches.edit', $branch) }}"
                       class="inline-flex items-center
                              justify-center
                              gap-2
                              px-4 py-2.5
                              bg-indigo-600
                              text-white
                              rounded-lg
                              hover:bg-indigo-700
                              transition
                              text-sm
                              font-medium
                              shadow-sm">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                        </svg>

                        Edit Branch

                    </a>

                </div>

            </div>

        </div>


        {{-- =========================================================
             MAIN BRANCH CARD
        ========================================================== --}}
        <div class="bg-white
                    rounded-2xl
                    border border-gray-200
                    shadow-sm
                    overflow-hidden">

            {{-- Branch Hero --}}
            <div class="p-5 sm:p-7 lg:p-8">

                <div class="flex flex-col
                            sm:flex-row
                            sm:items-center
                            gap-5 sm:gap-6">

                    {{-- Icon --}}
                    <div class="w-20 h-20
                                sm:w-24 sm:h-24
                                rounded-2xl
                                bg-indigo-50
                                border border-indigo-100
                                text-indigo-600
                                flex items-center justify-center
                                shrink-0">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-10 h-10 sm:w-12 sm:h-12"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01M9 12h.01M15 12h.01"/>

                        </svg>

                    </div>


                    {{-- Branch Information --}}
                    <div class="flex-1 min-w-0">

                        <div class="flex flex-wrap
                                    items-center
                                    gap-2 sm:gap-3">

                            <h2 class="text-2xl sm:text-3xl
                                       font-bold
                                       text-gray-800
                                       break-words">

                                {{ $branch->name }}

                            </h2>


                            {{-- Status --}}
                            @if($branch->status)

                                <span class="inline-flex
                                             items-center
                                             gap-1.5
                                             px-3 py-1
                                             rounded-full
                                             bg-green-50
                                             border border-green-200
                                             text-green-700
                                             text-xs
                                             font-semibold">

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
                                             px-3 py-1
                                             rounded-full
                                             bg-red-50
                                             border border-red-200
                                             text-red-700
                                             text-xs
                                             font-semibold">

                                    <span class="w-1.5 h-1.5
                                                 rounded-full
                                                 bg-red-500">
                                    </span>

                                    Inactive

                                </span>

                            @endif

                        </div>


                        {{-- Code --}}
                        <div class="mt-2 flex flex-wrap items-center gap-2">

                            <span class="text-sm text-gray-500">
                                Branch Code
                            </span>

                            <span class="inline-flex
                                         items-center
                                         px-2.5 py-1
                                         rounded-md
                                         bg-gray-100
                                         text-gray-700
                                         text-xs
                                         font-semibold">

                                {{ $branch->code }}

                            </span>

                        </div>


                        {{-- Company --}}
                        <div class="mt-2 flex flex-wrap items-center gap-1.5">

                            <span class="text-sm text-gray-500">
                                Company:
                            </span>

                            @if($branch->company)

                                <a href="{{ route('admin.companies.show', $branch->company) }}"
                                   class="text-sm
                                          font-semibold
                                          text-indigo-600
                                          hover:text-indigo-700">

                                    {{ $branch->company->name }}

                                </a>

                            @else

                                <span class="text-sm
                                             font-semibold
                                             text-red-600">

                                    Company Deleted

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 INFORMATION GRID
            ====================================================== --}}
            <div class="border-t border-gray-200">

                <div class="grid grid-cols-1 md:grid-cols-2">


                    {{-- Phone --}}
                    <div class="p-5 sm:p-6
                                border-b md:border-r
                                border-gray-200">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-blue-50
                                        text-blue-600
                                        flex items-center justify-center
                                        shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.493 4.478a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.478 1.493A1 1 0 0121 15.72V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
                                          text-gray-400">

                                    Phone

                                </p>

                                @if($branch->phone)

                                    <a href="tel:{{ $branch->phone }}"
                                       class="mt-1 block
                                              text-gray-800
                                              font-medium
                                              hover:text-indigo-600">

                                        {{ $branch->phone }}

                                    </a>

                                @else

                                    <p class="mt-1 text-gray-500">
                                        Not provided
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Email --}}
                    <div class="p-5 sm:p-6
                                border-b
                                border-gray-200">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-purple-50
                                        text-purple-600
                                        flex items-center justify-center
                                        shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
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

                                    <p class="mt-1 text-gray-500">
                                        Not provided
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Opening Balance --}}
                    <div class="p-5 sm:p-6
                                border-b md:border-r
                                border-gray-200">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-green-50
                                        text-green-600
                                        flex items-center justify-center
                                        shrink-0">

                                <span class="text-lg font-bold">
                                    ৳
                                </span>

                            </div>

                            <div>

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
                                          text-gray-400">

                                    Opening Balance

                                </p>

                                <p class="mt-1 text-xl
                                          sm:text-2xl
                                          font-bold
                                          text-gray-800">

                                    ৳ {{ number_format($branch->opening_balance, 2) }}

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Company --}}
                    <div class="p-5 sm:p-6
                                border-b
                                border-gray-200">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-indigo-50
                                        text-indigo-600
                                        flex items-center justify-center
                                        shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01M9 12h.01M15 12h.01"/>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
                                          text-gray-400">

                                    Company

                                </p>

                                @if($branch->company)

                                    <a href="{{ route('admin.companies.show', $branch->company) }}"
                                       class="mt-1 block
                                              text-gray-800
                                              font-semibold
                                              hover:text-indigo-600">

                                        {{ $branch->company->name }}

                                    </a>

                                    <p class="text-xs
                                              text-gray-500
                                              mt-0.5">

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
                    <div class="p-5 sm:p-6
                                md:col-span-2
                                border-b
                                border-gray-200">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-orange-50
                                        text-orange-600
                                        flex items-center justify-center
                                        shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17.657 16.657L13.414 21.9a1 1 0 01-1.414 0l-4.243-5.243a8 8 0 1111.314 0z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
                                          text-gray-400">

                                    Address

                                </p>

                                <p class="mt-1 text-gray-800
                                          font-medium
                                          whitespace-pre-line
                                          break-words">

                                    {{ $branch->address ?: 'Not provided' }}

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Created --}}
                    <div class="p-5 sm:p-6
                                border-b md:border-b-0
                                md:border-r
                                border-gray-200">

                        <p class="text-xs font-semibold
                                  uppercase
                                  tracking-wide
                                  text-gray-400">

                            Created At

                        </p>

                        <p class="mt-2
                                  text-sm
                                  sm:text-base
                                  text-gray-800
                                  font-medium">

                            {{ $branch->created_at?->format('d M Y, h:i A') }}

                        </p>

                    </div>


                    {{-- Updated --}}
                    <div class="p-5 sm:p-6">

                        <p class="text-xs font-semibold
                                  uppercase
                                  tracking-wide
                                  text-gray-400">

                            Last Updated

                        </p>

                        <p class="mt-2
                                  text-sm
                                  sm:text-base
                                  text-gray-800
                                  font-medium">

                            {{ $branch->updated_at?->format('d M Y, h:i A') }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             PARENT COMPANY
        ========================================================== --}}
        @if($branch->company)

            <div class="mt-6
                        bg-white
                        rounded-2xl
                        shadow-sm
                        border border-gray-200">

                <div class="p-5 sm:p-6">

                    <div class="flex flex-col
                                sm:flex-row
                                sm:items-center
                                sm:justify-between
                                gap-4">

                        <div class="min-w-0">

                            <div class="flex items-center gap-2">

                                <div class="w-9 h-9
                                            rounded-lg
                                            bg-indigo-50
                                            text-indigo-600
                                            flex items-center justify-center">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-5 h-5"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 21h18M5 21V7l7-4 7 4v14"/>

                                    </svg>

                                </div>

                                <p class="text-xs font-semibold
                                          uppercase
                                          tracking-wide
                                          text-gray-400">

                                    Parent Company

                                </p>

                            </div>

                            <h3 class="text-xl
                                       sm:text-2xl
                                       font-bold
                                       text-gray-800
                                       mt-3">

                                {{ $branch->company->name }}

                            </h3>

                            <p class="text-sm text-gray-500 mt-1">

                                Company Code:

                                <span class="font-semibold text-gray-700">

                                    {{ $branch->company->code }}

                                </span>

                            </p>

                        </div>


                        <a href="{{ route('admin.companies.show', $branch->company) }}"
                           class="inline-flex items-center
                                  justify-center
                                  gap-2
                                  px-4 py-2.5
                                  bg-indigo-50
                                  text-indigo-700
                                  rounded-lg
                                  hover:bg-indigo-100
                                  transition
                                  text-sm
                                  font-medium">

                            View Company

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7"/>

                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
             DANGER ZONE
        ========================================================== --}}
        <div class="mt-6
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border border-red-200
                    overflow-hidden">

            <div class="p-5 sm:p-6">

                <div class="flex items-start gap-3">

                    <div class="w-10 h-10
                                rounded-xl
                                bg-red-50
                                text-red-600
                                flex items-center justify-center
                                shrink-0">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z"/>

                        </svg>

                    </div>

                    <div class="min-w-0">

                        <h3 class="text-lg font-semibold text-red-700">

                            Danger Zone

                        </h3>

                        <p class="text-sm text-gray-500 mt-1">

                            Deleting this branch may affect its related
                            POS records and other connected data.

                        </p>

                    </div>

                </div>


                <form action="{{ route('admin.branches.destroy', $branch) }}"
                      method="POST"
                      class="mt-5"
                      onsubmit="return confirm('Are you sure you want to delete this branch? This action cannot be undone.')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center
                                   justify-center
                                   gap-2
                                   px-4 py-2.5
                                   bg-red-600
                                   text-white
                                   rounded-lg
                                   hover:bg-red-700
                                   transition
                                   text-sm
                                   font-medium">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>

                        </svg>

                        Delete Branch

                    </button>

                </form>

            </div>

        </div>


        {{-- Bottom Spacing --}}
        <div class="h-4 sm:h-6"></div>

    </div>

</div>

@endsection