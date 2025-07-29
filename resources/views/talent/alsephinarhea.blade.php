@extends('layouts.talent')

@section('title', 'Alsephina Rhea | USEKAI')

@section('content')
    <!-- Fullscreen Background -->
    <div class="absolute inset-0 z-0">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('webm/RheaBackground.webm') }}" type="video/webm">
            Your browser does not support the video tag.
        </video>

        <!-- Gradient dari bawah ke atas -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

        <!-- Lapisan semi-transparan hitam -->
        <div class="absolute inset-0 bg-black/20"></div>

        <!-- Centered Overlay Image (9:16) -->
        <img src="{{ asset('images/rheafullbodytalent.png') }}" alt="Character Overlay"
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] sm:w-[360px] md:w-[400px] lg:w-[460px] pointer-events-none select-none">
        <div
            class="absolute inset-0 z-20 pointer-events-none select-none bg-gradient-to-t from-black/100 via-transparent to-transparent">
        </div>
    </div>

    <!-- Fixed Top-Left Logo -->
    <div class="fixed top-4 left-20 z-30 pointer-events-none select-none">
        <img src="{{ asset('images/rhea_logo.png') }}" alt="Rhea Logo"
            class="w-32 sm:w-36 md:w-40 lg:w-44
                object-contain
                pointer-events-none
                select-none
                brightness-100
                contrast-100
                transition duration-300 ease-in-out" />
    </div>

    <div class="relative z-10 min-h-screen flex flex-col justify-center pt-64 px-6 pb-12 text-white space-y-14">

        <!-- Top Grid Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-6xl mx-auto text-white font-[Poppins]">
            <!-- Left Side -->
            <div class="animate-fade-in-up text-left space-y-8">
                <!-- Birthday -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-pink-500 to-yellow-400 bg-clip-text text-transparent drop-shadow">
                        🎂 Birthday
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        5 September
                    </p>
                </div>

                <!-- Age -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent drop-shadow">
                        🎈 Age
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        n/a
                    </p>
                </div>

                <!-- Height -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-green-400 to-teal-300 bg-clip-text text-transparent drop-shadow">
                        📏 Height
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        158 cm
                    </p>
                </div>
            </div>

            <!-- Right Side -->
            <div class="animate-fade-in-up text-right space-y-8 mt-12 md:mt-0">
                <!-- Mama / Papa -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-yellow-400 to-pink-400 bg-clip-text text-transparent drop-shadow">
                        🧬 Mama / Papa
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        Sakana / No data
                    </p>
                </div>

                <!-- Description -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent drop-shadow">
                        📝 Deskripsi
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide italic hover:scale-105 transition-transform duration-300 drop-shadow-lg">
                        Pakar cinta Usekai.
                    </p>
                </div>

                <!-- Fan Name -->
                <div>
                    <h3
                        class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent drop-shadow">
                        👥 Fan Name
                    </h3>
                    <p
                        class="mt-2 text-lg tracking-wide hover:translate-x-1 transition-transform duration-300 drop-shadow-lg">
                        Professor
                    </p>
                </div>
            </div>
        </div>

        <!-- Tag Section -->
        <div class="mt-6 text-center text-white font-[Poppins] space-y-2">
            <h3
                class="text-xl font-bold bg-gradient-to-r from-fuchsia-500 to-cyan-400 bg-clip-text text-transparent drop-shadow">
                📌 Tags
            </h3>
            <ul class="mt-2 flex flex-wrap justify-center gap-4 text-lg tracking-wide drop-shadow-lg">
                <li class="flex items-center gap-1">
                    <span class="font-semibold text-pink-300">General :</span> <span>#reikadairy</span>
                </li>
                <li class="flex items-center gap-1">
                    <span class="font-semibold text-green-300">Live tag :</span> <span>#Valenci_live</span>
                </li>
                <li class="flex items-center gap-1">
                    <span class="font-semibold text-purple-300">Fanart :</span> <span>#sihireika</span>
                </li>
                <li class="flex items-center gap-1">
                    <span class="font-semibold text-blue-300">Clip :</span> <span>#katalisreika</span>
                </li>
            </ul>
        </div>

        <!-- Social Links -->
        <div class="mt-4 text-white font-[Poppins]">
            <h2 class="text-2xl font-semibold text-center mb-4">🔗 Social Links</h2>

            <div class="flex justify-center gap-8">
                <!-- Instagram -->
                <a href="https://www.instagram.com/reika_valencia" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-sm mt-1">@reika_valencia</span>
                </a>

                <!-- YouTube -->
                <a href="https://www.youtube.com/@ReikaValencia_Usekai-ID" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/youtube.png') }}" alt="YouTube"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-sm mt-1">Reika Valencia「U-Sekai ID」</span>
                </a>

                <!-- Twitter -->
                <a href="https://x.com/ReikaValencia" target="_blank"
                    class="flex flex-col items-center w-32 text-center group hover:underline">
                    <img src="{{ asset('images/twitter.png') }}" alt="Twitter"
                        class="w-6 transition-transform duration-300 group-hover:scale-110" />
                    <span class="font-bold text-sm mt-1">@ReikaValencia</span>
                </a>
            </div>
        </div>
    </div>
@endsection
