<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile | USEKAI</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-dark text-white min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-xl bg-lightdark p-8 rounded-xl shadow space-y-6">
    <h1 class="text-2xl font-bold text-center mb-4">Edit Profile</h1>

    @if(session('success'))
      <div class="bg-green-600 text-white p-2 rounded text-sm text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- Update Username --}}
    <form method="POST" action="{{ route('admin.updateUsername') }}" class="space-y-4">
      @csrf
      <div>
        <label for="username" class="block mb-1 text-sm">Username</label>
        <input type="text" id="username" name="username" value="{{ auth('admin')->user()->username }}"
               class="w-full px-4 py-2 bg-dark border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
      </div>
      <button type="submit"
              class="w-full py-2 bg-primary hover:bg-red-600 transition rounded-lg font-semibold">
        Update Username
      </button>
    </form>

    <hr class="border-gray-600">

    {{-- Update Password --}}
    <form method="POST" action="{{ route('admin.updatePassword') }}" class="space-y-4">
      @csrf
      <div>
        <label for="current_password" class="block mb-1 text-sm">Current Password</label>
        <input type="password" id="current_password" name="current_password"
               class="w-full px-4 py-2 bg-dark border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
      </div>
      <div>
        <label for="new_password" class="block mb-1 text-sm">New Password</label>
        <input type="password" id="new_password" name="new_password"
               class="w-full px-4 py-2 bg-dark border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
      </div>
      <div>
        <label for="new_password_confirmation" class="block mb-1 text-sm">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
               class="w-full px-4 py-2 bg-dark border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
      </div>
      <button type="submit"
              class="w-full py-2 bg-primary hover:bg-red-600 transition rounded-lg font-semibold">
        Update Password
      </button>
    </form>
  </div>

</body>
</html>
