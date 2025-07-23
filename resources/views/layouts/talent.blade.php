<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .footer-bar {
            color: white;
            padding: 10px 20px;
            left: 0;
            right: 0;
            z-index: 50;
            position: fixed;
            bottom: -30px;
            /* Awalnya tersembunyi */
            transition: bottom 0.5s ease;
        }

        .footer-bar.show-on-load {
            bottom: 0;
            /* Muncul ke atas */
        }

        .footer-hover-zone {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            z-index: 40;
        }

        .footer-hover-zone:hover+.footer-bar,
        .footer-bar:hover {
            bottom: 0;
        }
    </style>

</head>

<body>
    <main>
        @yield('content')
    </main>

    <!-- Hover Zone -->
    <div class="footer-hover-zone"></div>

    <!-- Footer bar yang auto-hide -->
    <footer class="footer-bar pt-6">
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const footerBar = document.querySelector(".footer-bar");

            // Tambahkan class untuk memunculkan navbar
            footerBar.classList.add("show-on-load");

            // Setelah 2 detik, kembalikan ke posisi semula (hide)
            setTimeout(() => {
                footerBar.classList.remove("show-on-load");
            }, 2000);
        });
    </script>

</body>

</html>
