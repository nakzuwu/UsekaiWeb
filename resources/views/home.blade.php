<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>USEKAI ID</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />

    <link rel="icon" href="{{ asset('images/nkz.png') }}" type="image/png">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- Preload Video -->
    <link rel="preload" as="video" href="{{ asset('webm/preload.webm') }}" type="video/webm" />

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
</head>

<body>
    <!-- PRELOAD VIDEO SCREEN -->
    <div id="preloader">
        <video id="preload-video" autoplay muted playsinline>
            <source src="{{ asset('webm/preload.webm') }}" type="video/webm" />
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container">
        <nav class="navbar-center">
            <a href="https://www.instagram.com/usekai_id" target="_blank">
                <img src="{{ asset('images/usekai.png') }}" alt="USEKAI Logo" class="logo-img" />
            </a>
        </nav>

        <div class="main-content">
            <a class="hover-zone left-zone" href="https://www.youtube.com/@ReikaValencia_Usekai-ID" target="_blank"></a>
            <a class="hover-zone right-zone" href="https://www.youtube.com/@AlsephinaRhea" target="_blank"></a>

            <div class="center-logo hide-on-hover">
                <div class="center-text">
                    <h1><strong>USEKAI ID</strong></h1>
                    <p>Transforming Ideas Into Limitless Possibilities</p>
                </div>
            </div>

            <!-- RHEA -->
            <div class="character-screen rhea-screen">
                <video autoplay muted loop playsinline class="bg-video">
                    <source src="{{ asset('webm/rhea.webm') }}" type="video/webm" />
                </video>
                <div class="info">
                    <p class="name">Alsephina</p>
                    <h1>RHEA</h1>
                    <p class="desc">
                        Booting System... Completed!❤ Alsephina Rhea siap mendampingi mu!
                    </p>
                    <div class="socials">
                        <div class="social-line">
                            <img src="{{ asset('images/youtube.png') }}" alt="yt" />
                            <span>Alsephina Rhea「U-Sekai ID」</span>
                        </div>
                        <div class="social-line">
                            <img src="{{ asset('images/twitter.png') }}" alt="twitter" />
                            <span>@AlsephinaR5</span>
                        </div>
                        <div class="social-line">
                            <img src="{{ asset('images/instagram.png') }}" alt="ig" />
                            <span>@alsephina_rhea</span>
                        </div>
                    </div>
                </div>
                <a href="https://www.youtube.com/@AlsephinaRhea" target="_blank" class="bg-click-link"></a>
            </div>

            <!-- REIKA -->
            <div class="character-screen reika-screen">
                <video autoplay muted loop playsinline class="bg-video">
                    <source src="{{ asset('webm/reika.webm') }}" type="video/webm" />
                </video>
                <div class="info">
                    <p class="name">Valencia</p>
                    <h1>REIKA</h1>
                    <p class="desc">
                        Spesialis ketok magic tongkat sihir dll, pny nkj btw
                    </p>
                    <div class="socials">
                        <div class="social-line">
                            <img src="{{ asset('images/youtube.png') }}" alt="yt" />
                            <span>Reika Valencia「U-Sekai ID」</span>
                        </div>
                        <div class="social-line">
                            <img src="{{ asset('images/twitter.png') }}" alt="twitter" />
                            <span>@ReikaValencia</span>
                        </div>
                        <div class="social-line">
                            <img src="{{ asset('images/instagram.png') }}" alt="ig" />
                            <span>@reika_valencia</span>
                        </div>
                    </div>
                </div>
                <a href="https://www.youtube.com/@ReikaValencia_Usekai-ID" target="_blank" class="bg-click-link"></a>
            </div>

            <footer class="footer-bar hide-on-hover">
                <div class="footer-nav">
                    <button>BLOG</button>
                    <button>TALENT</button>
                    <button id="social-toggle">ABOUT</button>
                </div>
            </footer>

            <!-- POPUPS -->
            <div id="overlay" class="overlay hidden"></div>

            <div id="social-popup" class="social-popup hidden">
                <div class="social-item">
                    <img src="{{ asset('images/discord.png') }}" alt="Discord" />
                    <a href="https://discord.gg/UtvmVRYuhM" target="_blank">Discord</a>
                </div>
                <div class="social-item">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram" />
                    <a href="https://www.instagram.com/usekai_id" target="_blank">Instagram</a>
                </div>
                <div class="social-item">
                    <img src="{{ asset('images/twitter.png') }}" alt="Twitter" />
                    <a href="https://x.com/USekai_Pro" target="_blank">Twitter</a>
                </div>
            </div>

            <div id="info-popup" class="info-popup hidden">
                <p>
                    <strong><em>COMING SOON -NKZ</em></strong>
                </p>
            </div>

            <div id="coming-soon" class="coming-soon hidden">
                <p>
                    <strong><em>COMING SOON -NKZ</em></strong>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
