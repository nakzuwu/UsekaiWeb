<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login Page' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <footer class="footer-bar hide-on-hover">
        <div class="footer-nav">
            <button onclick="window.location.href='/'">HOME</button>
            <button onclick="window.location.href='/blog'">BLOG</button>
            <button onclick="window.location.href='/talent'">TALENT</button>
            <button onclick="window.location.href='/about'">ABOUT</button>
        </div>
    </footer>

    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>

</html>
