@extends('admin.layouts.app')

@section('content')

<div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Companies
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Manage your companies
            </p>
        </div>

        <a href="{{ route('admin.companies.create') }}"
           class="inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">

            + Add Company

        </a>

    </div>

    @if(session('success'))
        <div class="mb-5 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-600">#</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Company</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Code</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Phone</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-right">Action</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($companies as $company)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $companies->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    @if($company->logo)
                                        <img
                                            src="{{ asset('storage/' . $company->logo) }}"
                                            class="w-10 h-10 rounded-lg object-cover border"
                                            alt="{{ $company->name }}"
                                        >
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                                            {{ strtoupper(substr($company->name, 0, 1)) }}
                                        </div>
                                    @endif

                                    <div>
                                        <div class="font-semibold text-gray-800">
                                            {{ $company->name }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $company->website ?? '—' }}
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $company->code }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $company->phone ?? '—' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $company->email ?? '—' }}
                            </td>

                            <td class="px-6 py-4">

                                @if($company->status)

                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end items-center gap-2">

                                    <a href="{{ route('admin.companies.show', $company) }}"
                                       class="px-3 py-1.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                        View
                                    </a>

                                    <a href="{{ route('admin.companies.edit', $company) }}"
                                       class="px-3 py-1.5 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.companies.destroy', $company) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this company?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No companies found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($companies->hasPages())

            <div class="px-6 py-4 border-t border-gray-200">
                {{ $companies->links() }}
            </div>

        @endif

    </div>

</div>

@endsection