<style>
    /* Enhanced 3D and premium effects */
    .premium-header {
        background: linear-gradient(135deg,
                rgba(13, 6, 48, 0.95) 0%,
                rgba(25, 12, 90, 0.95) 100%);
        position: relative;
        z-index: 20;
        border-bottom: 4px solid burlywood;
        /* overflow: hidden; */
        /* Added brown border to the bottom */
    }

    .nav-item {
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .nav-item:hover {
        transform: translateZ(20px);
    }

    .nav-item::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg,
                rgba(255, 187, 36, 0),
                rgba(255, 187, 36, 0.3),
                rgba(255, 187, 36, 0));
        transform: translateZ(-1px);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 4px;
    }

    .nav-item:hover::before {
        opacity: 1;
    }

    .nav-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg,
                transparent,
                #FBBF24,
                transparent);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateX(-50%);
    }

    .nav-item:hover::after {
        width: 100%;
    }

    .dropdown-menu {
        backdrop-filter: blur(12px);
        background: rgba(13, 6, 48, 0.85);
        border: 1px solid rgba(147, 51, 234, 0.1);
        box-shadow:
            0 10px 15px -3px rgba(0, 0, 0, 0.3),
            0 4px 6px -4px rgba(0, 0, 0, 0.2),
            0 0 20px rgba(147, 51, 234, 0.15);
        transform: translateY(-10px) translateZ(30px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .dropdown:hover .dropdown-menu {
        transform: translateY(0) translateZ(30px);
        opacity: 1;
        visibility: visible;
    }

    .glass-effect {
        backdrop-filter: blur(12px);
        background: rgba(13, 6, 48, 0.85);
        box-shadow:
            0 10px 30px -10px rgba(147, 51, 234, 0.3),
            0 0 20px rgba(147, 51, 234, 0.15);
    }

    .logo-container {
        position: relative;
        perspective: 1000px;
    }

    .logo-container img {
        transform-style: preserve-3d;
        transition: transform 0.5s ease;
        box-shadow: 0 0 20px rgba(147, 51, 234, 0.2);
    }

    .logo-container:hover img {
        transform: rotateY(10deg) translateZ(20px);
    }

    /* Enhanced shimmer animation */
    .premium-shimmer {
        background: linear-gradient(90deg,
                transparent,
                rgba(147, 51, 234, 0.1),
                transparent);
        position: absolute;
        inset: 0;
        transform: translateX(-100%);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        100% {
            transform: translateX(100%);
        }
    }
</style>

<header class="premium-header border-b border-purple-500/30">
    <div class="premium-shimmer"></div>

    <!-- Rest of the header content remains the same but with updated classes -->
    <div class="relative mx-auto max-w-7xl">
        <div class="px-4 py-2 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo Section with 3D effect -->
                <div class="logo-container flex-shrink-0 flex items-center space-x-4 ">
                    <a href="/"> <img src="{{ asset('asset/images/logo.png') }}" alt="Hotel Krinoscco Logo"
                            class="w-20 h-20 rounded-full flex items-center justify-center">
                        </img></a>
                </div>

                <!-- Desktop Navigation remains the same but will use the enhanced nav-item styles -->
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="/" class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        About
                    </a>

                    <!-- Accommodation Dropdown -->
                    <div class="dropdown relative group">
                        <button
                            class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium inline-flex items-center">
                            <span>Accommodation</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-[#0D0630] ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <a href="{{ route('accommodation.standard') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Standard
                                    Room​</a>
                                <a href="{{ route('accommodation.deluxe') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Deluxe
                                    Room</a>
                                <a href="{{ route('accommodation.suite') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">
                                    Suite Room</a>
                            </div>
                        </div>
                    </div>

                    <!-- Banquets And Meetings Dropdown -->
                    <div class="dropdown relative group">
                        <button
                            class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium inline-flex items-center">
                            <span>Banquets And Meetings</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        {{-- <div
                            class="dropdown-menu absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-[#0D0630] ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <a href="{{ route('banquets.lawn') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Lawn
                                    </a>
                                <a href="{{ route('banquets.ballroom') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Ballroom
                                    </a>
                            </div>
                        </div> --}}
                        <div class="relative group">
                            {{-- <button
                                class="text-white px-4 py-2 text-sm hover:text-purple-300 focus:outline-none focus:text-purple-300">
                                Banquets
                            </button> --}}
                            <div
                                class="dropdown-menu absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-[#0D0630] ring-1 ring-black ring-opacity-5 z-50 hidden group-hover:block md:block">
                                <div class="py-1">
                                    <a href="{{ route('banquets.lawn') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Lawn</a>
                                    <a href="{{ route('banquets.ballroom') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white">Banquet
                                        Hall</a>

                                    <!-- Submenu: Conference Room -->
                                    <div class="flex items-center justify-center h-auto">
                                        <div x-data="{ open: false }" class="relative inline-block text-left">
                                            <button @click="open = !open"
                                                class="inline-flex justify-between w-56 px-4 py-2 text-sm font-medium text-gray-300 hover:bg-purple-600/20 hover:text-white focus:outline-none focus:ring-offset-gray-100">
                                                Conference Hall
                                                <svg class="h-5 w-5 ml-2 transform transition-transform duration-200"
                                                    :class="{ 'rotate-0': open, '-rotate-180': !open }" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                            <div x-show="open" @click.away="open = false" x-transition
                                                class="origin-top-left absolute left-full top-0 ml-2 w-56 rounded-md shadow-lg bg-[#0D0630] text-gray-300 hover:text-white px-2 py-2 z-10">
                                                <a href="{{ route('banquets.elite1') }}"
                                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white focus:outline-none focus:ring-offset-gray-100 rounded-md">Elite
                                                    1</a>
                                                <a href="{{ route('banquets.elite2') }}"
                                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-600/20 hover:text-white focus:outline-none focus:ring-offset-gray-100 rounded-md">Elite
                                                    2</a>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
                                    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

                                </div>
                            </div>
                        </div>

                    </div>

                    <a href="{{ route('rules-and-regulations') }}"
                        class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Rules & Regulations
                    </a>
                    <a href="{{ route('careers') }}"
                        class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Careers
                    </a>
                    <a href="{{ route('gallery') }}"
                        class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Gallery
                    </a>
                    <a href="{{ route('contact-us') }}"
                        class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Contact Us
                    </a>

                    <a href="#" class="nav-item text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg>
                    </a>

                </nav>

                <!-- Mobile menu button with enhanced styling -->
                <div class="flex lg:hidden">
                    <button type="button"
                        class="text-gray-300 hover:text-white transform transition-transform hover:scale-105"
                        id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu remains the same but will use the enhanced glass-effect -->

        <!-- Mobile menu -->
        <div class="hidden lg:hidden absolute top-full left-0 w-full bg-[#0D0630] border-t border-purple-500/30 glass-effect"
            id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Home</a>
                <a href="{{ route('about') }}"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">About</a>

                <!-- Mobile Accommodation submenu -->
                <div class="space-y-1">
                    <button
                        class="w-full text-left text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5 flex justify-between items-center"
                        onclick="toggleSubmenu('accommodation-submenu')">
                        Accommodation
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="accommodation-submenu" class="hidden pl-4">
                        <a href="{{ route('accommodation.standard') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Standard
                            Room</a>
                        <a href="{{ route('accommodation.deluxe') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Deluxe
                            Room</a>
                        <a href="{{ route('accommodation.suite') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Suite
                            Room</a>
                    </div>
                </div>

                <!-- Mobile Banquets submenu -->
                {{-- <div class="space-y-1">
                    <button
                        class="w-full text-left text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5 flex justify-between items-center"
                        onclick="toggleSubmenu('banquets-submenu')">
                        Banquets And Meetings
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="banquets-submenu" class="hidden pl-4">
                        <a href="{{ route('banquets.lawn') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Lawn
                            Package</a>
                        <a href="{{ route('banquets.ballroom') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Ballroom
                            Package</a>
                    </div>
                </div> --}}

                <div class="space-y-1">
                    <!-- Banquets And Meetings -->
                    <button
                        class="w-full text-left text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5 flex justify-between items-center"
                        onclick="toggleSubmenu('banquets-submenu')">
                        Banquets And Meetings
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="banquets-submenu" class="hidden pl-4">
                        <a href="{{ route('banquets.lawn') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">
                            Lawn Package
                        </a>
                        <a href="{{ route('banquets.ballroom') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">
                            Ballroom Package
                        </a>
                    </div>

                    <!-- Conference Room -->
                    <button
                        class="w-full text-left text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5 flex justify-between items-center"
                        onclick="toggleSubmenu('conference-submenu')">
                        Conference Room
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="conference-submenu" class="hidden pl-4">
                        <a href="{{ route('banquets.elite1') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">
                            Elite 1
                        </a>
                        <a href="{{ route('banquets.elite2') }}"
                            class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">
                            Elite 2
                        </a>
                    </div>
                </div>


                <a href="{{ route('rules-and-regulations') }}"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Rules
                    & Regulations</a>
                <a href="{{ route('careers') }}"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Careers</a>
                <a href="{{ route('gallery') }}"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Gallery</a>
                <a href="{{ route('contact-us') }}"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5">Contact
                    Us</a>
                <a href="#"
                    class="block text-gray-300 hover:text-white px-3 py-2 text-base font-medium hover:bg-white/5"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg></a>
            </div>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Mobile submenu toggle
    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);
        submenu.classList.toggle('hidden');
    }

    // Add scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 0) {
            header.classList.add('glass-effect');
        } else {
            header.classList.remove('glass-effect');
        }
    });
</script>
