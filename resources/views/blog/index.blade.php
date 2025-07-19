@extends('layouts.app')

@section('content')
    <div class="h-screen overflow-hidden bg-cover bg-center bg-no-repeat text-white p-6 flex flex-col items-center justify-start"
        style="background-image: url('{{ asset('images/background.png') }}');">

        <!-- Blog Wrapper -->
        <div
            class="w-full max-w-3xl h-[calc(100vh-100px)] overflow-y-auto bg-black/80 scrollbar-hide border border-white/30 rounded-2xl p-6 shadow-lg backdrop-blur-md">

            <!-- Logo Usekai -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/usekai.png') }}" alt="USEKAI" class="h-20 mx-auto mb-2">
                <h2 class="text-white text-2xl font-bold">USEKAI Blog</h2>
            </div>

            @forelse ($blogs as $blog)
                <a href="{{ route('blog.show', $blog->id) }}" class="block text-white no-underline">
                    <div
                        class="bg-zinc-900 rounded-lg mb-6 p-4 shadow-md transition-transform duration-200 hover:scale-[1.01]">

                        <!-- Judul -->
                        <h3 class="text-white text-2xl font-bold mb-2">{{ $blog->title }}</h3>

                        <!-- Deskripsi -->
                        @php
                            $contentWithLinks = preg_replace(
                                '/(https?\:\/\/[^\s]+)/',
                                '<a href="$1" target="_blank" class="text-sky-400 underline">$1</a>',
                                e($blog->content),
                            );
                        @endphp
                        <p class="text-gray-300">{!! nl2br($contentWithLinks) !!}</p>

                        <!-- YouTube Thumbnails -->
                        @php
                            preg_match_all(
                                '/https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/',
                                $blog->content,
                                $matches,
                            );
                            $videoIds = $matches[1] ?? [];
                        @endphp

                        @if (!empty($videoIds))
                            <div class="flex flex-wrap gap-3 mt-2">
                                @foreach ($videoIds as $vid)
                                    <div class="flex-1 min-w-[300px] bg-black rounded-lg overflow-hidden">
                                        <a href="https://www.youtube.com/watch?v={{ $vid }}" target="_blank">
                                            <img src="https://img.youtube.com/vi/{{ $vid }}/0.jpg"
                                                alt="YouTube Thumbnail" class="w-full object-cover">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Media -->
                        @if ($blog->media && count($blog->media) > 0)
                            @php
                                $firstMedia = $blog->media[0];
                                $restMedia = array_slice($blog->media, 1);
                                $extFirst = pathinfo($firstMedia, PATHINFO_EXTENSION);
                                $isVideoFirst = in_array($extFirst, ['mp4', 'webm', 'ogg']);
                            @endphp

                            <!-- Media utama (besar, aspect-video) -->
                            <div class="rounded-lg overflow-hidden bg-black aspect-video mt-3">
                                @if ($isVideoFirst)
                                    <video controls controlsList="nodownload" class="w-full h-full object-cover"
                                        oncontextmenu="return false">
                                        <source src="{{ asset('storage/' . $firstMedia) }}"
                                            type="video/{{ $extFirst }}">
                                        Browser Anda tidak mendukung video.
                                    </video>
                                @else
                                    <img src="{{ asset('storage/' . $firstMedia) }}" alt="media"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>

                            <!-- Media lainnya (grid kecil) -->
                            @if (count($restMedia) > 0)
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-3">
                                    @foreach ($restMedia as $media)
                                        @php
                                            $ext = pathinfo($media, PATHINFO_EXTENSION);
                                            $isVideo = in_array($ext, ['mp4', 'webm', 'ogg']);
                                        @endphp

                                        <div class="rounded-lg overflow-hidden bg-black aspect-video">
                                            @if ($isVideo)
                                                <video controls controlsList="nodownload" class="w-full h-full object-cover"
                                                    oncontextmenu="return false">
                                                    <source src="{{ asset('storage/' . $media) }}"
                                                        type="video/{{ $ext }}">
                                                    Browser Anda tidak mendukung video.
                                                </video>
                                            @else
                                                <img src="{{ asset('storage/' . $media) }}" alt="media"
                                                    class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif


                        <!-- Penulis dan Tanggal -->
                        <p class="text-gray-400 text-sm mt-3">
                            Ditulis oleh <strong>{{ $blog->admin->username ?? 'Anonim' }}</strong>
                            pada {{ \Carbon\Carbon::parse($blog->posted_at)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="text-white">Belum ada blog yang tersedia.</p>
            @endforelse

        </div>
    </div>
@endsection
