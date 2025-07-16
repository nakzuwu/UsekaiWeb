<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Panel') | USEKAI ID</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ef4444',
                        dark: '#0A0A0A',
                        lightdark: '#0A0A0A',
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .logo-float {
            animation: float 3s ease-in-out infinite;
        }

        .glow-border {
            border: 2px solid #ff3d3d;
            box-shadow: 0 0 12px #ff3d3d;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #ef4444 #0A0A0A;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #ef4444;
            border-radius: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #0A0A0A;
        }
    </style>
</head>

<body class="bg-[#0A0A0A] text-white h-screen overflow-hidden">

    <!-- Wrapper flex container -->
    <div class="flex h-full">

        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-[#0A0A0A] glow-border rounded-2xl m-4 p-4 flex flex-col justify-between">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/usekai.png') }}" class="w-20 mb-6 logo-float" alt="USEKAI Logo">
                <nav class="w-full space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-4 py-2 rounded font-semibold text-white text-center
                        {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : 'border border-primary hover:bg-gray-800' }}">
                        🏠 Dashboard
                    </a>
                    <a href="{{ route('admin.blog.index') }}"
                        class="block px-4 py-2 rounded text-center text-white
                        {{ request()->routeIs('admin.blog.index') ? 'bg-primary' : 'border border-primary hover:bg-gray-800' }}">
                        📝 Blog
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col m-4 h-full">

            <!-- Navbar -->
            <header class="bg-[#0A0A0A] h-16 rounded-t-xl px-6 flex items-center justify-between glow-border">
                <h2 class="text-xl font-bold">@yield('header', 'Dashboard')</h2>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center space-x-2 bg-[#EF4444] hover:bg-red-600 px-4 py-2 rounded-lg transition text-white">
                        <span class="font-semibold">{{ auth('admin')->user()->username }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-40 bg-[#0A0A0A] rounded-lg shadow-lg py-2 z-50">
                        <a href="{{ route('admin.profile') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition">Edit Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-700 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main content (scrollable only this area) -->
            <main class="flex-1 overflow-y-auto p-6 bg-[#0A0A0A] glow-border rounded-b-xl mt-[-1px]">
                @if (session('success'))
                    <div class="bg-green-600 text-white px-4 py-2 rounded shadow mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
