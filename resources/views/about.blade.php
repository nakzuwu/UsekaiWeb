@extends('layouts.app')

@section('title', 'About')

@section('content')

    <div
        style="min-height: 100vh; background: url('{{ asset('images/background-web.png') }}') center/cover no-repeat fixed, #121212; padding-top: 5rem; padding-bottom: 5rem; overflow-x: hidden; display: flex; flex-direction: column; align-items: center; color: white;">

        <div
            style="width: 100%; max-width: 800px; background-color: rgba(18, 18, 18, 0.8); border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 20px; padding: 2rem; box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); backdrop-filter: blur(6px);">


            {{-- Logo --}}
            <img src="{{ asset('images/usekai.png') }}" alt="Usekai Logo" class="w-48 mx-auto mb-6" />

            {{-- Judul --}}
            <h1 class="text-3xl font-bold mb-6 text-center">Tentang Usekai</h1>

            {{-- Penjelasan --}}
            <p class="text-lg leading-relaxed text-justify">
                <strong>U-Sekai</strong> Production, atau biasa dikenal dengan sebutan <strong>U-Sekai</strong>, adalah
                sebuah agensi yang terfokus pada sajian utama hiburan <em>Virtual Talent</em>. Dibentuk oleh Reina pada
                tahun 2022 di platform <em>YouTube</em> sebagai agensi independen.
                <br><br>
                <strong>U-Sekai</strong> Production mengusung konsep <em>Timeline</em> untuk setiap karakter yang telah
                dan akan dirilis. <strong>U-Sekai</strong> ingin menjadikan setiap karakter tersebut sebagai perlambang
                setiap masa — yakni masa lalu, kini, dan nanti — dan mereka akan terhubung satu sama lainnya.
                <br><br>
                <strong>U-Sekai</strong> pada namanya terbagi atas "U" dan "Sekai". "U" merupakan huruf pertama dari
                kata <em>United</em> yang berarti “yang bersatu” jika diterjemahkan ke dalam bahasa Indonesia. Sementara
                itu, <em>Sekai</em> (世界) berarti “Dunia”. Jika kedua kata tersebut disatukan, akan memiliki arti “Dunia
                yang Bersatu”. Sesuai dengan tujuan <strong>U-Sekai</strong> itu sendiri — menawarkan sebuah hiburan
                yang menyatukan setiap penonton dalam pertunjukan <em>Virtual Stage</em>.
                <br><br>
                Pendiri: <strong>Reina</strong><br>
                Tahun Berdiri: <strong>2022</strong>
            </p>

            {{-- Section Admin --}}
            <div class="mt-12">
                <h2 class="text-white text-center text-2xl font-bold mb-6">Tim Kami</h2>

                <div class="flex flex-wrap justify-center gap-6">
                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Reina</h3>
                        <p class="text-sm text-white/80">Founder</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Itou Ezo</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Luki Lokananta</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Sakana</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Ratt</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Major</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Artemis</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">M-san</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/logousekai.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">Dendy</h3>
                        <p class="text-sm text-white/80">Staff</p>
                    </div>

                    <div
                        class="bg-white/10 rounded-xl p-6 w-full max-w-xs text-white text-center border border-white/20 shadow-lg">
                        <img src="{{ asset('images/nakzuwu.png') }}" alt="Foto Admin"
                            class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-2 border-white/30">
                        <h3 class="text-xl font-bold">nakzuwu</h3>
                        <p class="text-sm text-white/80">Web Dev</p>
                    </div>
                </div>
            </div>


            {{-- Sosial Media --}}
            <div class="mt-10 text-center">
                <h2 class="text-2xl font-semibold mb-6">Ikuti Kami</h2>

                <div class="flex justify-center gap-10 text-white">
                    {{-- Discord --}}
                    <a href="https://discord.gg/UtvmVRYuhM" target="_blank"
                        class="flex items-center space-x-2 group hover:underline">
                        <img src="{{ asset('images/discord.png') }}" alt="Discord"
                            class="w-6 transition-transform duration-300 group-hover:scale-110" />
                        <span class="font-bold text-white visited:text-white">Discord</span>
                    </a>

                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/usekai_id" target="_blank"
                        class="flex items-center space-x-2 group hover:underline">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram"
                            class="w-6 transition-transform duration-300 group-hover:scale-110" />
                        <span class="font-bold text-white visited:text-white">Instagram</span>
                    </a>

                    {{-- Twitter --}}
                    <a href="https://x.com/USekai_Pro" target="_blank"
                        class="flex items-center space-x-2 group hover:underline">
                        <img src="{{ asset('images/twitter.png') }}" alt="Twitter"
                            class="w-6 transition-transform duration-300 group-hover:scale-110" />
                        <span class="font-bold text-white visited:text-white">Twitter</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
