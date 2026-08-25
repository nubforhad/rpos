@extends('admin.layouts.app')

@section('title', 'Add Branch')

@section('content')

<div class="w-full">

    {{-- Page Container --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">

        {{-- =========================
            PAGE HEADER
        ========================== --}}
        <div class="mb-6">

            <div class="flex flex-col sm:flex-row sm:items-center
                        sm:justify-between gap-4">

                {{-- Title --}}
                <div class="min-w-0">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 sm:w-11 sm:h-11
                                    rounded-xl
                                    bg-indigo-50
                                    text-indigo-600
                                    flex items-center justify-center
                                    shrink-0">

                            {{-- Building Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 sm:w-6 sm:h-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2" />

                            </svg>

                        </div>

                        <div class="min-w-0">

                            <h1 class="text-xl sm:text-2xl
                                       font-bold text-gray-800
                                       truncate">

                                Add Branch

                            </h1>

                            <p class="text-sm text-gray-500 mt-0.5">

                                Create a new branch for your company

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Back Button --}}
                <div class="shrink-0">

                    <a href="{{ route('admin.branches.index') }}"
                       class="w-full sm:w-auto
                              inline-flex items-center
                              justify-center gap-2
                              px-4 py-2.5
                              bg-white
                              border border-gray-200
                              text-gray-700
                              rounded-xl
                              shadow-sm
                              hover:bg-gray-50
                              hover:border-gray-300
                              transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                        </svg>

                        <span>Back</span>

                    </a>

                </div>

            </div>

        </div>


        {{-- =========================
            VALIDATION ERRORS
        ========================== --}}
        @if($errors->any())

            <div class="mb-6
                        rounded-xl
                        border border-red-200
                        bg-red-50
                        p-4 sm:p-5">

                <div class="flex items-start gap-3">

                    <div class="w-9 h-9
                                rounded-lg
                                bg-red-100
                                text-red-600
                                flex items-center justify-center
                                shrink-0">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z" />

                        </svg>

                    </div>


                    <div class="min-w-0">

                        <p class="font-semibold text-red-700">

                            Please fix the following errors

                        </p>

                        <ul class="mt-2
                                   list-disc
                                   list-inside
                                   space-y-1
                                   text-sm
                                   text-red-600">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================
            CREATE FORM
        ========================== --}}
        <form action="{{ route('admin.branches.store') }}"
              method="POST">

            @csrf

            <div class="bg-white
                        rounded-2xl
                        border border-gray-200
                        shadow-sm
                        overflow-hidden">


                {{-- =========================
                    FORM HEADER
                ========================== --}}
                <div class="px-5 sm:px-6 lg:px-7
                            py-5
                            border-b border-gray-200
                            bg-gray-50/70">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9
                                    rounded-lg
                                    bg-indigo-100
                                    text-indigo-600
                                    flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 21h16M6 21V5a2 2 0 012-2h8a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m3-8h2m-2 4h2m-2 4h2" />

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-base sm:text-lg
                                       font-semibold text-gray-800">

                                Branch Information

                            </h2>

                            <p class="text-xs sm:text-sm text-gray-500">

                                Enter the basic information of this branch.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- =========================
                    FORM BODY
                ========================== --}}
                <div class="p-5 sm:p-6 lg:p-7">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">


                        {{-- Company --}}
                        <div class="md:col-span-2">

                            <label for="company_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Company

                                <span class="text-red-500">*</span>

                            </label>

                            <select
                                id="company_id"
                                name="company_id"
                                required
                                class="w-full h-11
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition">

                                <option value="">
                                    Select Company
                                </option>

                                @foreach($companies as $company)

                                    <option
                                        value="{{ $company->id }}"
                                        {{ old('company_id') == $company->id ? 'selected' : '' }}
                                    >

                                        {{ $company->name }}

                                        @if($company->code)
                                            — {{ $company->code }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>

                            @error('company_id')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                            @if($companies->isEmpty())

                                <p class="mt-2 text-sm text-red-600">

                                    No active company found.
                                    Please create an active company first.

                                </p>

                            @endif

                        </div>


                        {{-- Branch Name --}}
                        <div>

                            <label for="name"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Branch Name

                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="Enter branch name"
                                class="w-full h-11
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       placeholder:text-gray-400
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                            >

                            @error('name')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Branch Code --}}
                        <div>

                            <label for="code"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Branch Code

                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                id="code"
                                type="text"
                                name="code"
                                value="{{ old('code') }}"
                                required
                                placeholder="e.g. DHAKA01"
                                class="w-full h-11
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       placeholder:text-gray-400
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                            >

                            <p class="mt-1.5 text-xs text-gray-500">
                                Code must be unique within the selected company.
                            </p>

                            @error('code')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Phone --}}
                        <div>

                            <label for="phone"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Phone

                            </label>

                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Enter branch phone"
                                class="w-full h-11
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       placeholder:text-gray-400
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                            >

                            @error('phone')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Email --}}
                        <div>

                            <label for="email"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Email

                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="branch@example.com"
                                class="w-full h-11
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       placeholder:text-gray-400
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                            >

                            @error('email')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Opening Balance --}}
                        <div>

                            <label for="opening_balance"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Opening Balance

                            </label>

                            <div class="relative">

                                <span class="absolute
                                             left-3.5
                                             top-1/2
                                             -translate-y-1/2
                                             text-gray-500
                                             font-semibold">

                                    ৳

                                </span>

                                <input
                                    id="opening_balance"
                                    type="number"
                                    name="opening_balance"
                                    value="{{ old('opening_balance', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0.00"
                                    class="w-full h-11
                                           rounded-xl
                                           border border-gray-300
                                           bg-white
                                           pl-8 pr-3.5
                                           text-sm text-gray-700
                                           shadow-sm
                                           outline-none
                                           focus:border-indigo-500
                                           focus:ring-2
                                           focus:ring-indigo-100
                                           transition"
                                >

                            </div>

                            @error('opening_balance')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Status --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">

                                Status

                            </label>

                            <div class="h-11
                                        flex items-center">

                                <label class="inline-flex
                                              items-center
                                              gap-3
                                              cursor-pointer
                                              select-none">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        {{ old('status', true) ? 'checked' : '' }}
                                        class="w-4 h-4
                                               rounded
                                               border-gray-300
                                               text-indigo-600
                                               focus:ring-indigo-500"
                                    >

                                    <span class="text-sm font-medium text-gray-700">

                                        Active Branch

                                    </span>

                                </label>

                            </div>

                            @error('status')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Address --}}
                        <div class="md:col-span-2">

                            <label for="address"
                                   class="block text-sm font-semibold text-gray-700 mb-2">

                                Branch Address

                            </label>

                            <textarea
                                id="address"
                                name="address"
                                rows="4"
                                placeholder="Enter branch address"
                                class="w-full
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       px-3.5 py-3
                                       text-sm text-gray-700
                                       shadow-sm
                                       outline-none
                                       resize-y
                                       placeholder:text-gray-400
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                            >{{ old('address') }}</textarea>

                            @error('address')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================
                    FORM FOOTER
                ========================== --}}
                <div class="px-5 sm:px-6 lg:px-7
                            py-4
                            bg-gray-50
                            border-t border-gray-200">

                    <div class="flex flex-col-reverse
                                sm:flex-row
                                sm:justify-end
                                gap-3">

                        <a
                            href="{{ route('admin.branches.index') }}"
                            class="w-full sm:w-auto
                                   inline-flex
                                   items-center
                                   justify-center
                                   px-5 py-2.5
                                   bg-white
                                   border border-gray-300
                                   text-gray-700
                                   rounded-xl
                                   font-medium
                                   hover:bg-gray-50
                                   transition"
                        >

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex
                                   items-center
                                   justify-center
                                   gap-2
                                   px-5 py-2.5
                                   bg-indigo-600
                                   text-white
                                   rounded-xl
                                   font-semibold
                                   shadow-sm
                                   hover:bg-indigo-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500
                                   focus:ring-offset-2
                                   transition"
                        >

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 4v16m8-8H4" />

                            </svg>

                            Create Branch

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection