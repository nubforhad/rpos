@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Add Branch
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Create a new branch for your company
            </p>
        </div>

        <a href="{{ route('admin.branches.index') }}"
           class="inline-flex items-center justify-center
                  px-4 py-2.5
                  bg-gray-100
                  text-gray-700
                  rounded-lg
                  hover:bg-gray-200
                  transition">

            ← Back

        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-5 rounded-lg
                    bg-red-50
                    border border-red-200
                    px-4 py-3">

            <div class="font-semibold text-red-700 mb-2">
                Please fix the following errors:
            </div>

            <ul class="list-disc list-inside
                       text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Create Form --}}
    <form action="{{ route('admin.branches.store') }}"
          method="POST">

        @csrf

        <div class="bg-white
                    rounded-xl
                    shadow-sm
                    border border-gray-200">


            {{-- Form Body --}}
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Company --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Company <span class="text-red-500">*</span>

                        </label>

                        <select
                            name="company_id"
                            required
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500">

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

                            <p class="mt-1 text-sm text-red-600">
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

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Branch Name <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500"
                            placeholder="Enter branch name"
                        >

                        @error('name')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Branch Code --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Branch Code <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="code"
                            value="{{ old('code') }}"
                            required
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500"
                            placeholder="e.g. DHAKA01"
                        >

                        <p class="mt-1 text-xs text-gray-500">
                            Code must be unique within the selected company.
                        </p>

                        @error('code')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Phone --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Phone

                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500"
                            placeholder="Enter branch phone"
                        >

                        @error('phone')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500"
                            placeholder="branch@example.com"
                        >

                        @error('email')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Opening Balance --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Opening Balance

                        </label>

                        <div class="relative">

                            <span class="absolute
                                         left-3 top-1/2
                                         -translate-y-1/2
                                         text-gray-500
                                         font-medium">

                                ৳

                            </span>

                            <input
                                type="number"
                                name="opening_balance"
                                value="{{ old('opening_balance', 0) }}"
                                min="0"
                                step="0.01"
                                class="w-full rounded-lg
                                       border-gray-300
                                       pl-8
                                       focus:border-indigo-500
                                       focus:ring-indigo-500"
                                placeholder="0.00"
                            >

                        </div>

                        @error('opening_balance')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div>

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Status

                        </label>

                        <div class="flex items-center gap-3
                                    min-h-[42px]">

                            <label class="inline-flex
                                          items-center
                                          gap-2
                                          cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    {{ old('status', true) ? 'checked' : '' }}
                                    class="rounded
                                           border-gray-300
                                           text-indigo-600
                                           focus:ring-indigo-500"
                                >

                                <span class="text-sm
                                             font-medium
                                             text-gray-700">

                                    Active Branch

                                </span>

                            </label>

                        </div>

                        @error('status')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Address --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm
                                      font-medium
                                      text-gray-700 mb-2">

                            Branch Address

                        </label>

                        <textarea
                            name="address"
                            rows="4"
                            class="w-full rounded-lg
                                   border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-indigo-500"
                            placeholder="Enter branch address"
                        >{{ old('address') }}</textarea>

                        @error('address')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col
                        sm:flex-row
                        sm:justify-end
                        gap-3
                        px-6 py-4
                        bg-gray-50
                        border-t border-gray-200">

                <a
                    href="{{ route('admin.branches.index') }}"
                    class="px-5 py-2.5
                           text-center
                           bg-white
                           border border-gray-300
                           text-gray-700
                           rounded-lg
                           hover:bg-gray-50
                           transition"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5
                           bg-indigo-600
                           text-white
                           rounded-lg
                           hover:bg-indigo-700
                           transition"
                >
                    Create Branch
                </button>

            </div>

        </div>

    </form>

</div>

@endsection