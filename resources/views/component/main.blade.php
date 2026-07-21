<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="{{asset('asset/images/favicon.png')}}" type="image/x-icon">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18202649628">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-18202649628');
    </script>

    <title>Hotel Krinoscco – Hotels in Ayodhya</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html,
        body {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 999px;
            background: #8B4513;
            color: #fff;
            display: none;
            justify-content: center;
            align-items: center;
            border: none;
            cursor: pointer;
            z-index: 999;
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- PRELOADER --}}
    <div id="preloader"
        class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">

        <img src="{{ asset('asset/images/logo.png') }}"
            alt="Logo"
            class="w-24">
    </div>

    {{-- HEADER --}}
    @include('component.header')

    {{-- MAIN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('component.footer')

    {{-- BACK TO TOP --}}
    <button id="backToTop">
        ↑
    </button>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: {!! json_encode(session('success')) !!}
            });
        </script>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: {!! json_encode(session('error')) !!}
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let preloader = document.getElementById('preloader');
            let backToTop = document.getElementById('backToTop');

            window.addEventListener('load', function() {
                if (preloader) {
                    preloader.style.display = 'none';
                }
            });

            window.addEventListener('scroll', function() {

                if (window.scrollY > 300) {
                    backToTop.style.display = 'flex';
                } else {
                    backToTop.style.display = 'none';
                }
            });

            backToTop.addEventListener('click', function() {

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

            });

        });
    </script>

</body>
</html>