@extends('admin.layouts.app') @section('title', 'Companies | rPos') @section('page-title', 'Companies')
@section('content')

<div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">
    {{-- ========================================================= PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Companies</h2>

            <p class="text-sm text-gray-500 mt-1">Manage your companies and company information.</p>
        </div>

        {{-- Add Company --}}

        <a
            href="{{ route('admin.companies.create') }}"
            class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-4 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition"
        >
            <span class="text-lg leading-none"> + </span>

            Add Company
        </a>
    </div>

    {{-- ========================================================= SUCCESS MESSAGE
    ========================================================== --}} @if(session('success'))

    <div class="mb-5 flex items-start gap-3 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-green-700">
        <div class="flex-1 text-sm">{{ session('success') }}</div>
    </div>

    @endif {{-- ========================================================= ERROR MESSAGE
    ========================================================== --}} @if(session('error'))

    <div class="mb-5 flex items-start gap-3 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-red-700">
        <div class="flex-1 text-sm">{{ session('error') }}</div>
    </div>

    @endif {{-- ========================================================= COMPANY LIST CARD
    ========================================================== --}}

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        {{-- ===================================================== CARD HEADER
        ====================================================== --}}

        <div
            class="px-4 sm:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3"
        >
            <div>
                <h3 class="text-base font-semibold text-gray-800">Company List</h3>

                <p class="text-xs text-gray-500 mt-0.5">All registered companies</p>
            </div>

            {{-- Total --}}

            <div class="text-sm text-gray-500">
                Total:

                <span class="font-semibold text-gray-800"> {{ $companies->total() }} </span>
            </div>
        </div>

        {{-- ===================================================== DESKTOP TABLE
        ====================================================== --}}

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-sm text-left">
                {{-- Table Header --}}

                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">#</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">Company</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">Code</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">Phone</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">Email</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 whitespace-nowrap">Status</th>

                        <th class="px-5 lg:px-6 py-4 font-semibold text-gray-600 text-right whitespace-nowrap">
                            Action
                        </th>
                    </tr>
                </thead>

                {{-- Table Body --}}

                <tbody class="divide-y divide-gray-100">
                    @forelse($companies as $company)

                    <tr class="hover:bg-gray-50 transition">
                        {{-- Number --}}

                        <td class="px-5 lg:px-6 py-4 text-gray-500">{{ $companies->firstItem() + $loop->index }}</td>

                        {{-- Company --}}

                        <td class="px-5 lg:px-6 py-4">
                            <div class="flex items-center gap-3">
                                {{-- Logo --}} @if($company->logo)

                                <img
                                    src="{{ asset('storage/' . $company->logo) }}"
                                    class="w-10 h-10 rounded-lg object-cover border border-gray-200 shrink-0"
                                    alt="{{ $company->name }}"
                                />

                                @else

                                <div
                                    class="w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold shrink-0"
                                >
                                    {{ strtoupper(substr($company->name, 0, 1)) }}
                                </div>

                                @endif

                                <div class="min-w-0">
                                    <div class="font-semibold text-gray-800 truncate max-w-[220px]">
                                        {{ $company->name }}
                                    </div>

                                    <div class="text-xs text-gray-500 truncate max-w-[220px]">
                                        {{ $company->website ?? 'No website' }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- Code --}}

                        <td class="px-5 lg:px-6 py-4">
                            <span class="font-medium text-gray-700"> {{ $company->code }} </span>
                        </td>

                        {{-- Phone --}}

                        <td class="px-5 lg:px-6 py-4 text-gray-600">{{ $company->phone ?? '—' }}</td>

                        {{-- Email --}}

                        <td class="px-5 lg:px-6 py-4">
                            <span class="text-gray-600 break-all"> {{ $company->email ?? '—' }} </span>
                        </td>

                        {{-- Status --}}

                        <td class="px-5 lg:px-6 py-4">
                            @if($company->status)

                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700"
                            >
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"> </span>

                                Active
                            </span>

                            @else

                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700"
                            >
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"> </span>

                                Inactive
                            </span>

                            @endif
                        </td>

                        {{-- Actions --}}

                        <td class="px-5 lg:px-6 py-4">
                            <div class="flex justify-end items-center gap-2">
                                {{-- View --}}

                                <a
                                    href="{{ route('admin.companies.show', $company) }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition"
                                >
                                    View
                                </a>

                                {{-- Edit --}}

                                <a
                                    href="{{ route('admin.companies.edit', $company) }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition"
                                >
                                    Edit
                                </a>

                                {{-- Delete --}}

                                <form
                                    action="{{ route('admin.companies.destroy', $company) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this company?')"
                                >
                                    @csrf @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center text-2xl mb-3"
                                >
                                    🏢
                                </div>

                                <h3 class="text-sm font-semibold text-gray-800">No companies found</h3>

                                <p class="text-xs text-gray-500 mt-1">Start by adding your first company.</p>

                                <a
                                    href="{{ route('admin.companies.create') }}"
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-700"
                                >
                                    + Add Company
                                </a>
                            </div>
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ===================================================== MOBILE CARD VIEW
        ====================================================== --}}

        <div class="md:hidden divide-y divide-gray-100">
            @forelse($companies as $company)

            <div class="p-4 hover:bg-gray-50 transition">
                {{-- Company Top --}}

                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        {{-- Logo --}} @if($company->logo)

                        <img
                            src="{{ asset('storage/' . $company->logo) }}"
                            class="w-11 h-11 rounded-lg object-cover border border-gray-200 shrink-0"
                            alt="{{ $company->name }}"
                        />

                        @else

                        <div
                            class="w-11 h-11 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold shrink-0"
                        >
                            {{ strtoupper(substr($company->name, 0, 1)) }}
                        </div>

                        @endif

                        <div class="min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">{{ $company->name }}</h3>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Code:
                                <span class="font-medium"> {{ $company->code }} </span>
                            </p>
                        </div>
                    </div>

                    {{-- Status --}} @if($company->status)

                    <span
                        class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-semibold bg-green-100 text-green-700 shrink-0"
                    >
                        Active
                    </span>

                    @else

                    <span
                        class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-semibold bg-red-100 text-red-700 shrink-0"
                    >
                        Inactive
                    </span>

                    @endif
                </div>

                {{-- Company Details --}}

                <div class="mt-4 grid grid-cols-1 gap-2">
                    {{-- Phone --}}

                    <div class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-gray-500"> Phone </span>

                        <span class="font-medium text-gray-700 text-right"> {{ $company->phone ?? '—' }} </span>
                    </div>

                    {{-- Email --}}

                    <div class="flex items-start justify-between gap-3 text-sm">
                        <span class="text-gray-500 shrink-0"> Email </span>

                        <span class="font-medium text-gray-700 text-right break-all">
                            {{ $company->email ?? '—' }}
                        </span>
                    </div>

                    {{-- Website --}}

                    <div class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-gray-500"> Website </span>

                        <span class="font-medium text-gray-700 text-right truncate">
                            {{ $company->website ?? '—' }}
                        </span>
                    </div>
                </div>

                {{-- Mobile Actions --}}

                <div class="grid grid-cols-3 gap-2 mt-4">
                    {{-- View --}}

                    <a
                        href="{{ route('admin.companies.show', $company) }}"
                        class="inline-flex items-center justify-center px-3 py-2 bg-gray-100 text-gray-700 text-xs font-semibold rounded-lg hover:bg-gray-200 transition"
                    >
                        View
                    </a>

                    {{-- Edit --}}

                    <a
                        href="{{ route('admin.companies.edit', $company) }}"
                        class="inline-flex items-center justify-center px-3 py-2 bg-blue-50 text-blue-700 text-xs font-semibold rounded-lg hover:bg-blue-100 transition"
                    >
                        Edit
                    </a>

                    {{-- Delete --}}

                    <form
                        action="{{ route('admin.companies.destroy', $company) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this company?')"
                    >
                        @csrf @method('DELETE')

                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center px-3 py-2 bg-red-50 text-red-700 text-xs font-semibold rounded-lg hover:bg-red-100 transition"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            @empty

            <div class="px-6 py-16 text-center">
                <div class="w-14 h-14 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-2xl mb-3">
                    🏢
                </div>

                <h3 class="text-sm font-semibold text-gray-800">No companies found</h3>

                <p class="text-xs text-gray-500 mt-1">Start by adding your first company.</p>
            </div>

            @endforelse
        </div>

        {{-- ===================================================== PAGINATION
        ====================================================== --}} @if($companies->hasPages())

        <div class="px-4 sm:px-6 py-4 border-t border-gray-200 overflow-x-auto">{{ $companies->links() }}</div>

        @endif
    </div>
</div>

@endsection
