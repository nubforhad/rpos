@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Company
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Update company information
            </p>
        </div>

        <a href="{{ route('admin.companies.index') }}"
           class="inline-flex items-center justify-center px-4 py-2.5
                  bg-gray-100 text-gray-700 rounded-lg
                  hover:bg-gray-200 transition">
            ← Back
        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-4 py-3">

            <div class="font-semibold text-red-700 mb-2">
                Please fix the following errors:
            </div>

            <ul class="list-disc list-inside text-sm text-red-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form action="{{ route('admin.companies.update', $company) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="bg-white rounded-xl shadow-sm border border-gray-200">

            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    {{-- Company Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Company Name <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $company->name) }}"
                               required
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="Enter company name">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Company Code --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Company Code <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ old('code', $company->code) }}"
                               required
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="e.g. COMP001">

                        @error('code')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Phone
                        </label>

                        <input type="text"
                               name="phone"
                               value="{{ old('phone', $company->phone) }}"
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="Phone number">

                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $company->email) }}"
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="company@example.com">

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Website --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Website
                        </label>

                        <input type="url"
                               name="website"
                               value="{{ old('website', $company->website) }}"
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="https://example.com">

                        @error('website')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Tax Number --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tax / VAT Number
                        </label>

                        <input type="text"
                               name="tax_number"
                               value="{{ old('tax_number', $company->tax_number) }}"
                               class="w-full rounded-lg border-gray-300
                                      focus:border-indigo-500
                                      focus:ring-indigo-500"
                               placeholder="Tax / VAT number">

                        @error('tax_number')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Logo --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Company Logo
                        </label>

                        <div class="flex flex-col sm:flex-row gap-5 items-start">

                            @if($company->logo)

                                <div>
                                    <p class="text-xs text-gray-500 mb-2">
                                        Current Logo
                                    </p>

                                    <img src="{{ asset('storage/' . $company->logo) }}"
                                         alt="{{ $company->name }}"
                                         class="w-20 h-20 object-cover rounded-xl border border-gray-200">
                                </div>

                            @endif

                            <div class="flex-1 w-full">

                                <input type="file"
                                       name="logo"
                                       accept="image/*"
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2">

                                <p class="text-xs text-gray-500 mt-1">
                                    JPG, JPEG, PNG or WEBP. Maximum 2MB.
                                </p>

                            </div>

                        </div>

                        @error('logo')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Address --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Address
                        </label>

                        <textarea name="address"
                                  rows="4"
                                  class="w-full rounded-lg border-gray-300
                                         focus:border-indigo-500
                                         focus:ring-indigo-500"
                                  placeholder="Company address">{{ old('address', $company->address) }}</textarea>

                        @error('address')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="md:col-span-2">

                        <label class="inline-flex items-center gap-2 cursor-pointer">

                            <input type="checkbox"
                                   name="status"
                                   value="1"
                                   {{ old('status', $company->status) ? 'checked' : '' }}
                                   class="rounded border-gray-300
                                          text-indigo-600
                                          focus:ring-indigo-500">

                            <span class="text-sm text-gray-700">
                                Active Company
                            </span>

                        </label>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col sm:flex-row sm:justify-end gap-3
                        px-6 py-4 bg-gray-50 border-t border-gray-200">

                <a href="{{ route('admin.companies.show', $company) }}"
                   class="px-5 py-2.5 text-center bg-white
                          border border-gray-300 text-gray-700
                          rounded-lg hover:bg-gray-50">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600
                               text-white rounded-lg
                               hover:bg-indigo-700 transition">
                    Update Company
                </button>

            </div>

        </div>

    </form>

</div>

@endsection