@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        body {
            scrollbar-width: none;
            -ms-overflow-style: none;
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

        /* Modal styling */
        #imageModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        #imageModal.active {
            display: flex !important;
        }

        #modalImage {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        #imageModal button.close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: transparent;
            border: 2px solid white;
            color: white;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @php
        function makeClickableLinks($text)
        {
            $pattern = '/(https?:\/\/[^\s<]+)/';
            return preg_replace_callback(
                $pattern,
                function ($matches) {
                    $url = $matches[0];
                    return '<a href="' .
                        $url .
                        '" target="_blank" style="color: #4ea1f3; text-decoration: underline;">' .
                        $url .
                        '</a>';
                },
                e($text),
            );
        }
    @endphp

    <div
        style="min-height: 100vh; overflow-x: hidden; background: url('{{ asset('images/background.png') }}') center/cover no-repeat, #121212; color: white; padding: 1.5rem; display: flex; flex-direction: column; align-items: center;">
        <div
            style="width: 100%; max-width: 800px; background-color: rgba(18, 18, 18, 0.8); border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 20px; padding: 1.5rem; box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); backdrop-filter: blur(6px);">

            <h2 style="font-size: 2.2rem; margin-bottom: 0.5rem;">{!! makeClickableLinks($blog->title) !!}</h2>
            <p style="font-size: 1rem;">{!! makeClickableLinks($blog->content) !!}</p>

            @php
                preg_match_all('/https?\:\/\/[^\s]+/', $blog->content, $matches);
                $urls = $matches[0] ?? [];
            @endphp

            @if (!empty($urls))
                <div style="margin-top: 1.5rem;">
                    @foreach ($urls as $url)
                        @php
                            $parsed = parse_url($url);
                            $host = $parsed['host'] ?? 'Link';
                            $favicon = 'https://www.google.com/s2/favicons?domain=' . $host . '&sz=64';

                            // YouTube check
                            $youtubeId = null;
                            if (str_contains($host, 'youtube.com')) {
                                parse_str($parsed['query'] ?? '', $query);
                                $youtubeId = $query['v'] ?? null;
                            } elseif (str_contains($host, 'youtu.be')) {
                                $youtubeId = ltrim($parsed['path'] ?? '', '/');
                            }

                            $thumbnail = $youtubeId ? "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg" : null;
                        @endphp

                        <a href="{{ $url }}" target="_blank" style="text-decoration: none; color: inherit;">
                            <div
                                style="
                    display: flex;
                    background-color: #1e1e1e;
                    border: 1px solid #444;
                    border-radius: 12px;
                    overflow: hidden;
                    margin-bottom: 20px;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                    max-width: 700px;
                ">
                                @if ($thumbnail)
                                    <img src="{{ $thumbnail }}" alt="youtube thumbnail"
                                        style="width: 40%; height: auto; object-fit: cover;">
                                @endif
                                <div style="padding: 15px; flex: 1;">
                                    <div style="font-size: 1.2rem; color: #fff; font-weight: bold;">{{ ucfirst($host) }}
                                    </div>
                                    <div style="font-size: 0.9rem; color: #aaa; margin-top: 5px; word-break: break-all;">
                                        {{ $url }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            <p style="color: #ccc; font-size: 0.9rem; margin-bottom: 1rem;">
                Ditulis oleh <strong>{{ $blog->admin->username ?? 'Anonim' }}</strong> pada
                {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y, H:i') }}
            </p>

            @if ($blog->media)
                <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 1rem; justify-content: start;">
                    @foreach ($blog->media ?? [] as $media)
                        @php
                            $ext = pathinfo($media, PATHINFO_EXTENSION);
                            $isVideo = in_array($ext, ['mp4', 'webm', 'ogg']);
                        @endphp

                        <div
                            style="border-radius: 8px; background-color: #000; display: inline-block; position: relative; overflow: auto;">
                            @if ($isVideo)
                                <video controls controlsList="nodownload" oncontextmenu="return false"
                                    style="display: block; max-width: 100%; height: auto; border-radius: 8px;">
                                    <source src="{{ asset('storage/' . $media) }}" type="video/{{ $ext }}">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                <img src="{{ asset('storage/' . $media) }}" alt="media"
                                    style="display: block; cursor: zoom-in; border-radius: 8px; max-width: 100%; height: auto;" />
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
