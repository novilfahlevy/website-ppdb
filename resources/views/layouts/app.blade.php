<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/small-logo.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/impact/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/impact/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/impact/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/impact/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/impact/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    @vite(['resources/css/main.css', 'resources/js/main.js'])

    <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header fixed-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:smaimmanuelkalasan@gmail.com">smaimmanuelkalasan@gmail.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>0274 4469287</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="https://smaimmanuelkalasan.sch.id" target="_blank" class="website"><i class="bi bi-globe"></i></a>
                    <a href="https://www.instagram.com/smaimmanuelkalasan" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <h1 class="sitename">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="logo-img">
                    </h1>
                    <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li>
                            <a href="{{ request()->routeIs('home') ? '#pendaftaran' : route('home') . '#pendaftaran' }}">
                                Pendaftaran
                            </a>
                        </li>
                        <li>
                            <a href="{{ request()->routeIs('home') ? '#persyaratan' : route('home') . '#persyaratan' }}">
                                Persyaratan
                            </a>
                        </li>
                        <li>
                            <a href="{{ request()->routeIs('home') ? '#biaya-pendidikan' : route('home') . '#biaya-pendidikan' }}">
                                Biaya Pendidikan
                            </a>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer" style="background-color: #0c1559; padding: 40px 0 20px;">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <!-- Left column with HOME and social media icons -->
                <div class="col-lg-5 col-md-6">
                    <h2 class="text-white fw-bold mb-4" style="font-size: 28px;">HOME</h2>
                    
                    <div class="d-flex gap-3 mb-4">
                        <a href="#" class="social-icon" style="background-color: #E1306C; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                            <i class="bi bi-instagram text-white"></i>
                        </a>
                        <a href="#" class="social-icon" style="background-color: #1877F2; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                            <i class="bi bi-facebook text-white"></i>
                        </a>
                    </div>
                </div>

                <!-- Right column with contact information -->
                <div class="col-lg-7 col-md-6 text-lg-end">
                    <div class="contact-info">
                        <p class="mb-2 d-flex justify-content-lg-end align-items-center">
                            <span class="text-warning me-3" style="width: 60px; text-align: right;">email</span>
                            <span class="text-white">smaimmanuelkalasan@gmail.com</span>
                        </p>
                        <p class="mb-2 d-flex justify-content-lg-end align-items-center">
                            <span class="text-warning me-3" style="width: 60px; text-align: right;">telpon</span>
                            <span class="text-white">0274 4469287</span>
                        </p>
                        <p class="mb-2 d-flex justify-content-lg-end align-items-center">
                            <span class="text-warning me-3" style="width: 60px; text-align: right;">Web</span>
                            <span class="text-white">www.smaimmanuelkalasan.sch.id</span>
                        </p>
                        <p class="mb-2 d-flex justify-content-lg-end align-items-center">
                            <span class="text-warning me-3" style="width: 60px; text-align: right;">Blog</span>
                            <span class="text-white">www.smaimmanuelkalasan-yogyakarta.blogspot.com</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="text-center text-white mt-5 pt-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
                <p class="mb-0">© Sma Immanuel Kalasan Jogja</p>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center shadow">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/impact/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/impact/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/impact/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/impact/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/impact/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/impact/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/impact/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/impact/isotope-layout/isotope.pkgd.min.js') }}"></script>

    @stack('scripts')

</body>

</html>
