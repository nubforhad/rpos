<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield('title', 'rPos')</title>

        {{-- Tailwind CDN --}}
        <script src="https://cdn.tailwindcss.com"></script>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: "#eef2ff",
                                100: "#e0e7ff",
                                200: "#c7d2fe",
                                300: "#a5b4fc",
                                400: "#818cf8",
                                500: "#6366f1",
                                600: "#4f46e5",
                                700: "#4338ca",
                                800: "#3730a3",
                                900: "#312e81",
                            },
                        },
                    },
                },
            };
        </script>

        {{-- Vite disabled for now --}} {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @stack('styles')
    </head>

    <body class="bg-gray-100 text-gray-800 antialiased">
        <div class="min-h-screen">
            {{-- ===== == MOBILE OVERLAY == --}}

            <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/50 hidden lg:hidden"></div>

            {{-- === === SIDEBAR ===== --}}

            <aside
                id="sidebar"
                class="fixed top-0 left-0 z-50 w-64 h-screen bg-slate-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col"
            >
                {{-- =====  LOGO ===== --}}

                <div class="h-16 flex items-center justify-between px-5 border-b border-slate-700 shrink-0">
                    <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3">
                        <div
                            class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center font-bold text-white"
                        >
                            r
                        </div>

                        <div>
                            <div class="text-lg font-bold">rPos</div>

                            <div class="text-[10px] uppercase tracking-wider text-slate-400">Point of Sale</div>
                        </div>
                    </a>

                    {{-- Mobile Close --}}

                    <button
                        id="sidebar-close"
                        type="button"
                        class="lg:hidden w-8 h-8 rounded-lg hover:bg-slate-800 flex items-center justify-center text-slate-300"
                    >
                        ✕
                    </button>
                </div>

                {{-- ===== = USER MINI PROFILE ==== --}} @auth

                <div class="px-4 py-4 border-b border-slate-700">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center font-bold shrink-0"
                        >
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>

                            <p class="text-xs text-slate-400 truncate">
                                {{ auth()->user()->getRoleNames()->first() ?? 'User' }}
                            </p>
                        </div>
                    </div>
                </div>

                @endauth {{-- == = NAVIGATION == --}}

                <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
                    {{-- Dashboard --}}

                    <a
                        href="{{ url('/admin/dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🏠 </span>

                        <span> Dashboard </span>
                    </a>

                    {{-- ================================================= MASTER DATA
                    ================================================== --}}

                    <div class="pt-5 pb-2 px-3">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Master Data</p>
                    </div>

                    {{-- Company --}}

                    <a
                        href="{{ route('admin.companies.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🏢 </span>

                        <span> Companies </span>
                    </a>

                    {{-- Branch --}}

                    <a
                        href="{{ route('admin.branches.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🏪 </span>

                        <span> Branches </span>
                    </a>

                    {{-- Users --}}

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 👤 </span>

                        <span> Users </span>
                    </a>

                    {{-- Roles --}}

                    <a
                        href="{{ route('admin.roles.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🔐 </span>

                        <span> Roles & Permissions </span>
                    </a>

                    {{-- ================================================= INVENTORY
                    ================================================== --}}

                    <div class="pt-5 pb-2 px-3">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Inventory</p>
                    </div>

                    {{-- Categories --}}

                    <a  href="{{ route('admin.product-categories.index')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <span class="w-5 text-center"> 🗂️ </span>
                        <span> Categories </span>
                    </a>

                    {{-- Products --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 📦 </span>

                        <span> Products </span>
                    </a>

                    {{-- Suppliers --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🚚 </span>

                        <span> Suppliers </span>
                    </a>

                    {{-- ================================================= SALES
                    ================================================== --}}

                    <div class="pt-5 pb-2 px-3">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Sales</p>
                    </div>

                    {{-- POS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🛒 </span>

                        <span> POS </span>
                    </a>

                    {{-- Customers --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 👥 </span>

                        <span> Customers </span>
                    </a>

                    {{-- ================================================= PURCHASE
                    ================================================== --}}

                    <div class="pt-5 pb-2 px-3">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Purchase</p>
                    </div>

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 🧾 </span>

                        <span> Purchases </span>
                    </a>

                    {{-- ================================================= REPORTS
                    ================================================== --}}

                    <div class="pt-5 pb-2 px-3">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Reports</p>
                    </div>

                    <a
                        href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition"
                    >
                        <span class="w-5 text-center"> 📊 </span>

                        <span> Reports </span>
                    </a>
                </nav>

                {{-- ===================================================== SIDEBAR FOOTER
                ====================================================== --}}

                <div class="p-3 border-t border-slate-700 shrink-0">
                    @auth

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:bg-red-500/10 hover:text-red-400 transition"
                        >
                            <span class="w-5 text-center"> 🚪 </span>

                            <span> Logout </span>
                        </button>
                    </form>

                    @endauth
                </div>
            </aside>

            {{-- ========================================================= MAIN AREA
            ========================================================== --}}

            <div class="lg:ml-64">
                {{-- ===================================================== HEADER
                ====================================================== --}}

                <header class="sticky top-0 z-30 h-16 bg-white border-b border-gray-200 shadow-sm">
                    <div class="h-full px-4 sm:px-6 flex items-center justify-between">
                        {{-- Left --}}

                        <div class="flex items-center gap-3">
                            {{-- Mobile Menu Button --}}

                            <button
                                id="sidebar-open"
                                type="button"
                                class="lg:hidden w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-700"
                            >
                                ☰
                            </button>

                            {{-- Page Title --}}

                            <div>
                                <h1 class="text-lg sm:text-xl font-bold text-gray-800">
                                    @yield('page-title', 'Dashboard')
                                </h1>

                                <p class="hidden sm:block text-xs text-gray-500">rPos Management System</p>
                            </div>
                        </div>

                        {{-- Right --}}

                        <div class="flex items-center gap-2 sm:gap-4">
                            {{-- Notifications --}}

                            <button
                                type="button"
                                class="relative w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center"
                            >
                                🔔

                                <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-red-500"> </span>
                            </button>

                            {{-- User --}} @auth

                            <div class="hidden sm:flex items-center gap-3">
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>

                                    <p class="text-xs text-gray-500">
                                        {{ auth()->user()->getRoleNames()->first() ?? 'User' }}
                                    </p>
                                </div>

                                <div
                                    class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold"
                                >
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            </div>

                            @endauth
                        </div>
                    </div>
                </header>

                {{-- ===================================================== PAGE CONTENT
                ====================================================== --}}

                <main class="min-h-[calc(100vh-4rem)]">@yield('content')</main>
            </div>
        </div>

        {{-- ============================================================= SIDEBAR JAVASCRIPT
        ============================================================= --}}

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const sidebar = document.getElementById("sidebar");

                const overlay = document.getElementById("sidebar-overlay");

                const openButton = document.getElementById("sidebar-open");

                const closeButton = document.getElementById("sidebar-close");

                function openSidebar() {
                    sidebar.classList.remove("-translate-x-full");

                    overlay.classList.remove("hidden");

                    document.body.classList.add("overflow-hidden");
                }

                function closeSidebar() {
                    sidebar.classList.add("-translate-x-full");

                    overlay.classList.add("hidden");

                    document.body.classList.remove("overflow-hidden");
                }

                openButton?.addEventListener("click", openSidebar);

                closeButton?.addEventListener("click", closeSidebar);

                overlay?.addEventListener("click", closeSidebar);

                /*
    |--------------------------------------------------------------------------
    | Close sidebar after clicking a link on mobile
    |--------------------------------------------------------------------------
    */

                sidebar.querySelectorAll("a").forEach(function (link) {
                    link.addEventListener("click", function () {
                        if (window.innerWidth < 1024) {
                            closeSidebar();
                        }
                    });
                });

                /*
    |--------------------------------------------------------------------------
    | Reset mobile sidebar when resizing
    |--------------------------------------------------------------------------
    */

                window.addEventListener("resize", function () {
                    if (window.innerWidth >= 1024) {
                        overlay.classList.add("hidden");

                        document.body.classList.remove("overflow-hidden");
                    }
                });
            });
        </script>

        @stack('scripts')
    </body>
</html>
