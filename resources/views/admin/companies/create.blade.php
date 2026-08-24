@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Add Company
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Create a new company
        </p>

    </div>

    @if($errors->any())

        <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-4 py-3">

            <ul class="list-disc list-inside text-sm text-red-700">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('admin.companies.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Company Name *
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Enter company name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Company Code *
                    </label>

                    <input type="text"
                           name="code"
                           value="{{ old('code') }}"
                           required
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="e.g. COMP001">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           value="{{ old('phone') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Phone number">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="company@example.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Website
                    </label>

                    <input type="url"
                           name="website"
                           value="{{ old('website') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="https://example.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tax Number
                    </label>

                    <input type="text"
                           name="tax_number"
                           value="{{ old('tax_number') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Tax/VAT number">
                </div>

                <div class="md:col-span-2">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Logo
                    </label>

                    <input type="file"
                           name="logo"
                           accept="image/*"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2">

                </div>

                <div class="md:col-span-2">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Address
                    </label>

                    <textarea name="address"
                              rows="3"
                              class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                              placeholder="Company address">{{ old('address') }}</textarea>

                </div>

                <div class="md:col-span-2">

                    <label class="inline-flex items-center gap-2">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               checked
                               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

                        <span class="text-sm text-gray-700">
                            Active Company
                        </span>

                    </label>

                </div>

            </div>

            <div class="flex justify-end gap-3 mt-6 pt-5 border-t">

                <a href="{{ route('admin.companies.index') }}"
                   class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create Company
                </button>

            </div>

        </div>

    </form>

</div>

@endsection