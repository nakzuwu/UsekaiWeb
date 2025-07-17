<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login Page' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            background-color: #111;
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
            <button>BLOG</button>
            <button>TALENT</button>
            <button id="social-toggle">ABOUT</button>
        </div>
    </footer>


</body>

</html>
