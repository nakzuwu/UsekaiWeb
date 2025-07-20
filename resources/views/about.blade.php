@extends('layouts.app')

@section('title', 'About | Usekai')

@section('content')
    <div class="min-h-screen bg-cover bg-center bg-no-repeat text-white"
        style="background-image: url('{{ asset('images/background.png') }}')">
        <div class="flex justify-center items-center min-h-screen px-4">
            <div class="w-full max-w-4xl bg-black/70 rounded-2xl shadow-lg  border border-white/20 p-8 md:p-12 text-center">

                {{-- Logo --}}
                <img src="{{ asset('images/usekai.png') }}" alt="Usekai Logo" class="w-48 mx-auto mb-6" />

                {{-- Judul --}}
                <h1 class="text-3xl font-bold mb-6">Tentang Usekai</h1>

                {{-- Penjelasan --}}
                <p class="text-lg leading-relaxed text-justify">
                    Usekai adalah platform yang dibuat untuk mempromosikan kreator berbakat dari seluruh Indonesia.
                    Dibentuk oleh komunitas kreator independen, Usekai memiliki visi untuk menjembatani para kreator dengan
                    dunia
                    industri kreatif modern. Kami berkomitmen untuk membangun ekosistem yang sehat dan kolaboratif.
                    <br><br>
                    Pendiri: <strong>Itou Ezo</strong><br>
                    Tahun Berdiri: <strong>2020</strong>
                </p>

                {{-- Sosial Media --}}
                <div class="mt-10">
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
    </div>
@endsection
