<style>
    .premium-header {
        background: linear-gradient(135deg, rgba(13, 6, 48, .98), rgba(25, 12, 90, .98));
        position: relative;
        z-index: 50;
        border-bottom: 3px solid burlywood;
    }

    .header-shimmer {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .header-shimmer::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .06), transparent);
        transform: translateX(-100%);
        animation: headerShimmer 4s infinite;
    }

    @keyframes headerShimmer {
        100% {
            transform: translateX(100%);
        }
    }

    .desktop-nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
        color: #d1d5db;
        padding: .65rem .35rem;
        font-size: .82rem;
        font-weight: 500;
        transition: color .2s ease;
    }

    .desktop-nav-link:hover {
        color: #fff;
    }

    .desktop-nav-link::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 3px;
        width: 0;
        height: 2px;
        transform: translateX(-50%);
        background: #fbbf24;
        transition: width .25s ease;
    }

    .desktop-nav-link:hover::after {
        width: 100%;
    }

    .desktop-dropdown-menu {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        width: 210px;
        padding: .5rem;
        border-radius: .75rem;
        background: rgba(13, 6, 48, .98);
        border: 1px solid rgba(251, 191, 36, .22);
        box-shadow: 0 18px 40px rgba(0, 0, 0, .35);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px);
        transition: opacity .2s ease, transform .2s ease, visibility .2s ease;
    }

    .desktop-dropdown:hover>.desktop-dropdown-menu,
    .desktop-dropdown:focus-within>.desktop-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .desktop-dropdown-item {
        display: block;
        padding: .7rem .8rem;
        border-radius: .5rem;
        color: #d1d5db;
        font-size: .875rem;
        transition: background .2s ease, color .2s ease;
    }

    .desktop-dropdown-item:hover {
        color: #fff;
        background: rgba(147, 51, 234, .2);
    }

    .mobile-menu-panel {
        max-height: calc(100vh - 84px);
        overflow-y: auto;
        background: rgba(13, 6, 48, .99);
        box-shadow: 0 18px 35px rgba(0, 0, 0, .35);
    }
</style>

<header class="premium-header">
    <div class="header-shimmer"></div>

    <div class="relative mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-3">

            <!-- Logo and hotel title (mobile + desktop) -->
            <div class="flex min-w-0 flex-shrink-0 items-center gap-3">
                <a href="/" class="flex-shrink-0" aria-label="Hotel Krinoscco Home">
                    <img src="{{ asset('asset/images/logo.png') }}" alt="Hotel Krinoscco Logo"
                        class="h-14 w-14 rounded-full object-contain sm:h-16 sm:w-16 lg:h-20 lg:w-20">
                </a>

                <div class="min-w-0 leading-tight">
                    <div
                        class="whitespace-nowrap text-base font-semibold tracking-wide text-white sm:text-lg lg:text-base xl:text-lg">
                        Hotel Krinoscco
                    </div>
                    <div
                        class="mt-1 whitespace-nowrap text-xs tracking-wide text-amber-300 sm:text-sm lg:text-xs xl:text-sm">
                        Crescent Restaurant
                    </div>
                </div>
            </div>

            <!-- Desktop navigation -->
            <nav class="hidden items-center gap-2 lg:flex xl:gap-4" aria-label="Main navigation">
                <a href="/" class="desktop-nav-link">Home</a>

                <!-- About dropdown -->
                <div class="desktop-dropdown relative">
                    <button type="button" class="desktop-nav-link gap-1">
                        About
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="desktop-dropdown-menu">
                        <a href="{{ route('about') }}" class="desktop-dropdown-item">About Us</a>
                        <a href="{{ route('careers') }}" class="desktop-dropdown-item">Careers</a>
                        <a href="{{ route('gallery') }}" class="desktop-dropdown-item">Gallery</a>
                        <a href="{{ route('contact-us') }}" class="desktop-dropdown-item">Contact Us</a>
                    </div>
                </div>

                <!-- Accommodation dropdown -->
                <div class="desktop-dropdown relative">
                    <button type="button" class="desktop-nav-link gap-1">
                        Accommodation
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="desktop-dropdown-menu">
                        <a href="{{ route('accommodation.standard') }}" class="desktop-dropdown-item">Standard Room</a>
                        <a href="{{ route('accommodation.deluxe') }}" class="desktop-dropdown-item">Deluxe Room</a>
                        <a href="{{ route('accommodation.suite') }}" class="desktop-dropdown-item">Suite Room</a>
                    </div>
                </div>

                <a href="{{ route('crescentfacilities') }}" class="desktop-nav-link">Dining</a>

                <!-- Banquets dropdown -->
                <div class="desktop-dropdown relative">
                    <button type="button" class="desktop-nav-link gap-1">
                        Banquets & Meetings
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="desktop-dropdown-menu">
                        <a href="{{ route('banquets.lawn') }}" class="desktop-dropdown-item">Lawn</a>
                        <a href="{{ route('banquets.ballroom') }}" class="desktop-dropdown-item">Royal Ballroom</a>
                        <a href="{{ route('banquets.ontherock') }}" class="desktop-dropdown-item">On the Rocks</a>
                        <a href="{{ route('banquets.elite1') }}" class="desktop-dropdown-item">Elite 1</a>
                        <a href="{{ route('banquets.elite2') }}" class="desktop-dropdown-item">Elite 2</a>
                    </div>
                </div>

                <a href="{{ route('rules-and-regulations') }}" class="desktop-nav-link">Rules & Regulations</a>
                <a href="{{ route('explore-ayodhya') }}" class="desktop-nav-link">Explore Ayodhya</a>

                <a href="{{ route('dashboard') }}" class="desktop-nav-link" aria-label="Dashboard">
                    <svg class="h-6 w-6" viewBox="0 -960 960 960" fill="currentColor">
                        <path
                            d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z" />
                    </svg>
                </a>
            </nav>

            <!-- Mobile menu button -->
            <button type="button" id="mobile-menu-button"
                class="inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md border border-amber-300/50 text-white transition hover:bg-white/10 lg:hidden"
                aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu">
                <svg id="menu-open-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile navigation -->
    <div id="mobile-menu"
        class="mobile-menu-panel absolute left-0 top-full hidden w-full border-t border-purple-500/30 lg:hidden">
        <nav class="space-y-1 px-3 py-3" aria-label="Mobile navigation">
            <a href="/"
                class="block rounded-lg px-3 py-2.5 font-medium text-gray-200 hover:bg-white/10 hover:text-white">Home</a>

            <div>
                <button type="button"
                    class="mobile-submenu-button flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left font-medium text-gray-200 hover:bg-white/10 hover:text-white"
                    data-target="mobile-about-submenu">
                    <span>About</span>
                    <svg class="submenu-arrow h-4 w-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-about-submenu" class="hidden space-y-1 py-1 pl-4">
                    <a href="{{ route('about') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">About
                        Us</a>
                    <a href="{{ route('careers') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Careers</a>
                    <a href="{{ route('gallery') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Gallery</a>
                    <a href="{{ route('contact-us') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Contact
                        Us</a>
                </div>
            </div>

            <div>
                <button type="button"
                    class="mobile-submenu-button flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left font-medium text-gray-200 hover:bg-white/10 hover:text-white"
                    data-target="mobile-accommodation-submenu">
                    <span>Accommodation</span>
                    <svg class="submenu-arrow h-4 w-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-accommodation-submenu" class="hidden space-y-1 py-1 pl-4">
                    <a href="{{ route('accommodation.standard') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Standard
                        Room</a>
                    <a href="{{ route('accommodation.deluxe') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Deluxe
                        Room</a>
                    <a href="{{ route('accommodation.suite') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Suite
                        Room</a>
                </div>
            </div>

            <a href="{{ route('crescentfacilities') }}"
                class="block rounded-lg px-3 py-2.5 font-medium text-gray-200 hover:bg-white/10 hover:text-white">Dining</a>

            <div>
                <button type="button"
                    class="mobile-submenu-button flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left font-medium text-gray-200 hover:bg-white/10 hover:text-white"
                    data-target="mobile-banquets-submenu">
                    <span>Banquets & Meetings</span>
                    <svg class="submenu-arrow h-4 w-4 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-banquets-submenu" class="hidden space-y-1 py-1 pl-4">
                    <a href="{{ route('banquets.lawn') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Lawn</a>
                    <a href="{{ route('banquets.ballroom') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Royal
                        Ballroom</a>
                    <a href="{{ route('banquets.ontherock') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">On
                        the Rocks</a>
                    <a href="{{ route('banquets.elite1') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Elite
                        1</a>
                    <a href="{{ route('banquets.elite2') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white">Elite
                        2</a>
                </div>
            </div>

            <a href="{{ route('rules-and-regulations') }}"
                class="block rounded-lg px-3 py-2.5 font-medium text-gray-200 hover:bg-white/10 hover:text-white">Rules
                & Regulations</a>
            <a href="{{ route('explore-ayodhya') }}"
                class="block rounded-lg px-3 py-2.5 font-medium text-gray-200 hover:bg-white/10 hover:text-white">Explore
                Ayodhya</a>
            <a href="{{ route('dashboard') }}"
                class="block rounded-lg px-3 py-2.5 font-medium text-gray-200 hover:bg-white/10 hover:text-white">Dashboard</a>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', function() {
                const isOpening = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden', isOpening);
                closeIcon.classList.toggle('hidden', !isOpening);
                menuButton.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
            });
        }

        document.querySelectorAll('.mobile-submenu-button').forEach(function(button) {
            button.addEventListener('click', function() {
                const submenu = document.getElementById(button.dataset.target);
                const arrow = button.querySelector('.submenu-arrow');
                if (!submenu) return;

                submenu.classList.toggle('hidden');
                if (arrow) arrow.classList.toggle('rotate-180');
            });
        });
    });
</script>
