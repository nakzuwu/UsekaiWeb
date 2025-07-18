@extends('layouts.app')

@section('content')
    <style>
        /* Sembunyikan scrollbar */
        ::-webkit-scrollbar {
            display: none;
        }

        body {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .media-grid {
            display: grid;
            gap: 5px;
        }

        .media-grid-1 {
            grid-template-columns: 1fr;
        }

        .media-grid-2,
        .media-grid-3 {
            grid-template-columns: repeat(2, 1fr);
        }

        .media-grid img {
            width: 100%;
            border-radius: 8px;
            object-fit: cover;
            height: 200px;
        }

        .media-overlay {
            position: relative;
        }

        .media-overlay::after {
            content: attr(data-count);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .lihat-detail {
            margin-top: 10px;
            display: inline-block;
            background: #444;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .lihat-detail:hover {
            background: #666;
        }
    </style>

    <div
        style="
    height: 100vh;
    overflow: hidden;
    background: url('{{ asset('images/background.png') }}') center/cover no-repeat, #121212;
    color: white;
    padding: 1.5rem;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
">

        <!-- Blog Wrapper -->
        <div
            style="
        width: 100%;
        max-width: 800px;
        height: calc(100vh - 100px);
        overflow-y: auto;
        background-color: rgba(18, 18, 18, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(6px);
    ">

            <!-- Logo Usekai -->
            <div style="text-align: center; margin-bottom: 2rem;">
                <img src="{{ asset('images/usekai.png') }}" alt="USEKAI" style="height: 80px; margin-bottom: 10px;">
                <h2 style="margin: 0; color: white; font-size: 1.8rem;">USEKAI Blog</h2>
            </div>


            @forelse ($blogs as $blog)
                <a href="{{ route('blog.show', $blog->id) }}" style="text-decoration: none; color: inherit;">
                    <div style="
            background-color: #1e1e1e;
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 1rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            transition: transform 0.2s;"
                        onmouseover="this.style.transform='scale(1.01)'" onmouseout="this.style.transform='scale(1)'">

                        <!-- Judul -->
                        <h3 style="color: white; margin: 0 0 0.5rem 0; font-size: 2.4em;">
                            {{ $blog->title }}
                        </h3>

                        <!-- Deskripsi -->

                        @php
                            $contentWithLinks = preg_replace(
                                '/(https?\:\/\/[^\s]+)/',
                                '<a href="$1" target="_blank" style="color: #4faaff; text-decoration: underline;">$1</a>',
                                e($blog->content),
                            );
                        @endphp

                        <p style="margin-top: 0.5rem; color: #ccc;">
                            {!! nl2br($contentWithLinks) !!}
                        </p>

                        @php
                            preg_match_all(
                                '/https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/',
                                $blog->content,
                                $matches,
                            );
                            $videoIds = $matches[1] ?? [];
                        @endphp

                        @if (!empty($videoIds))
                            <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 0.5rem;">
                                @foreach ($videoIds as $vid)
                                    <div
                                        style="flex: 1 1 300px; background-color: #000; border-radius: 8px; overflow: hidden;">
                                        <a href="https://www.youtube.com/watch?v={{ $vid }}" target="_blank"
                                            style="display: block;">
                                            <img src="https://img.youtube.com/vi/{{ $vid }}/0.jpg"
                                                alt="YouTube Thumbnail" style="width: 100%; object-fit: cover;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        <!-- Media -->
                        @if ($blog->media)
                            <div
                                style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 10px;
                    margin-top: 0.5rem;">
                                @foreach ($blog->media as $media)
                                    @php
                                        $ext = pathinfo($media, PATHINFO_EXTENSION);
                                        $isVideo = in_array($ext, ['mp4', 'webm', 'ogg']);
                                    @endphp

                                    <div
                                        style="
                            width: 100%;
                            border-radius: 8px;
                            overflow: hidden;
                            background-color: #000;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            max-height: 300px;
                            position: relative;">
                                        @if ($isVideo)
                                            <video controls controlsList="nodownload"
                                                style="width: 100%; height: 100%; object-fit: cover;"
                                                oncontextmenu="return false">
                                                <source src="{{ asset('storage/' . $media) }}"
                                                    type="video/{{ $ext }}">
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/' . $media) }}" alt="media"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Penulis dan Tanggal -->
                        <p style="color: #aaa; font-size: 0.9em; margin-top: 0.5rem;">
                            Ditulis oleh <strong>{{ $blog->admin->username ?? 'Anonim' }}</strong>
                            pada {{ \Carbon\Carbon::parse($blog->posted_at)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </a>
            @empty
                <p style="color: white;">Belum ada blog yang tersedia.</p>
            @endforelse


        </div>

        <!-- Footer -->
        <footer class="footer-bar hide-on-hover">
            <div class="footer-nav">
                <button>BLOG</button>
                <button>TALENT</button>
                <button id="social-toggle">ABOUT</button>
            </div>
        </footer>

    </div>
@endsection
