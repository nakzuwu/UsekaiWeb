@extends('layouts.app')

@section('title', 'Talent | USEKAI')

@section('content')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Rock+Salt&display=swap" rel="stylesheet">

    <style>
        .font-fancy {
            font-family: 'Rock Salt', cursive;
        }

        .font-body {
            font-family: 'Poppins', sans-serif;
        }

        .talent-card {
            @apply relative w-full bg-black/80 text-white rounded-xl px-6 py-12 border border-white/10 hover:scale-105 transition duration-300 overflow-hidden;
        }

        .talent-image {
            @apply absolute top-1/2 -translate-y-1/2 w-48 sm:w-64 object-contain z-10;
        }

        .talent-content {
            @apply relative z-20 w-full sm:w-1/2 text-center sm:text-left;
        }
    </style>

    <!-- Background Blur -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background.png') }}" class="w-full h-full object-cover" alt="bg">
    </div>

    <!-- Main Content Box -->
    <div
        class="relative z-10 max-w-5xl mx-auto px-4 py-10 border border-white/20 rounded-xl bg-black/40 backdrop-blur-md space-y-10 ">
        <div class="flex flex-col items-center space-y-10">
            <!-- Logo -->
            <img src="{{ asset('images/usekai.png') }}" class="h-10" alt="USEKAI Logo">

            <!-- ALSEPHINA RHEA -->
            <a href="#"
                class="relative w-full flex flex-col sm:flex-row items-center sm:items-center bg-black/80 text-white rounded-xl px-4 sm:px-10 pt-24 pb-12 border border-white/30 hover:scale-105 transition duration-300 overflow-visible mt-12">
                <img src="{{ asset('images/rheafullbody1.png') }}"
                    class="w-36 sm:w-48 md:w-56 lg:w-64 object-contain sm:absolute sm:right-4 -top-[80px] z-10 drop-shadow-xl"
                    alt="ALSEPHINA RHEA">
                <div class="relative z-20 w-full sm:w-1/2 text-left mt-6 sm:mt-0">
                    <h2 class="font-fancy text-xl mb-2">ALSEPHINA RHEA</h2>
                    <p class="text-sm text-gray-300 font-body">Cyborg yang suka lemot</p>
                </div>
            </a>

            <!-- REIKA VALENCIA -->
            <a href="#"
                class="relative w-full flex flex-col sm:flex-row items-center sm:items-center bg-black/80 text-white rounded-xl px-4 sm:px-10 pt-24 pb-12 border border-white/30 hover:scale-105 transition duration-300 overflow-visible mt-12">

                <img src="{{ asset('images/reikafullbody1.png') }}"
                    class="w-36 sm:w-48 md:w-56 lg:w-64 object-contain sm:absolute sm:left-4 -top-28 z-10 drop-shadow-xl"
                    alt="REIKA VALENCIA">

                <div
                    class="relative z-20 w-full sm:w-1/2 flex flex-col justify-center h-full text-right sm:mt-0 sm:ml-auto">
                    <h2 class="font-fancy text-4xl mb-2">REIKA VALENCIA</h2>
                    <p class="text-sm text-gray-300 font-body">Penyihir penyuka tomat</p>
                </div>
            </a>

        </div>
    </div>
@endsection
