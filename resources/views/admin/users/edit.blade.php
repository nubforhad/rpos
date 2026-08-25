@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- =========================================================
        Header
    ========================================================== --}}
    <div class="mb-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center
                            rounded-xl bg-indigo-100 text-indigo-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M11 16l-4-4m0 0l4-4m-4 4h12m-5-9a9 9 0 110 18 9 9 0 010-18z"/>

                    </svg>

                </div>

                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                        Edit User
                    </h1>

                    <p class="text-sm text-gray-500 mt-0.5">
                        Update user information and access
                    </p>
                </div>

            </div>


            {{-- Header Actions --}}
            <div class="grid grid-cols-2 sm:flex gap-2">

                <a href="{{ route('admin.users.show', $user) }}"
                   class="inline-flex items-center justify-center gap-2
                          px-4 py-2.5
                          rounded-xl
                          border border-gray-300
                          bg-white
                          text-sm font-medium
                          text-gray-700
                          shadow-sm
                          hover:bg-gray-50
                          transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>

                    </svg>

                    View

                </a>


                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex items-center justify-center gap-2
                          px-4 py-2.5
                          rounded-xl
                          border border-gray-300
                          bg-white
                          text-sm font-medium
                          text-gray-700
                          shadow-sm
                          hover:bg-gray-50
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

                    Back

                </a>

            </div>

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

                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center
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

                <div>

                    <h3 class="text-sm font-semibold text-red-800">
                        Please fix the following errors
                    </h3>

                    <ul class="mt-2 list-disc list-inside
                               space-y-1 text-sm text-red-600">

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
    <form action="{{ route('admin.users.update', $user) }}"
          method="POST">

        @csrf
        @method('PUT')


        <div class="overflow-hidden
                    rounded-2xl
                    border border-gray-200
                    bg-white
                    shadow-sm">


            {{-- =================================================
                User Information
            ================================================== --}}
            <div class="p-5 sm:p-6 lg:p-7">

                <div class="flex items-start gap-3 mb-6">

                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center
                                rounded-xl bg-indigo-50 text-indigo-600">

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

                        <p class="mt-0.5 text-sm text-gray-500">
                            Update the user's basic account information.
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Name --}}
                    <div>

                        <label for="name"
                               class="mb-2 block text-sm font-medium text-gray-700">

                            Name
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               required
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
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
                               class="mb-2 block text-sm font-medium text-gray-700">

                            Email
                            <span class="text-red-500">*</span>

                        </label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               required
                               class="block w-full
                                      rounded-xl
                                      border-gray-300
                                      bg-white
                                      px-4 py-2.5
                                      text-sm text-gray-800
                                      shadow-sm
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- New Password --}}
                    <div>

                        <label for="password"
                               class="mb-2 block text-sm font-medium text-gray-700">

                            New Password

                        </label>

                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="Leave blank to keep current password"
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

                        <p class="mt-1.5 text-xs text-gray-400">
                            Leave empty if you don't want to change the password.
                        </p>

                    </div>


                    {{-- Confirm Password --}}
                    <div>

                        <label for="password_confirmation"
                               class="mb-2 block text-sm font-medium text-gray-700">

                            Confirm New Password

                        </label>

                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               placeholder="Confirm new password"
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

                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center
                                rounded-xl bg-emerald-50 text-emerald-600">

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

                        <p class="mt-0.5 text-sm text-gray-500">
                            Update the user's company and branch scope.
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Company --}}
                    <div>

                        <label for="company_id"
                               class="mb-2 block text-sm font-medium text-gray-700">

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
                                    {{ old('company_id', $user->company_id) == $company->id ? 'selected' : '' }}>

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
                               class="mb-2 block text-sm font-medium text-gray-700">

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
                                    {{ old('branch_id', $user->branch_id) == $branch->id ? 'selected' : '' }}>

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


                    {{-- Role --}}
                    <div>

                        <label for="branch_id"
                               class="mb-2 block text-sm font-medium text-gray-700">

                            Role

                        </label>

                          <select name="role_id"
                                id="role_id"
                                required
                                class="w-full rounded-xl border-gray-300
                                    focus:border-indigo-500
                                    focus:ring-indigo-500">

                            <option value="">
                                Select Role
                            </option>

                            @foreach($roles as $role)

                                <option value="{{ $role->id }}"
                                    {{ old('role_id', $user->role_id) == $role->id
                                        ? 'selected'
                                        : '' }}>

                                    {{ $role->name }}

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


                {{-- Info --}}
                <div class="mt-5 rounded-xl
                            border border-blue-100
                            bg-blue-50
                            px-4 py-3">

                    <div class="flex items-start gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600"
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
                        sm:items-center
                        sm:justify-end
                        gap-3
                        border-t border-gray-200
                        bg-gray-50
                        px-5 sm:px-6 lg:px-7
                        py-4">

                <a href="{{ route('admin.users.show', $user) }}"
                   class="inline-flex items-center justify-center
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
                        class="inline-flex items-center justify-center gap-2
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
                              d="M5 13l4 4L19 7"/>

                    </svg>

                    Update User

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

            // Show branches belonging to selected company
            option.hidden = option.dataset.company !== companyId;

        });

        // Reset invalid branch selection
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

    // Initial filtering
    filterBranches();

});
</script>

@endsection