@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row
                sm:items-center
                sm:justify-between
                gap-4 mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Add User
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Create a new rPos user
            </p>

        </div>

        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center
                  justify-center
                  px-4 py-2.5
                  bg-gray-100
                  text-gray-700
                  rounded-lg
                  hover:bg-gray-200">

            ← Back

        </a>

    </div>


    {{-- Errors --}}
    @if($errors->any())

        <div class="mb-5 rounded-lg
                    bg-red-50
                    border border-red-200
                    px-4 py-3">

            <p class="font-semibold text-red-700 mb-2">
                Please fix the following errors:
            </p>

            <ul class="list-disc list-inside text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.users.store') }}"
          method="POST">

        @csrf

        <div class="bg-white rounded-xl
                    shadow-sm
                    border border-gray-200">


            {{-- User Information --}}
            <div class="p-6">

                <h2 class="text-lg font-semibold text-gray-800 mb-5">
                    User Information
                </h2>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Name --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Name <span class="text-red-500">*</span>

                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                               placeholder="Enter user name"
                               class="w-full rounded-lg
                                      border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Email <span class="text-red-500">*</span>

                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               placeholder="user@example.com"
                               class="w-full rounded-lg
                                      border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Password <span class="text-red-500">*</span>

                        </label>

                        <input type="password"
                               name="password"
                               required
                               placeholder="Minimum 8 characters"
                               class="w-full rounded-lg
                                      border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                        @error('password')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Confirm Password --}}
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-700 mb-2">

                            Confirm Password <span class="text-red-500">*</span>

                        </label>

                        <input type="password"
                               name="password_confirmation"
                               required
                               placeholder="Confirm password"
                               class="w-full rounded-lg
                                      border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500">

                    </div>

                </div>

            </div>


            {{-- Access Assignment --}}
            <div class="p-6 border-t border-gray-200">

                <h2 class="text-lg font-semibold text-gray-800">
                    Company & Branch Access
                </h2>

                <p class="text-sm text-gray-500 mt-1 mb-5">
                    Assign this user to a company and branch.
                </p>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Company --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Company

                        </label>

                        <select name="company_id"
                                id="company_id"
                                class="w-full rounded-lg
                                       border-gray-300
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
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Branch --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Branch

                        </label>

                        <select name="branch_id"
                                id="branch_id"
                                class="w-full rounded-lg
                                       border-gray-300
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
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col sm:flex-row
                        sm:justify-end gap-3
                        px-6 py-4
                        bg-gray-50
                        border-t border-gray-200">

                <a href="{{ route('admin.users.index') }}"
                   class="px-5 py-2.5 text-center
                          bg-white
                          border border-gray-300
                          text-gray-700
                          rounded-lg
                          hover:bg-gray-50">

                    Cancel

                </a>

                <button type="submit"
                        class="px-5 py-2.5
                               bg-indigo-600
                               text-white
                               rounded-lg
                               hover:bg-indigo-700">

                    Create User

                </button>

            </div>

        </div>

    </form>

</div>


{{-- Company → Branch Filter --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const company = document.getElementById('company_id');
    const branch = document.getElementById('branch_id');

    function filterBranches() {

        const companyId = company.value;

        Array.from(branch.options).forEach(function (option) {

            if (!option.value) {
                option.hidden = false;
                return;
            }

            option.hidden = option.dataset.company !== companyId;

        });

        if (
            branch.value &&
            branch.selectedOptions[0]?.dataset.company !== companyId
        ) {
            branch.value = '';
        }
    }

    company.addEventListener('change', filterBranches);

    filterBranches();

});

</script>

@endsection