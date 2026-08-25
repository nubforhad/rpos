@extends('admin.layouts.app')

@section('title', 'Edit Company | rPos')

@section('page-title', 'Edit Company')

@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">


    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col sm:flex-row
                sm:items-center
                sm:justify-between
                gap-4 mb-6">

        <div>

            {{-- Breadcrumb --}}

            <div class="flex items-center gap-2 mb-1">

                <a href="{{ route('admin.companies.index') }}"
                   class="text-sm text-gray-500
                          hover:text-indigo-600
                          transition">

                    Companies

                </a>

                <span class="text-gray-400">
                    /
                </span>

                <span class="text-sm text-gray-700">
                    Edit
                </span>

            </div>


            <h2 class="text-xl sm:text-2xl
                       font-bold text-gray-800">

                Edit Company

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Update company information and settings.

            </p>

        </div>


        {{-- Back Button --}}

        <a href="{{ route('admin.companies.index') }}"
           class="w-full sm:w-auto
                  inline-flex items-center
                  justify-center gap-2
                  px-4 py-2.5
                  bg-white
                  border border-gray-300
                  text-gray-700
                  text-sm font-medium
                  rounded-lg
                  hover:bg-gray-50
                  hover:border-gray-400
                  transition">

            <span class="text-base">
                ←
            </span>

            Back to Companies

        </a>

    </div>



    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}

    @if($errors->any())

        <div class="mb-6
                    rounded-xl
                    bg-red-50
                    border border-red-200
                    p-4">

            <div class="flex items-start gap-3">

                <div class="w-8 h-8
                            rounded-full
                            bg-red-100
                            text-red-600
                            flex items-center
                            justify-center
                            font-bold
                            shrink-0">

                    !

                </div>

                <div class="min-w-0">

                    <h3 class="text-sm
                               font-semibold
                               text-red-800">

                        Please fix the following errors

                    </h3>

                    <ul class="mt-2
                               list-disc
                               list-inside
                               text-sm
                               text-red-600
                               space-y-1">

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



    {{-- =========================================================
         UPDATE FORM
    ========================================================== --}}

    <form action="{{ route('admin.companies.update', $company) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @method('PUT')


        <div class="bg-white
                    rounded-xl
                    shadow-sm
                    border border-gray-200
                    overflow-hidden">


            {{-- =================================================
                 FORM HEADER
            ================================================== --}}

            <div class="px-4 sm:px-6
                        py-4
                        border-b
                        border-gray-200">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-lg
                                bg-indigo-100
                                text-indigo-600
                                flex items-center
                                justify-center
                                shrink-0">

                        🏢

                    </div>

                    <div class="min-w-0">

                        <h3 class="text-base
                                   font-semibold
                                   text-gray-800">

                            Company Information

                        </h3>

                        <p class="text-xs
                                  text-gray-500
                                  mt-0.5
                                  truncate">

                            {{ $company->name }}

                        </p>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 FORM BODY
            ================================================== --}}

            <div class="p-4 sm:p-6">

                <div class="grid grid-cols-1
                            md:grid-cols-2
                            gap-5">


                    {{-- =================================================
                         COMPANY NAME
                    ================================================== --}}

                    <div>

                        <label for="name"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Company Name

                            <span class="text-red-500">
                                *
                            </span>

                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $company->name) }}"
                            required
                            autofocus
                            autocomplete="organization"
                            placeholder="Enter company name"
                            class="w-full rounded-lg border
                                   @error('name')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('name')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         COMPANY CODE
                    ================================================== --}}

                    <div>

                        <label for="code"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Company Code

                            <span class="text-red-500">
                                *
                            </span>

                        </label>

                        <input
                            id="code"
                            type="text"
                            name="code"
                            value="{{ old('code', $company->code) }}"
                            required
                            autocomplete="off"
                            placeholder="e.g. COMP001"
                            class="w-full rounded-lg border
                                   @error('code')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('code')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         PHONE
                    ================================================== --}}

                    <div>

                        <label for="phone"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Phone

                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', $company->phone) }}"
                            autocomplete="tel"
                            placeholder="Phone number"
                            class="w-full rounded-lg border
                                   @error('phone')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('phone')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         EMAIL
                    ================================================== --}}

                    <div>

                        <label for="email"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Email

                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $company->email) }}"
                            autocomplete="email"
                            placeholder="company@example.com"
                            class="w-full rounded-lg border
                                   @error('email')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('email')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         WEBSITE
                    ================================================== --}}

                    <div>

                        <label for="website"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Website

                        </label>

                        <input
                            id="website"
                            type="url"
                            name="website"
                            value="{{ old('website', $company->website) }}"
                            placeholder="https://example.com"
                            class="w-full rounded-lg border
                                   @error('website')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('website')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         TAX / VAT
                    ================================================== --}}

                    <div>

                        <label for="tax_number"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Tax / VAT Number

                        </label>

                        <input
                            id="tax_number"
                            type="text"
                            name="tax_number"
                            value="{{ old('tax_number', $company->tax_number) }}"
                            placeholder="Tax / VAT number"
                            class="w-full rounded-lg border
                                   @error('tax_number')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >

                        @error('tax_number')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         LOGO
                    ================================================== --}}

                    <div class="md:col-span-2">

                        <label for="logo"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Company Logo

                        </label>


                        <div class="rounded-xl
                                    border-2
                                    border-dashed
                                    border-gray-300
                                    p-4 sm:p-5
                                    hover:border-indigo-400
                                    transition">

                            <div class="flex flex-col
                                        sm:flex-row
                                        sm:items-center
                                        gap-5">


                                {{-- Current Logo --}}

                                @if($company->logo)

                                    <div class="shrink-0">

                                        <p class="text-xs
                                                  font-medium
                                                  text-gray-500
                                                  mb-2">

                                            Current Logo

                                        </p>

                                        <div class="relative
                                                    w-20 h-20">

                                            <img
                                                src="{{ asset('storage/' . $company->logo) }}"
                                                alt="{{ $company->name }}"
                                                class="w-20 h-20
                                                       object-cover
                                                       rounded-xl
                                                       border
                                                       border-gray-200"
                                            >

                                        </div>

                                    </div>

                                @else

                                    <div class="w-20 h-20
                                                rounded-xl
                                                bg-gray-100
                                                text-gray-400
                                                flex items-center
                                                justify-center
                                                text-xs
                                                text-center
                                                shrink-0">

                                        No Logo

                                    </div>

                                @endif


                                {{-- Upload --}}

                                <div class="flex-1 min-w-0 w-full">

                                    <input
                                        id="logo"
                                        type="file"
                                        name="logo"
                                        accept="image/jpeg,image/png,image/jpg,image/webp"
                                        class="block w-full
                                               text-sm
                                               text-gray-600
                                               file:mr-4
                                               file:py-2
                                               file:px-4
                                               file:rounded-lg
                                               file:border-0
                                               file:text-sm
                                               file:font-semibold
                                               file:bg-indigo-50
                                               file:text-indigo-700
                                               hover:file:bg-indigo-100
                                               cursor-pointer"
                                    >

                                    <p class="text-xs
                                              text-gray-500
                                              mt-2">

                                        Upload a new logo to replace
                                        the current logo.

                                        JPG, JPEG, PNG or WEBP.
                                        Maximum 2MB.

                                    </p>

                                </div>

                            </div>

                        </div>


                        @error('logo')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         ADDRESS
                    ================================================== --}}

                    <div class="md:col-span-2">

                        <label for="address"
                               class="block text-sm
                                      font-medium
                                      text-gray-700
                                      mb-2">

                            Address

                        </label>

                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            placeholder="Company address"
                            class="w-full rounded-lg border
                                   @error('address')
                                       border-red-400
                                   @else
                                       border-gray-300
                                   @enderror
                                   px-3.5 py-2.5
                                   text-sm text-gray-800
                                   placeholder-gray-400
                                   resize-y
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-indigo-500/20
                                   focus:border-indigo-500
                                   transition"
                        >{{ old('address', $company->address) }}</textarea>

                        @error('address')

                            <p class="mt-1.5
                                      text-xs text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- =================================================
                         STATUS
                    ================================================== --}}

                    <div class="md:col-span-2">

                        <div class="rounded-xl
                                    bg-gray-50
                                    border
                                    border-gray-200
                                    p-4">

                            <label class="flex
                                          items-start
                                          gap-3
                                          cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    {{ old('status', $company->status) ? 'checked' : '' }}
                                    class="mt-0.5
                                           w-4 h-4
                                           rounded
                                           border-gray-300
                                           text-indigo-600
                                           focus:ring-indigo-500"
                                >

                                <div>

                                    <span class="block
                                                 text-sm
                                                 font-semibold
                                                 text-gray-800">

                                        Active Company

                                    </span>

                                    <span class="block
                                                 text-xs
                                                 text-gray-500
                                                 mt-0.5">

                                        Active companies can be used
                                        throughout the rPos system.

                                    </span>

                                </div>

                            </label>

                        </div>

                    </div>


                </div>

            </div>



            {{-- =================================================
                 FORM FOOTER
            ================================================== --}}

            <div class="px-4 sm:px-6
                        py-4
                        bg-gray-50
                        border-t
                        border-gray-200">

                <div class="flex flex-col-reverse
                            sm:flex-row
                            sm:justify-end
                            gap-3">


                    {{-- Cancel --}}

                    <a href="{{ route('admin.companies.show', $company) }}"
                       class="w-full sm:w-auto
                              inline-flex
                              items-center
                              justify-center
                              px-5 py-2.5
                              bg-white
                              border border-gray-300
                              text-gray-700
                              text-sm
                              font-medium
                              rounded-lg
                              hover:bg-gray-50
                              transition">

                        Cancel

                    </a>


                    {{-- Update --}}

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
                               text-sm
                               font-semibold
                               rounded-lg
                               hover:bg-indigo-700
                               focus:outline-none
                               focus:ring-2
                               focus:ring-indigo-500
                               focus:ring-offset-2
                               transition">

                        <span>
                            ✓
                        </span>

                        Update Company

                    </button>

                </div>

            </div>


        </div>

    </form>

</div>

@endsection