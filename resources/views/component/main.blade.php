<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Hotel Krinoscco Booking Website">
    <title>Hotel Krinoscco</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('asset/images/favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Roboto+Mono:wght@100..700&display=swap"
        rel="stylesheet">

    <!-- Swiper CSS (For Carousel/Slider) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- <!-- Tailwind CSS -->
    @vite('resources/css/app.css') --}}

    <!-- Global Styles -->
    <style>
        html,
        body {
            overflow-x: hidden;
            overflow-y: auto;
            scroll-behavior: smooth;
            /* Enables smooth scrolling */
        }

        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #8B4513;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            transition: opacity 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        #backToTop:hover {
            background-color: #9e5018;
        }

        #backToTop .material-icons {
            font-size: 24px;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50">
        <div class="relative flex items-center justify-center">
            <div
                class="animate-spin rounded-full h-24 w-24 border-t-4 border-b-4 border-transparent flex items-center justify-center">
                <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" class="h-auto w-auto">
            </div>
        </div>
    </div>

    <!-- Header -->
    @include('component.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('component.footer')

    <!-- Back to Top Button with Google Icon -->
    <button id="backToTop" title="Back to Top">
        <span class="material-icons">arrow_upward</span>
    </button>

    <!-- Swiper JS (For Sliders) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- In <head> or before </body> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById("preloader");
            const backToTop = document.getElementById("backToTop");

            // Preloader Fade Out
            if (preloader) {
                window.addEventListener("load", function() {
                    preloader.style.opacity = "0";
                    setTimeout(() => {
                        preloader.style.display = "none";
                    }, 500);
                });
            }

            // Show/hide Back to Top button
            window.addEventListener("scroll", function() {
                if (window.scrollY > 400) {
                    backToTop.style.display = "flex";
                } else {
                    backToTop.style.display = "none";
                }
            });

            // Scroll back to top smoothly when button clicked
            backToTop.addEventListener("click", function() {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById("preloader");
            const backToTop = document.getElementById("backToTop");

            const isHome = window.location.pathname === "/" || window.location.pathname === "/index.html";

            // Preloader only on home screen
            if (preloader && isHome) {
                window.addEventListener("load", function() {
                    preloader.style.opacity = "0";
                    setTimeout(() => {
                        preloader.style.display = "none";
                    }, 500);
                });
            } else if (preloader) {
                // Immediately hide preloader on non-home pages
                preloader.style.display = "none";
            }

            // Show/hide Back to Top button
            window.addEventListener("scroll", function() {
                if (window.scrollY > 400) {
                    backToTop.style.display = "flex";
                } else {
                    backToTop.style.display = "none";
                }
            });

            // Scroll back to top smoothly when button clicked
            backToTop.addEventListener("click", function() {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        });
    </script>


</body>

</html>
