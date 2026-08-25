@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- =========================================================
        Header
    ========================================================== --}}
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
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
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM5 20a7 7 0 0114 0H5z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                            Add User
                        </h1>

                        <p class="text-sm text-gray-500 mt-0.5">
                            Create a new rPos user
                        </p>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.users.index') }}"
               class="inline-flex items-center justify-center gap-2
                      w-full sm:w-auto
                      px-4 py-2.5
                      bg-white
                      border border-gray-300
                      text-gray-700
                      text-sm font-medium
                      rounded-xl
                      shadow-sm
                      hover:bg-gray-50
                      hover:border-gray-400
                      transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>

                Back to Users
            </a>

        </div>
    </div>


    {{-- =========================================================
        Validation Errors
    ========================================================== --}}
    @if($errors->any())

        <div class="mb-6 rounded-xl
                    border border-red-200
                    bg-red-50
                    p-4">

            <div class="flex items-start gap-3">

                <div class="flex-shrink-0">
                    <div class="flex h-8 w-8 items-center justify-center
                                rounded-full bg-red-100 text-red-600">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                        </svg>

                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-red-800">
                        Please fix the following errors
                    </h3>

                    <ul class="mt-2 list-disc list-inside
                               text-sm text-red-600 space-y-1">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </div>

    @endif


    {{-- =========================================================
        Form
    ========================================================== --}}
    <form action="{{ route('admin.users.store') }}"
          method="POST">

        @csrf

        <div class="bg-white
                    border border-gray-200
                    rounded-2xl
                    shadow-sm
                    overflow-hidden">


            {{-- =================================================
                User Information
            ================================================== --}}
            <div class="p-5 sm:p-6 lg:p-7">

                <div class="flex items-start gap-3 mb-6">

                    <div class="flex-shrink-0
                                flex h-10 w-10
                                items-center justify-center
                                rounded-xl
                                bg-indigo-50
                                text-indigo-600">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

                        </svg>

                    </div>

                    <div>
                        <h2 class="text-base sm:text-lg
                                   font-semibold text-gray-800">
                            User Information
                        </h2>

                        <p class="text-sm text-gray-500 mt-0.5">
                            Enter the basic information for this user.
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Name --}}
                    <div>
                        <label for="name"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Name
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                               placeholder="Enter user name"
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
                                      placeholder-gray-400
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('name')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div>
                        <label for="email"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Email
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               placeholder="user@example.com"
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
                                      placeholder-gray-400
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Password --}}
                    <div>
                        <label for="password"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Password
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="password"
                               id="password"
                               name="password"
                               required
                               placeholder="Minimum 8 characters"
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
                                      placeholder-gray-400
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Confirm Password
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               required
                               placeholder="Confirm password"
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
                                      placeholder-gray-400
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">
                    </div>

                </div>

            </div>


            {{-- =================================================
                Company & Branch Access
            ================================================== --}}
            <div class="border-t border-gray-200
                        p-5 sm:p-6 lg:p-7">

                <div class="flex items-start gap-3 mb-6">

                    <div class="flex-shrink-0
                                flex h-10 w-10
                                items-center justify-center
                                rounded-xl
                                bg-emerald-50
                                text-emerald-600">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 4h1m4 0h1"/>

                        </svg>

                    </div>

                    <div>
                        <h2 class="text-base sm:text-lg
                                   font-semibold text-gray-800">
                            Company & Branch Access
                        </h2>

                        <p class="text-sm text-gray-500 mt-0.5">
                            Assign this user to a company and branch.
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Company --}}
                    <div>

                        <label for="company_id"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Company

                        </label>

                        <select name="company_id"
                                id="company_id"
                                class="block w-full
                                       rounded-xl
                                       border-gray-300
                                       bg-white
                                       px-4 py-2.5
                                       text-sm text-gray-800
                                       shadow-sm
                                       focus:border-indigo-500
                                       focus:ring-indigo-500">

                            <option value="">
                                Select Company
                            </option>

                            @foreach($companies as $company)

                                <option value="{{ $company->id }}"
                                    {{ old('company_id') == $company->id ? 'selected' : '' }}>

                                    {{ $company->name }}

                                    @if($company->code)
                                        — {{ $company->code }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('company_id')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Branch --}}
                    <div>

                        <label for="branch_id"
                               class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Branch

                        </label>

                        <select name="branch_id"
                                id="branch_id"
                                class="block w-full
                                       rounded-xl
                                       border-gray-300
                                       bg-white
                                       px-4 py-2.5
                                       text-sm text-gray-800
                                       shadow-sm
                                       focus:border-indigo-500
                                       focus:ring-indigo-500">

                            <option value="">
                                Select Branch
                            </option>

                            @foreach($branches as $branch)

                                <option value="{{ $branch->id }}"
                                        data-company="{{ $branch->company_id }}"
                                    {{ old('branch_id') == $branch->id ? 'selected' : '' }}>

                                    {{ $branch->name }}

                                    @if($branch->code)
                                        — {{ $branch->code }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('branch_id')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Access Info --}}
                <div class="mt-5
                            rounded-xl
                            border border-blue-100
                            bg-blue-50
                            px-4 py-3">

                    <div class="flex items-start gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 flex-shrink-0
                                    text-blue-600 mt-0.5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 110-18 9 9 0 010 18z"/>

                        </svg>

                        <p class="text-sm text-blue-700">
                            Select a company first. Only branches belonging
                            to that company will be available.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                Footer
            ================================================== --}}
            <div class="flex flex-col-reverse
                        sm:flex-row
                        sm:justify-end
                        gap-3
                        px-5 sm:px-6 lg:px-7
                        py-4
                        bg-gray-50
                        border-t border-gray-200">

                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex items-center
                          justify-center
                          px-5 py-2.5
                          rounded-xl
                          border border-gray-300
                          bg-white
                          text-sm font-medium
                          text-gray-700
                          hover:bg-gray-50
                          transition">

                    Cancel

                </a>

                <button type="submit"
                        class="inline-flex items-center
                               justify-center
                               gap-2
                               px-5 py-2.5
                               rounded-xl
                               bg-indigo-600
                               text-sm font-semibold
                               text-white
                               shadow-sm
                               hover:bg-indigo-700
                               focus:outline-none
                               focus:ring-2
                               focus:ring-indigo-500
                               focus:ring-offset-2
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

                    Create User

                </button>

            </div>

        </div>

    </form>

</div>


{{-- =============================================================
    Company → Branch Filter
============================================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const company = document.getElementById('company_id');
    const branch = document.getElementById('branch_id');

    if (!company || !branch) {
        return;
    }

    function filterBranches() {

        const companyId = company.value;

        Array.from(branch.options).forEach(function (option) {

            // Placeholder
            if (!option.value) {
                option.hidden = false;
                return;
            }

            // Show only selected company's branches
            option.hidden = option.dataset.company !== companyId;

        });

        // Reset branch if it does not belong to selected company
        const selectedOption =
            branch.options[branch.selectedIndex];

        if (
            branch.value &&
            selectedOption &&
            selectedOption.dataset.company !== companyId
        ) {
            branch.value = '';
        }
    }

    company.addEventListener('change', filterBranches);

    // Initial load
    filterBranches();

});
</script>

@endsection