@extends('layouts.app')

@section('title', 'Reika Valencia | USEKAI')

@section('content')
    <!-- Fullscreen Background -->
    <div class="absolute inset-0 z-0">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('webm/ReikaBackground.webm') }}" type="video/webm">
            Your browser does not support the video tag.
        </video>

        <!-- Gradient dari bawah ke atas -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

        <!-- Lapisan semi-transparan hitam -->
        <div class="absolute inset-0 bg-black/20"></div>

        <!-- Centered Overlay Image (9:16) -->
        <img src="{{ asset('images/reikafullbodytalent.png') }}" alt="Character Overlay"
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] sm:w-[360px] md:w-[400px] lg:w-[460px] pointer-events-none select-none">
        <div
            class="absolute inset-0 z-20 pointer-events-none select-none bg-gradient-to-t from-black/100 via-transparent to-transparent">
        </div>
    </div>



    <div class="relative z-10 min-h-screen flex flex-col justify-center pt-80 px-6  pb-12 text-white space-y-20">

        <!-- Top Grid Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-6xl mx-auto text-white font-[Poppins]">
            <!-- Left Side -->
            <div class="animate-fade-in-up text-left space-y-8">
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-pink-500 to-yellow-400 bg-clip-text text-transparent drop-shadow">
                        🎂 Birthday
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        12 Desember
                    </p>
                </div>
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-green-400 to-teal-300 bg-clip-text text-transparent drop-shadow">
                        👥 Fan Name
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        Toamt Gxng
                    </p>
                </div>
            </div>

            <!-- Right Side -->
            <div class="animate-fade-in-up text-right space-y-8 mt-12 md:mt-0">
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent drop-shadow">
                        Deskripsi 📝
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide italic hover:scale-105 transition-transform duration-300 drop-shadow-lg">
                        Pro Apex dan Prosekai. Putri Tomat.
                    </p>
                </div>
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent drop-shadow">
                        Sifat ✨
                    </h3>
                    <ul class="list-disc list-inside mt-2 space-y-1 text-lg tracking-wide drop-shadow-lg">
                        <li class="hover:text-pink-300 transition-colors">Introvert</li>
                        <li class="hover:text-pink-300 transition-colors">-1 Topik</li>
                        <li class="hover:text-pink-300 transition-colors">Tomat</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Social Links -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-6"></h2>

            <div class="flex justify-center gap-10 text-white">
                {{-- Instagram --}}
                <a href="https://www.instagram.com/reika_valencia" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-white visited:text-white text-sm mt-1">
                        @reika_valencia
                    </span>
                </a>

                {{-- YouTube --}}
                <a href="https://www.youtube.com/@ReikaValencia_Usekai-ID" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/youtube.png') }}" alt="YouTube"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-white visited:text-white text-sm mt-1">
                        Reika Valencia「U-Sekai ID」
                    </span>
                </a>

                {{-- Twitter --}}
                <a href="https://x.com/ReikaValencia" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/twitter.png') }}" alt="Twitter"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-white visited:text-white text-sm mt-1">
                        @ReikaValencia
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection
