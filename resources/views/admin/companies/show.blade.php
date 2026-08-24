@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Company Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View company information
            </p>
        </div>

        <div class="flex flex-wrap gap-2">

            <a href="{{ route('admin.companies.index') }}"
               class="px-4 py-2.5 bg-gray-100 text-gray-700
                      rounded-lg hover:bg-gray-200">
                ← Back
            </a>

            <a href="{{ route('admin.companies.edit', $company) }}"
               class="px-4 py-2.5 bg-indigo-600 text-white
                      rounded-lg hover:bg-indigo-700">
                Edit Company
            </a>

        </div>

    </div>


    {{-- Company Header --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="p-6">

            <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                {{-- Logo --}}
                <div>

                    @if($company->logo)

                        <img src="{{ asset('storage/' . $company->logo) }}"
                             alt="{{ $company->name }}"
                             class="w-24 h-24 rounded-2xl object-cover
                                    border border-gray-200">

                    @else

                        <div class="w-24 h-24 rounded-2xl
                                    bg-indigo-100 text-indigo-600
                                    flex items-center justify-center
                                    text-3xl font-bold">

                            {{ strtoupper(substr($company->name, 0, 1)) }}

                        </div>

                    @endif

                </div>


                {{-- Name --}}
                <div class="flex-1">

                    <div class="flex flex-wrap items-center gap-3">

                        <h2 class="text-2xl font-bold text-gray-800">
                            {{ $company->name }}
                        </h2>

                        @if($company->status)

                            <span class="px-3 py-1 rounded-full
                                         text-xs font-semibold
                                         bg-green-100 text-green-700">
                                Active
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full
                                         text-xs font-semibold
                                         bg-red-100 text-red-700">
                                Inactive
                            </span>

                        @endif

                    </div>

                    <p class="text-gray-500 mt-1">
                        Company Code:
                        <span class="font-semibold text-gray-700">
                            {{ $company->code }}
                        </span>
                    </p>

                </div>

            </div>

        </div>


        {{-- Information --}}
        <div class="border-t border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-2">

                {{-- Phone --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Phone
                    </p>

                    <p class="mt-2 text-gray-800 font-medium">
                        {{ $company->phone ?: 'Not provided' }}
                    </p>

                </div>


                {{-- Email --}}
                <div class="p-6 border-b border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Email
                    </p>

                    <p class="mt-2 text-gray-800 font-medium break-all">
                        {{ $company->email ?: 'Not provided' }}
                    </p>

                </div>


                {{-- Website --}}
                <div class="p-6 border-b md:border-r border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Website
                    </p>

                    @if($company->website)

                        <a href="{{ $company->website }}"
                           target="_blank"
                           class="mt-2 inline-block text-indigo-600
                                  hover:text-indigo-700 break-all">
                            {{ $company->website }}
                        </a>

                    @else

                        <p class="mt-2 text-gray-800">
                            Not provided
                        </p>

                    @endif

                </div>


                {{-- Tax --}}
                <div class="p-6 border-b border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Tax / VAT Number
                    </p>

                    <p class="mt-2 text-gray-800 font-medium">
                        {{ $company->tax_number ?: 'Not provided' }}
                    </p>

                </div>


                {{-- Address --}}
                <div class="p-6 md:col-span-2 border-b border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Address
                    </p>

                    <p class="mt-2 text-gray-800 whitespace-pre-line">
                        {{ $company->address ?: 'Not provided' }}
                    </p>

                </div>


                {{-- Created --}}
                <div class="p-6 md:border-r border-gray-200">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Created At
                    </p>

                    <p class="mt-2 text-gray-800 font-medium">
                        {{ $company->created_at?->format('d M Y, h:i A') }}
                    </p>

                </div>


                {{-- Updated --}}
                <div class="p-6">

                    <p class="text-xs uppercase tracking-wide
                              text-gray-400 font-semibold">
                        Last Updated
                    </p>

                    <p class="mt-2 text-gray-800 font-medium">
                        {{ $company->updated_at?->format('d M Y, h:i A') }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Branch Summary --}}
    <div class="mt-6 bg-white rounded-xl shadow-sm
                border border-gray-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-lg font-semibold text-gray-800">
                    Branches
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Branches belonging to this company
                </p>

            </div>

            <div class="text-2xl font-bold text-indigo-600">
                {{ $company->branches->count() }}
            </div>

        </div>

        <div class="mt-5 p-4 rounded-lg bg-gray-50
                    border border-gray-200">

            <p class="text-sm text-gray-500">
                Branch management will be available after the
                Branch module is completed.
            </p>

        </div>

    </div>

</div>

@endsection