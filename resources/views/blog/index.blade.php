@extends('layouts.app')

@section('content')
    <div style="height: 100vh; overflow: hidden; background-color: #121212; color: white;">

        <div style="overflow-y: auto; height: calc(100vh - 60px); padding: 1rem; box-sizing: border-box;">

            @foreach ($blogs as $blog)
                <div
                    style="background-color: #1e1e1e; border-radius: 10px; margin-bottom: 1rem; padding: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.3);">

                    <!-- Logo Usekai -->
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <img src="{{ asset('images/usekai-logo.png') }}" alt="USEKAI"
                            style="height: 40px; margin-right: 10px;">
                        <h2 style="margin: 0; color: white; font-size: 1.2rem;">USEKAI Blog</h2>
                    </div>

                    <!-- Judul -->
                    <h3 style="color: white;">{{ $blog->title }}</h3>

                    <!-- Deskripsi -->
                    <p style="margin-top: 0.5rem;">{{ $blog->content }}</p>

                    <!-- Media -->
                    @if ($blog->media)
                        @foreach ($blog->media as $media)
                            <div style="margin-top: 0.5rem;">
                                <img src="{{ asset('storage/' . $media) }}" alt="media"
                                    style="width: 100%; border-radius: 8px; max-height: 300px; object-fit: cover;">
                            </div>
                        @endforeach
                    @endif

                    <!-- Footer Info -->
                    <div style="margin-top: 1rem; font-size: 0.9rem; color: #ccc;">
                        Diposting oleh <strong>{{ $blog->admin->name }}</strong> pada
                        {{ $blog->posted_at->format('d M Y H:i') }}
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Footer / Navbar bawah -->
        <footer class="footer-bar hide-on-hover">
            <div class="footer-nav">
                <button>BLOG</button>
                <button>TALENT</button>
                <button id="social-toggle">ABOUT</button>
            </div>
        </footer>

    </div>
@endsection
