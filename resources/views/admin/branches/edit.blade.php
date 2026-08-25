@extends('admin.layouts.app')

@section('title', 'Edit Branch | rPos')

@section('content')

<div class="w-full">

    {{-- Page Container --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">

        {{-- Page Header --}}
        <div class="mb-6">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                {{-- Title --}}
                <div>

                    <div class="flex items-center gap-2 mb-1">

                        <a href="{{ route('admin.branches.index') }}"
                           class="text-gray-400 hover:text-indigo-600 transition">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>

                            </svg>

                        </a>

                        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                            Edit Branch
                        </h1>

                    </div>

                    <p class="text-sm text-gray-500">
                        Update information for
                        <span class="font-medium text-gray-700">
                            {{ $branch->name }}
                        </span>
                    </p>

                </div>


                {{-- Header Actions --}}
                <div class="flex flex-col sm:flex-row gap-2">

                    <a href="{{ route('admin.branches.show', $branch) }}"
                       class="inline-flex items-center justify-center gap-2
                              px-4 py-2.5
                              bg-white
                              border border-gray-200
                              text-gray-700
                              rounded-lg
                              text-sm font-medium
                              shadow-sm
                              hover:bg-gray-50
                              hover:border-gray-300
                              transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>

                        </svg>

                        View Branch

                    </a>

                    <a href="{{ route('admin.branches.index') }}"
                       class="inline-flex items-center justify-center gap-2
                              px-4 py-2.5
                              bg-gray-100
                              text-gray-700
                              rounded-lg
                              text-sm font-medium
                              hover:bg-gray-200
                              transition">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

                        </svg>

                        Back

                    </a>

                </div>

            </div>

        </div>


        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="mb-6 rounded-xl
                        border border-red-200
                        bg-red-50
                        p-4">

                <div class="flex items-start gap-3">

                    <div class="flex-shrink-0">

                        <div class="w-9 h-9
                                    rounded-full
                                    bg-red-100
                                    text-red-600
                                    flex items-center
                                    justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                    </div>

                    <div class="min-w-0">

                        <h3 class="text-sm font-semibold text-red-800">
                            Please fix the following errors
                        </h3>

                        <ul class="mt-2 space-y-1 text-sm text-red-700">

                            @foreach($errors->all() as $error)

                                <li class="flex items-start gap-2">

                                    <span class="mt-1.5 w-1 h-1
                                                 rounded-full
                                                 bg-red-500
                                                 flex-shrink-0">
                                    </span>

                                    <span>
                                        {{ $error }}
                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- Main Card --}}
        <form action="{{ route('admin.branches.update', $branch) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="bg-white
                        rounded-xl
                        border border-gray-200
                        shadow-sm
                        overflow-hidden">


                {{-- Card Header --}}
                <div class="px-4 sm:px-6 py-5
                            border-b border-gray-200
                            bg-gradient-to-r
                            from-gray-50
                            to-white">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10
                                    rounded-lg
                                    bg-indigo-100
                                    text-indigo-600
                                    flex items-center
                                    justify-center">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 4h.01M14 15h.01"/>

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-base sm:text-lg font-semibold text-gray-800">
                                Branch Information
                            </h2>

                            <p class="text-xs sm:text-sm text-gray-500">
                                Update the branch details below
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form Body --}}
                <div class="p-4 sm:p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


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
                                class="w-full rounded-lg
                                       border border-gray-300
                                       bg-white
                                       px-3 py-2.5
                                       text-sm text-gray-800
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
                                        {{ old('company_id', $branch->company_id) == $company->id ? 'selected' : '' }}
                                    >

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
                                value="{{ old('name', $branch->name) }}"
                                required
                                autofocus
                                class="w-full rounded-lg
                                       border border-gray-300
                                       px-3 py-2.5
                                       text-sm
                                       shadow-sm
                                       outline-none
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                                placeholder="Enter branch name"
                            >

                            @error('name')

                                <p class="mt-1.5 text-xs text-red-600">
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
                                value="{{ old('code', $branch->code) }}"
                                required
                                class="w-full rounded-lg
                                       border border-gray-300
                                       px-3 py-2.5
                                       text-sm
                                       shadow-sm
                                       outline-none
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                                placeholder="e.g. DHAKA01"
                            >

                            <p class="mt-1.5 text-xs text-gray-500">
                                Must be unique within the selected company.
                            </p>

                            @error('code')

                                <p class="mt-1.5 text-xs text-red-600">
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
                                value="{{ old('phone', $branch->phone) }}"
                                class="w-full rounded-lg
                                       border border-gray-300
                                       px-3 py-2.5
                                       text-sm
                                       shadow-sm
                                       outline-none
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                                placeholder="Enter branch phone"
                            >

                            @error('phone')

                                <p class="mt-1.5 text-xs text-red-600">
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
                                value="{{ old('email', $branch->email) }}"
                                class="w-full rounded-lg
                                       border border-gray-300
                                       px-3 py-2.5
                                       text-sm
                                       shadow-sm
                                       outline-none
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                                placeholder="branch@example.com"
                            >

                            @error('email')

                                <p class="mt-1.5 text-xs text-red-600">
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
                                             left-3 top-1/2
                                             -translate-y-1/2
                                             text-gray-500
                                             font-semibold">

                                    ৳

                                </span>

                                <input
                                    id="opening_balance"
                                    type="number"
                                    name="opening_balance"
                                    value="{{ old('opening_balance', $branch->opening_balance) }}"
                                    min="0"
                                    step="0.01"
                                    class="w-full rounded-lg
                                           border border-gray-300
                                           pl-8 pr-3
                                           py-2.5
                                           text-sm
                                           shadow-sm
                                           outline-none
                                           focus:border-indigo-500
                                           focus:ring-2
                                           focus:ring-indigo-100
                                           transition"
                                    placeholder="0.00"
                                >

                            </div>

                            @error('opening_balance')

                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Status --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status
                            </label>

                            <div class="min-h-[42px]
                                        flex items-center
                                        rounded-lg
                                        border border-gray-200
                                        bg-gray-50
                                        px-3">

                                <label class="inline-flex
                                              items-center
                                              gap-3
                                              cursor-pointer">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        {{ old('status', $branch->status) ? 'checked' : '' }}
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

                                <p class="mt-1.5 text-xs text-red-600">
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
                                class="w-full rounded-lg
                                       border border-gray-300
                                       px-3 py-2.5
                                       text-sm
                                       shadow-sm
                                       outline-none
                                       resize-y
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-100
                                       transition"
                                placeholder="Enter branch address"
                            >{{ old('address', $branch->address) }}</textarea>

                            @error('address')

                                <p class="mt-1.5 text-xs text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="px-4 sm:px-6 py-4
                            bg-gray-50
                            border-t border-gray-200">

                    <div class="flex flex-col-reverse sm:flex-row
                                sm:justify-end
                                gap-3">

                        <a href="{{ route('admin.branches.show', $branch) }}"
                           class="w-full sm:w-auto
                                  inline-flex items-center justify-center
                                  px-5 py-2.5
                                  bg-white
                                  border border-gray-300
                                  text-gray-700
                                  rounded-lg
                                  text-sm font-medium
                                  hover:bg-gray-50
                                  transition">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center gap-2
                                   px-5 py-2.5
                                   bg-indigo-600
                                   text-white
                                   rounded-lg
                                   text-sm font-semibold
                                   shadow-sm
                                   hover:bg-indigo-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-200
                                   transition">

                            <svg class="w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                            Update Branch

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection