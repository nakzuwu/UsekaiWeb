<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | USEKAI ID</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }
    .logo-float {
      animation: float 3s ease-in-out infinite;
    }
  </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-xl p-8 space-y-6">
    <div class="flex flex-col items-center">
      <img src="{{ asset('images/usekai.png') }}" alt="USEKAI Logo" class="w-20 h-20 logo-float mb-4">
      <h1 class="text-2xl font-bold text-white">USEKAI Admin Login</h1>
    </div>

    @if(session('error'))
      <div class="bg-red-600 text-white p-2 rounded text-sm text-center">
        {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="username" class="block mb-1 text-sm">Username</label>
        <input type="text" id="username" name="username" required
            class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-red-400 text-white" />
      </div>
      <div>
        <label for="password" class="block mb-1 text-sm">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-red-400 text-white" />
      </div>

      <button type="submit"
        class="w-full py-2 px-4 bg-red-500 hover:bg-red-600 transition rounded-lg font-semibold text-white">
        Login
      </button>
    </form>

    <p class="text-center text-sm text-gray-400">© {{ date('Y') }} USEKAI ID</p>
  </div>

</body>
</html>
