@extends('component.main')
@section('content')
<head>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a365d',
                        secondary: '#2c5282',
                        accent: '#ecc94b',
                        luxuryPurple: '#1C1444',
                        luxuryGold: '#D4A017',
                        luxuryBrown: '#8B4513',
                        luxuryCream: '#DEB887'
                    },
                    boxShadow: {
                        'luxury': '0 10px 25px -5px rgba(0, 0, 0, 0.2), 0 5px 10px -5px rgba(0, 0, 0, 0.15)',
                        'luxury-lg': '0 20px 40px -10px rgba(0, 0, 0, 0.25)'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .luxury-font {
            font-family: 'Playfair Display', serif;
        }

        .smooth-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
    </head>

    <body class="bg-gray-50">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-luxuryPurple text-white p-4 md:min-h-screen">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold luxury-font">Krinoscco Stay</h1>
                <button class="md:hidden text-white" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="hidden md:block" id="sidebarMenu">
                <div
                    class="mb-6 p-3 bg-opacity-20 bg-black rounded-lg flex items-center smooth-transition hover:bg-opacity-30">
                    <div class="w-10 h-10 rounded-full bg-luxuryCream flex items-center justify-center mr-3">
                        <span class="text-luxuryPurple font-bold">{{ collect(explode(' ', auth()->user()->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('') }}</span>
                    </div>
                    <div>
                        <p class="font-medium">Hello, {{auth()->user()->name}}</p>
                        <p class="text-xs text-gray-300">Diamond Member</p>
                    </div>
                </div>

                <ul class="space-y-2">

                    <li>
                        <a href="{{ route('user.dashboard') }}"
                           class="block p-3 rounded smooth-transition
           {{ Route::is('user.dashboard') ? 'bg-black bg-opacity-20 text-white' : '' }}
           hover:bg-opacity-20 hover:bg-black">
                            <i class="fas fa-calendar-alt mr-2"></i> My Bookings
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('user.profile') }}"
                           class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-red-200 hover:text-red-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>

                    </li>
                </ul>

                <div class="mt-8 pt-4 border-t border-gray-600">
                    <h3 class="text-sm uppercase text-gray-400 mb-2">Need Help?</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                               class="block p-2 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-sm">
                                <i class="fas fa-question-circle mr-2"></i> Support
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="block p-2 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-sm">
                                <i class="fas fa-phone-alt mr-2"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-6">
        @yield('user-dashboard-content')
        </main>
        <!-- Footer -->
        {{-- <footer class="text-center text-sm text-gray-600 border-t pt-6">
            <p class="luxury-font text-luxuryPurple">Copyright © 2023 Hotel Krinoscco</p>
            <p class="mt-1">Powered by <span class="text-luxuryBrown">Real Victory Groups</span></p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Privacy Policy</a>
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Terms of Service</a>
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Accessibility</a>
            </div>
        </footer> --}}
        </main>
    </div>

    <script>
        // Toggle mobile menu
        document.getElementById('menuToggle').addEventListener('click', function() {
            const menu = document.getElementById('sidebarMenu');
            menu.classList.toggle('hidden');

            // Change icon based on state
            const icon = this.querySelector('i');
            if (menu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });

        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    </body>
@endsection
