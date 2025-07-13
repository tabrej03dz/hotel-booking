<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 h-24 z-50 relative">
    <!-- Container -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 bg-white">
        <div class="flex justify-between h-16">
            <!-- Left: Logo & Main Nav -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="h-9 w-auto text-gray-800" />
                    </a>
                </div>

                <!-- Navigation -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 text-sm font-medium text-gray-700 space-x-6" x-data="{ open: false }">

                    <!-- Dashboard (Outside Dropdown) -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                    </x-nav-link>

                    <!-- Dropdown for Roles, Permissions, Users -->
                    <div class="relative">
                        <button @click="open = !open" class="flex items-center space-x-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md">
                            <i class="fas fa-users-cog text-gray-600"></i>
                            <span>Admin Tools</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute z-50 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">

                            @can('view permission')
                            <x-nav-link :href="route('permission.index')" :active="request()->routeIs('permission.index')" class="block px-4 py-2 text-left">
                                <i class="fas fa-key mr-1"></i> Permissions
                            </x-nav-link>
                            @endcan

                            @can('view roles')
                            <x-nav-link :href="route('role.index')" :active="request()->routeIs('role.index')" class="block px-4 py-2 text-left">
                                <i class="fas fa-user-shield mr-1"></i> Roles
                            </x-nav-link>
                            @endcan

                            @can('view users')
                            <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" class="block px-4 py-2 text-left">
                                <i class="fas fa-users mr-1"></i> Users
                            </x-nav-link>
                            @endcan

                        </div>
                    </div>

                     @can('view carriar')
                    <x-nav-link :href="route('carriar.index')" :active="request()->routeIs('carriar*')">
                        Carriar
                    </x-nav-link>

                    @endcan
                    @can('view hotel')
                    <x-nav-link :href="route('hotel.index')" :active="request()->routeIs('hotel*')">
                        Hotels
                    </x-nav-link>
                    @endcan

                    @can('view room type')
                    <x-nav-link :href="route('room-type.index')" :active="request()->routeIs('room-type*')">
                        Room type
                    </x-nav-link>
                    @endcan
                    @can('view room')
                    <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms*')">
                        Rooms
                    </x-nav-link>
                    @endcan

                    @can('view booking')
                    <x-nav-link :href="route('booking.index')" :active="request()->routeIs('booking*')">
                        Bookings
                    </x-nav-link>
                    @endcan

                    @can('view payment')
                    <x-nav-link :href="route('payment.index')" :active="request()->routeIs('payment*')">
                        Payments
                    </x-nav-link>
                    @endcan

                    @can('view amenity')
                    <x-nav-link :href="route('amenity.index')" :active="request()->routeIs('amenity*')">
                        Amenity
                    </x-nav-link>
                    @endcan


                    @can('view availabilities and rates')
                        <x-nav-link :href="route('availability-rate.index')" :active="request()->routeIs('availability-rate*')">
                            Availabilities & Rates
                        </x-nav-link>
                    @endcan

                    @can('view additional services')
                        <x-nav-link :href="route('additional-service.index')" :active="request()->routeIs('additional-service*')">
                            Additional Services
                        </x-nav-link>
                    @endcan

                        <x-nav-link :href="route('package-booking.index')" :active="request()->routeIs('package-booking*')">
                            Package Booking
                        </x-nav-link>
                </div>
            </div>



            <!-- Right: Settings -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }} ({{ Auth::user()->roles->pluck('name')->implode(', ') }})</div>
                            <div class="ms-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition"
                    aria-controls="mobile-menu" :aria-expanded="open">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden bg-white z-50" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-tachometer-alt mr-1"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @can('view permission')
            <x-responsive-nav-link :href="route('permission.index')" :active="request()->routeIs('permission.index')">
                <i class="fas fa-key mr-1"></i> Permissions
            </x-responsive-nav-link>
            @endcan

            @can('view roles')
            <x-responsive-nav-link :href="route('role.index')" :active="request()->routeIs('role.index')">
                <i class="fas fa-user-shield mr-1"></i> Roles
            </x-responsive-nav-link>
            @endcan

            @can('view users')
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                <i class="fas fa-users mr-1"></i> Users
            </x-responsive-nav-link>
            @endcan




        </div>

        <!-- Mobile Profile Section -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link> --}}

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
