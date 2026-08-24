<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- =========================================================
        PRIMARY SEO
    ========================================================== --}}
    <title>
        @yield('title', 'Hotel Krinoscco Ayodhya | Luxury Hotel Near Ram Mandir')
    </title>

    <meta name="description"
          content="@yield('meta_description', 'Book your stay at Hotel Krinoscco Ayodhya. Located at Ram Path, Amaniganj, near Shri Ram Janmabhoomi, the hotel offers luxury rooms, suites, restaurant, banquet halls, lawn, free Wi-Fi and modern amenities.')">

    <meta name="keywords"
          content="@yield('meta_keywords', 'Hotel Krinoscco Ayodhya, Hotel Krinoscco Ayodhya, hotels in Ayodhya, luxury hotel in Ayodhya, hotel near Ram Mandir Ayodhya, hotel near Ram Janmabhoomi, hotel on Ram Path Ayodhya, accommodation in Ayodhya, banquet hall in Ayodhya, best hotel in Ayodhya')">

    <meta name="author" content="Hotel Krinoscco Ayodhya">

    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <meta name="googlebot" content="index, follow">

    <meta name="bingbot" content="index, follow">

    <meta name="theme-color" content="#8B4513">

    <meta name="application-name" content="Hotel Krinoscco Ayodhya">

    <meta name="apple-mobile-web-app-title" content="Hotel Krinoscco Ayodhya">

    <link rel="canonical" href="@yield('canonical', url()->current())">


    {{-- =========================================================
        FAVICON AND WEBSITE ICONS
        Files location: public/favicon_io/
    ========================================================== --}}
    <link rel="icon"
          type="image/x-icon"
          href="{{ asset('favicon_io/favicon.ico') }}">

    <link rel="shortcut icon"
          type="image/x-icon"
          href="{{ asset('favicon_io/favicon.ico') }}">

    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="{{ asset('favicon_io/favicon-16x16.png') }}">

    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="{{ asset('favicon_io/favicon-32x32.png') }}">

    <link rel="apple-touch-icon"
          sizes="180x180"
          href="{{ asset('favicon_io/apple-touch-icon.png') }}">

    <link rel="icon"
          type="image/png"
          sizes="192x192"
          href="{{ asset('favicon_io/android-chrome-192x192.png') }}">

    <link rel="icon"
          type="image/png"
          sizes="512x512"
          href="{{ asset('favicon_io/android-chrome-512x512.png') }}">


    {{-- =========================================================
        OPEN GRAPH – FACEBOOK, WHATSAPP, LINKEDIN
    ========================================================== --}}
    <meta property="og:type" content="website">

    <meta property="og:site_name" content="Hotel Krinoscco Ayodhya">

    <meta property="og:title"
          content="@yield('og_title', 'Hotel Krinoscco Ayodhya | Luxury Hotel Near Ram Mandir')">

    <meta property="og:description"
          content="@yield('og_description', 'Experience luxury and comfort at Hotel Krinoscco Ayodhya. Located on Ram Path, Amaniganj, close to Shri Ram Janmabhoomi, railway stations and Ayodhya Airport.')">

    <meta property="og:url"
          content="@yield('canonical', url()->current())">

    <meta property="og:image"
          content="@yield('og_image', asset('asset/images/logo.png'))">

    <meta property="og:image:secure_url"
          content="@yield('og_image', asset('asset/images/logo.png'))">

    <meta property="og:image:alt"
          content="Hotel Krinoscco Ayodhya">

    <meta property="og:locale" content="en_IN">


    {{-- =========================================================
        TWITTER/X CARD
    ========================================================== --}}
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
          content="@yield('twitter_title', 'Hotel Krinoscco Ayodhya | Luxury Hotel Near Ram Mandir')">

    <meta name="twitter:description"
          content="@yield('twitter_description', 'Stay at Hotel Krinoscco Ayodhya on Ram Path, Amaniganj. Luxury rooms, suites, dining, banquets and modern hotel facilities.')">

    <meta name="twitter:image"
          content="@yield('og_image', asset('asset/images/logo.png'))">


    {{-- =========================================================
        LOCATION SEO
    ========================================================== --}}
    <meta name="geo.region" content="IN-UP">

    <meta name="geo.placename" content="Ayodhya">

    <meta name="geo.position" content="26.7922;82.1998">

    <meta name="ICBM" content="26.7922, 82.1998">


    {{-- =========================================================
        HOTEL STRUCTURED DATA
    ========================================================== --}}
    <?php
        $hotelSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Hotel',
            '@id' => url('/') . '#hotel',
            'name' => 'Hotel Krinoscco Ayodhya',
            'alternateName' => 'Hotel Krinoscco Ayodhya',
            'url' => url('/'),
            'logo' => asset('asset/images/logo.png'),
            'image' => asset('asset/images/logo.png'),
            'description' => 'Hotel Krinoscco  is a luxury hotel located on Ram Path, Amaniganj, Ayodhya, offering premium rooms, suites, restaurant, banquet halls, conference facilities and modern amenities.',
            'telephone' => [
                '+91-7275002525',
                '+91-7275092525',
            ],
            'email' => 'info@krinoscco.com',
            'priceRange' => '₹₹₹',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Ram Path, Amaniganj',
                'addressLocality' => 'Ayodhya',
                'addressRegion' => 'Uttar Pradesh',
                'postalCode' => '224001',
                'addressCountry' => 'IN',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 26.7922,
                'longitude' => 82.1998,
            ],
            'amenityFeature' => [
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Free Wi-Fi',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Restaurant',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Room Service',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Free Parking',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Banquet Hall',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Conference Hall',
                    'value' => true,
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Gymnasium',
                    'value' => true,
                ],
            ],
            'containsPlace' => [
                [
                    '@type' => 'HotelRoom',
                    'name' => 'Standard Room',
                ],
                [
                    '@type' => 'HotelRoom',
                    'name' => 'Deluxe Room',
                ],
                [
                    '@type' => 'HotelRoom',
                    'name' => 'Suite Room',
                ],
            ],
        ];
    ?>

    <script type="application/ld+json">
        {!! json_encode(
            $hotelSchema,
            JSON_UNESCAPED_SLASHES |
            JSON_UNESCAPED_UNICODE |
            JSON_PRETTY_PRINT
        ) !!}
    </script>
    {{-- =========================================================
        GOOGLE ADS
    ========================================================== --}}
    <script async
            src="https://www.googletagmanager.com/gtag/js?id=AW-18202649628">
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'AW-18202649628');
    </script>


    {{-- =========================================================
        CSS AND FONTS
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')

    <style>
        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cormorant Garamond', serif;
        }

        #preloader {
            transition: opacity 0.35s ease, visibility 0.35s ease;
        }

        #preloader.preloader-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        #preloader img {
            animation: preloaderPulse 1.5s ease-in-out infinite;
        }

        @keyframes preloaderPulse {
            0%,
            100% {
                opacity: 0.65;
                transform: scale(0.96);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        #backToTop {
            position: fixed;
            right: 25px;
            bottom: 25px;
            width: 50px;
            height: 50px;
            border: 0;
            border-radius: 50%;
            background: #8B4513;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transform: translateY(15px);
            cursor: pointer;
            z-index: 999;
            transition:
                opacity 0.25s ease,
                visibility 0.25s ease,
                transform 0.25s ease,
                background-color 0.25s ease;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.35);
        }

        #backToTop.show {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }

        #backToTop:hover {
            background: #6f3410;
        }

        #backToTop:focus-visible {
            outline: 3px solid rgba(139, 69, 19, 0.35);
            outline-offset: 4px;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">

    {{-- PRELOADER --}}
    <div id="preloader"
         class="fixed inset-0 z-[9999] flex items-center justify-center bg-white"
         role="status"
         aria-label="Website loading">

        <img src="{{ asset('asset/images/logo.png') }}"
             alt="Hotel Krinoscco Ayodhya Logo"
             width="160"
             height="160"
             class="h-auto w-32 object-contain"
             onerror="this.onerror=null; this.src='{{ asset('favicon_io/android-chrome-512x512.png') }}';">
    </div>


    {{-- HEADER --}}
    @include('component.header')


    {{-- MAIN CONTENT --}}
    <main id="main-content">
        @yield('content')
    </main>


    {{-- FOOTER --}}
    @include('component.footer')


    {{-- BACK TO TOP --}}
    <button id="backToTop"
            type="button"
            aria-label="Back to top"
            title="Back to top">

        <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
    </button>


    {{-- SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: @json(session('success')),
                    confirmButtonColor: '#8B4513'
                });
            });
        </script>
    @endif


    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: @json(session('error')),
                    confirmButtonColor: '#8B4513'
                });
            });
        </script>
    @endif


    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Please check the details',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonColor: '#8B4513'
                });
            });
        </script>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const preloader = document.getElementById('preloader');
            const backToTop = document.getElementById('backToTop');

            const hidePreloader = function () {
                if (!preloader) {
                    return;
                }

                preloader.classList.add('preloader-hidden');

                window.setTimeout(function () {
                    preloader.style.display = 'none';
                }, 400);
            };

            if (document.readyState === 'complete') {
                hidePreloader();
            } else {
                window.addEventListener('load', hidePreloader, {
                    once: true
                });
            }

            // Internet/image error होने पर loader हमेशा न रुके।
            window.setTimeout(hidePreloader, 5000);

            const handleScroll = function () {
                if (!backToTop) {
                    return;
                }

                backToTop.classList.toggle('show', window.scrollY > 300);
            };

            window.addEventListener('scroll', handleScroll, {
                passive: true
            });

            handleScroll();

            if (backToTop) {
                backToTop.addEventListener('click', function () {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

    @stack('scripts')

</body>
</html>
