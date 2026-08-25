@extends('admin.layouts.app')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center
                            rounded-xl bg-indigo-100 text-indigo-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>

                    </svg>

                </div>

                <div>

                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                        Add Role
                    </h1>

                    <p class="text-sm text-gray-500 mt-0.5">
                        Create a role and assign permissions
                    </p>

                </div>

            </div>


            <a href="{{ route('admin.roles.index') }}"
               class="inline-flex items-center justify-center gap-2
                      w-full sm:w-auto
                      px-4 py-2.5
                      rounded-xl
                      border border-gray-300
                      bg-white
                      text-sm font-medium
                      text-gray-700
                      hover:bg-gray-50">

                ← Back

            </a>

        </div>

    </div>


    {{-- Errors --}}
    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200
                    bg-red-50 p-4">

            <ul class="list-disc list-inside
                       space-y-1 text-sm text-red-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.roles.store') }}"
          method="POST">

        @csrf

        <div class="overflow-hidden rounded-2xl
                    border border-gray-200
                    bg-white shadow-sm">


            {{-- Role Information --}}
            <div class="p-5 sm:p-6 lg:p-7">

                <h2 class="text-lg font-semibold text-gray-800">
                    Role Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Give the role a clear and unique name.
                </p>


                <div class="mt-5 max-w-xl">

                    <label for="name"
                           class="mb-2 block text-sm font-medium text-gray-700">

                        Role Name
                        <span class="text-red-500">*</span>

                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           placeholder="e.g. Manager"
                           class="block w-full rounded-xl
                                  border-gray-300
                                  px-4 py-2.5
                                  text-sm
                                  focus:border-indigo-500
                                  focus:ring-indigo-500">

                    @error('name')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- Permissions --}}
            <div class="border-t border-gray-200
                        p-5 sm:p-6 lg:p-7">

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between
                            gap-3 mb-5">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Permissions
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Select the permissions this role should have.
                        </p>
                    </div>

                    <button type="button"
                            id="selectAll"
                            class="text-sm font-medium text-indigo-600
                                   hover:text-indigo-700">
                        Select All
                    </button>

                </div>


                <div class="grid grid-cols-1
                            sm:grid-cols-2
                            lg:grid-cols-3
                            gap-3">

                    @foreach($permissions as $permission)

                        <label class="flex items-start gap-3
                                      rounded-xl
                                      border border-gray-200
                                      bg-gray-50
                                      p-3
                                      cursor-pointer
                                      hover:bg-indigo-50
                                      hover:border-indigo-200">

                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $permission->id }}"
                                   class="permission-checkbox
                                          mt-0.5
                                          rounded
                                          border-gray-300
                                          text-indigo-600
                                          focus:ring-indigo-500"
                                {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>

                            <span class="text-sm text-gray-700">
                                {{ $permission->name }}
                            </span>

                        </label>

                    @endforeach

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col-reverse sm:flex-row
                        sm:justify-end gap-3
                        border-t border-gray-200
                        bg-gray-50
                        px-5 sm:px-6 lg:px-7 py-4">

                <a href="{{ route('admin.roles.index') }}"
                   class="inline-flex justify-center
                          rounded-xl border border-gray-300
                          bg-white px-5 py-2.5
                          text-sm font-medium text-gray-700
                          hover:bg-gray-50">

                    Cancel

                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2
                               rounded-xl bg-indigo-600
                               px-5 py-2.5
                               text-sm font-semibold text-white
                               hover:bg-indigo-700">

                    Create Role

                </button>

            </div>

        </div>

    </form>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const selectAll = document.getElementById('selectAll');

    selectAll.addEventListener('click', function () {

        const checkboxes =
            document.querySelectorAll('.permission-checkbox');

        const allChecked =
            Array.from(checkboxes).every(
                checkbox => checkbox.checked
            );

        checkboxes.forEach(function (checkbox) {
            checkbox.checked = !allChecked;
        });

        selectAll.textContent =
            allChecked ? 'Select All' : 'Unselect All';
    });

});
</script>

@endsection