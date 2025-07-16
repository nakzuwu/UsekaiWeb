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

    .glow-border {
      border: 2px solid #ff3d3d;
      box-shadow: 0 0 12px #ff3d3d;
    }
  </style>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center">

  <div class="w-full max-w-screen-2xl h-[90vh] flex overflow-hidden rounded-2xl glow-border">
    <!-- Left Image Area -->
    <div class="w-full h-auto object-cover rounded-lg transform translate-x--2"
         style="background-image: url('{{ asset('images/bg-login.png') }}');">
    </div>

    <!-- Right Form Area -->
    <div class="w-1/2 bg-black flex flex-col justify-center px-10 py-12">
      <div class="flex flex-col items-center mb-8">
        <img src="{{ asset('images/usekai.png') }}" alt="USEKAI Logo"
             class="w-40 mx-auto mb-6 logo-float">
        <h2 class="text-xl font-bold text-white">Login</h2>
      </div>

      @if(session('error'))
        <div class="bg-red-600 text-white p-2 rounded text-sm text-center mb-4">
          {{ session('error') }}
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST" class="space-y-4 w-full">
        @csrf
        <div>
          <label for="username" class="block mb-1 text-sm">Username</label>
          <input type="text" id="username" name="username" required
                 class="w-full px-4 py-2 rounded bg-black border border-red-500 text-white focus:ring-2 focus:ring-red-500 outline-none" />
        </div>
        <div>
          <label for="password" class="block mb-1 text-sm">Password</label>
          <input type="password" id="password" name="password" required
                 class="w-full px-4 py-2 rounded bg-black border border-red-500 text-white focus:ring-2 focus:ring-red-500 outline-none" />
        </div>

        <button type="submit"
                class="w-full py-2 bg-red-500 hover:bg-red-600 transition rounded font-semibold text-white">
          Login
        </button>
      </form>

      <p class="text-center text-sm text-gray-400 mt-6">
        © {{ date('Y') }} USEKAI ID
      </p>
    </div>
  </div>

</body>
</html>
