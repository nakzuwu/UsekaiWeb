{{-- resources/views/layouts/admin.blade.php --}}
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
            dark: '#1f2937',
            lightdark: '#374151'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-dark text-white h-screen overflow-hidden flex">

  <!-- Sidebar -->
  <div id="sidebar" class="w-64 bg-lightdark transition-all duration-300 flex flex-col">
    <div class="p-6 flex justify-between items-center">
      <h1 class="text-xl font-bold">USEKAI</h1>
      <button onclick="toggleSidebar()" class="text-white text-xl">&times;</button>
    </div>
    <nav class="flex-1 px-6 space-y-4">
      <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-primary">🏠 Home</a>
      <a href="{{ route('admin.blog.index') }}" class="block px-4 py-2 rounded hover:bg-primary">📝 Blog</a>
    </nav>
  </div>

  <!-- Main -->
  <div class="flex-1 flex flex-col">
    <!-- Navbar -->
    <header class="bg-lightdark h-16 flex items-center justify-between px-6">
      <button onclick="toggleSidebar()" class="md:hidden text-white text-xl">&#9776;</button>
      <h2 class="text-lg font-semibold">@yield('header', 'Dashboard')</h2>

      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center space-x-2 bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">
            <span class="font-semibold">{{ auth('admin')->user()->username }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open"
            @click.outside="open = false"
            x-transition
            class="absolute right-0 mt-2 w-40 bg-gray-800 rounded-lg shadow-lg py-2 z-50">
            <a href="{{ route('admin.profile') }}"
            class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition">
            Edit Profile
            </a>
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

    <!-- Main content -->
    <main class="flex-1 overflow-y-auto p-6 space-y-6">
      @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded shadow mb-4">
          {{ session('success') }}
        </div>
      @endif
      @yield('content')
    </main>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
    }
  </script>

</body>
</html>
