<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'rPos')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen">

        {{-- Navbar --}}
        <header class="bg-white border-b border-gray-200">

            <div class="max-w-screen-2xl mx-auto
                        px-4 sm:px-6 lg:px-8">

                <div class="h-16 flex items-center
                            justify-between">

                    {{-- Logo --}}
                    <a href="{{ url('/admin/dashboard') }}"
                       class="text-xl font-bold
                              text-indigo-600">

                        rPos

                    </a>


                    {{-- User --}}
                    @auth

                        <div class="flex items-center gap-3">

                            <div class="text-right hidden sm:block">

                                <p class="text-sm font-semibold
                                          text-gray-800">

                                    {{ auth()->user()->name }}

                                </p>

                                <p class="text-xs text-gray-500">

                                    {{ auth()->user()->email }}

                                </p>

                            </div>


                            <div class="w-9 h-9 rounded-full
                                        bg-indigo-100
                                        text-indigo-700
                                        flex items-center
                                        justify-center
                                        font-bold">

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            </div>

                        </div>

                    @endauth

                </div>

            </div>

        </header>


        {{-- Main Content --}}
        <main>

            @yield('content')

        </main>

    </div>


    @stack('scripts')

</body>

</html>