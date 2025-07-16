<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile | USEKAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .logo-float {
            animation: float 3s ease-in-out infinite;
        }

        .glow-border {
            border: 2px solid #ef4444;
            box-shadow: 0 0 12px #ef4444;
        }
    </style>
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen flex items-center justify-center p-4">


    <div class="w-full max-w-xl rounded-2xl glow-border px-6 py-10">
        <!-- Tombol Back -->
        <a href="{{ route('admin.dashboard') }}"
            class="absolute top-6 left-6 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
            ← Back
        </a>

        <div class="flex flex-col items-center mb-8">
            <img src="{{ asset('images/usekai.png') }}" alt="USEKAI Logo" class="w-32 mb-4 logo-float">
            <h1 class="text-2xl font-bold text-white">Edit Profile</h1>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-600 text-white p-2 rounded text-sm text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Username Update Form --}}
        <form method="POST" action="{{ route('admin.updateUsername') }}" class="space-y-4 mb-6">
            @csrf
            <div>
                <label for="username" class="block mb-1 text-sm">Username</label>
                <input type="text" id="username" name="username" value="{{ auth('admin')->user()->username }}"
                    class="w-full px-4 py-2 bg-[#0A0A0A] border border-[#EF4444] rounded text-white focus:ring-2 focus:ring-[#EF4444] outline-none"
                    required>
            </div>
            <button type="submit"
                class="w-full py-2 bg-[#EF4444] hover:bg-red-600 transition rounded font-semibold text-white">
                Update Username
            </button>
        </form>

        <hr class="border-gray-700 my-6">

        {{-- Password Update Form --}}
        <form method="POST" action="{{ route('admin.updatePassword') }}" class="space-y-4">
            @csrf
            <div>
                <label for="current_password" class="block mb-1 text-sm">Current Password</label>
                <input type="password" id="current_password" name="current_password"
                    class="w-full px-4 py-2 bg-[#0A0A0A] border border-[#EF4444] rounded text-white focus:ring-2 focus:ring-[#EF4444] outline-none"
                    required>
            </div>
            <div>
                <label for="new_password" class="block mb-1 text-sm">New Password</label>
                <input type="password" id="new_password" name="new_password"
                    class="w-full px-4 py-2 bg-[#0A0A0A] border border-[#EF4444] rounded text-white focus:ring-2 focus:ring-[#EF4444] outline-none"
                    required>
            </div>
            <div>
                <label for="new_password_confirmation" class="block mb-1 text-sm">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                    class="w-full px-4 py-2 bg-[#0A0A0A] border border-[#EF4444] rounded text-white focus:ring-2 focus:ring-[#EF4444] outline-none"
                    required>
            </div>
            <button type="submit"
                class="w-full py-2 bg-[#EF4444] hover:bg-red-600 transition rounded font-semibold text-white">
                Update Password
            </button>
        </form>

        <p class="text-center text-sm text-gray-400 mt-8">
            © {{ date('Y') }} USEKAI ID
        </p>
    </div>

</body>

</html>
