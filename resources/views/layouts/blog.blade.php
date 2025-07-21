<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $blog->title }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ url('storage/' . $blog->media[0]) }}" />
    {{-- Dynamic Title from @section('title') --}}
    <title>@yield('title', 'UsekaiID') | USEKAI ID</title>
    <link rel="icon" href="{{ preg_replace('/^https?:/', '', asset('images/logousekai.png')) }}" type="image/png">
    <link rel="stylesheet" href="{{ preg_replace('/^https?:/', '', asset('css/style.css')) }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer-bar {
            color: white;
            padding: 10px 20px;
            margin-top: auto;
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-nav button {
            background: none;
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <main>
        @yield('content')
    </main>

    <footer class="footer-bar hide-on-hover pt-6">
        <div class="flex flex-col items-center gap-2">
            <div class="footer-nav">
                <button onclick="window.location.href='/'">HOME</button>
                <button onclick="window.location.href='/blog'">BLOG</button>
                <button onclick="window.location.href='/talent'">TALENT</button>
                <button onclick="window.location.href='/about'">ABOUT</button>
            </div>
            <div class="text-center text-sm text-white">
                © USEKAI 2025
            </div>
        </div>
    </footer>


    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>

</html>
