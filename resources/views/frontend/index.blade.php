@extends('component.main')

@section('content')
    <style>
        /* Parallax Effect for Background */
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Glass Effect */
        .glass-effect {
            background: rgba(26, 26, 46, 0.8);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Hover Lift Effect */
        .hover-lift {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* Animated Gradient Effect */
        .animated-gradient {
            background: linear-gradient(270deg, #1a1a2e, #16213e, #8B4513);
            background-size: 600% 600%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Scroll Reveal Effect */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Ripple Button Effect */
        .ripple-button {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .ripple-button:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease-out, height 0.6s ease-out;
        }

        .ripple-button:hover:after {
            width: 300px;
            height: 300px;
        }

        .ripple-button:hover {
            transform: scale(1.05) translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Scroll Indicator - Smooth Bounce Animation */
        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

    <style>
        .room-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
            pointer-events: none;
        }

        .room-image.active {
            opacity: 1;
            pointer-events: auto;
        }

        .room-tab {
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 14px;
            transition: all 0.3s;
        }

        .room-tab.active-tab {
            background: linear-gradient(90deg, #8B4513, #D4A017);
            font-weight: bold;
            color: #fff;
        }
    </style>



    <!-- Hero Section with Video Background -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background with improved loading -->
        <video autoplay muted loop playsinline class="absolute w-full h-full object-cover filter brightness-75">
            <source src="{{ asset('asset/images/Full-Hotel-video.mp4') }}" type="video/mp4">
        </video>

        <!-- Enhanced glass effect overlay -->
        <div class="absolute inset-0 "></div>

        <!-- Main Content Container -->
        <div class="relative container mx-auto px-6 md:px-12 h-full flex flex-col justify-center">
            <div class="max-w-4xl text-white transform transition-all duration-700 opacity-100">
                <h1 class="text-6xl md:text-7xl font-bold mb-6 leading-tight tracking-tight drop-shadow-lg">
                    Experience Luxury
                    <span class="text-[#8B4513] block hover:text-[#9B5523] transition-colors duration-300">Redefined</span>
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-200 font-light leading-relaxed tracking-wide">
                    Where timeless elegance meets modern innovation
                </p>

                <!-- Enhanced Button Container -->
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                    <a href="#booking"
                        class="ripple-button bg-[#8B4513] text-white px-10 py-4 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                        Book Now
                    </a>
                    <a href="#virtual-tour"
                        class="ripple-button bg-transparent border-2 border-white text-white px-10 py-4 rounded-lg text-lg font-semibold hover:bg-white/10 hover:text-white transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                        Virtual Tour
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
            <div class="animate-bounce hover:animate-none cursor-pointer group">
                <i
                    class="fas fa-chevron-down text-white text-3xl opacity-75 group-hover:opacity-100 transition-opacity duration-300"></i>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section class="relative py-32 overflow-hidden bg-gradient-to-b from-white to-gray-50">
        <!-- Decorative Elements -->
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#8B4513] opacity-5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-0 w-96 h-96 bg-[#1a1a2e] opacity-5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
        </div>

        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-16 relative">
                <!-- Image Section with Multiple Images -->
                <div class="w-full lg:w-1/2 space-y-6 group">
                    <!-- Main Image with Hover Effect -->
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-transform duration-500 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e]/20 to-transparent z-10"></div>
                        <img id="main-image" src="{{ asset('asset/images/cafe.jpg') }}" alt="Hotel Krinoscco Main"
                            class="w-full h-[500px] object-cover transform transition-transform duration-700 hover:scale-110" />
                        <!-- Floating Badge -->
                        <div
                            class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg z-20">
                            <span class="text-[#1a1a2e] font-semibold">Est. 2021</span>
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="grid grid-cols-3 gap-4 transition-opacity duration-500">
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/DSC_4058-scaled.jpg') }}" alt="Hotel Detail 1"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/DSC02813-1-scaled.jpg') }}" alt="Hotel Detail 2"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/luxury-room.jpg') }}" alt="Hotel Detail 3"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="w-full lg:w-1/2 space-y-8">
                    <!-- Section Title -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-[2px] bg-[#8B4513]"></div>
                            <span class="text-[#8B4513] font-semibold uppercase tracking-wider">About Us</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold text-[#1a1a2e] leading-tight">
                            Where Every Moment
                            <span class="relative">Resonates
                                <div class="absolute bottom-0 left-0 w-full h-[8px] bg-[#8B4513]/20"></div>
                            </span> Luxury
                        </h2>
                    </div>

                    <!-- Content -->
                    <div class="space-y-6">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            The standard room has all the essential conveniences and is tastefully designed for your
                            enjoyable stay.Hotel Krinoscco redefines luxury with an unwavering commitment to international
                            standards of service and style. Setting a new benchmark for unparalleled accommodation and
                            exceptional value, it embodies the epitome of contemporary elegance. Here, the fusion of “high
                            tech” amenities seamlessly intertwines with an unparalleled “high touch” service ethos—a rarity
                            in the tapestry of Ayodhya’s hospitality landscape.
                        </p>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Centrally located in the heart of Ayodhya, a mere 15-minute taxi ride from Ayodhya Cantt. &
                            Ayodhya railway stations, and conveniently proximate to the burgeoning ayodhya airport, Hotel
                            Krinoscco stands as an epitome of accessibility. Merely two hours by road from the bustling
                            Lucknow airport, it offers a gateway to seamless luxury and unmatched convenience in this
                            historical city. We are delivering the highest level of pleasure and a wonderful experience.
                        </p>

                        <!-- Feature List -->
                        <div class="grid grid-cols-2 gap-6 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#1a1a2e]">Prime Location</h4>
                                    <p class="text-sm text-gray-600">Heart of Ayodhya</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                                    <i class="fas fa-clock text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#1a1a2e]">Quick Access</h4>
                                    <p class="text-sm text-gray-600">15min from stations</p>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="flex items-center gap-6 pt-4">
                            <a href="{{ route('about') }}"
                                class="group relative px-8 py-4 bg-[#8B4513] text-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-[#6B3410] transform translate-y-full transition-transform duration-300 group-hover:translate-y-0">
                                </div>
                                <span class="relative z-10 font-semibold">Know More</span>
                            </a>
                            <a href="{{ route('gallery') }}"
                                class="group flex items-center gap-3 text-[#1a1a2e] font-semibold hover:text-[#8B4513] transition-colors duration-300">
                                <span>View Gallery</span>
                                <i
                                    class="fas fa-arrow-right transform transition-transform duration-300 group-hover:translate-x-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Explore Our Rooms -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-5xl font-bold text-white mb-12 text-center">
                Explore Our Rooms
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                <p class="text-lg text-gray-400 mt-4 max-w-2xl mx-auto">Step into luxury with a visual preview of our
                    premium rooms.</p>
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Image Viewer with Tabs -->
                <div class="space-y-8">
                    <div class="bg-[#0f172a] rounded-2xl h-[500px] relative overflow-hidden shadow-xl">
                        <!-- Room Images -->
                        <div class="room-image" id="bedroomImage">
                            <img src="{{ asset('asset/luxury/luxury-3.jpg') }}"
                                class="w-full h-full object-cover transition-opacity duration-700">
                        </div>
                        <div class="room-image" id="bathroomImage">
                            <img src="{{ asset('asset/luxury/luxury-5.jpg') }}"
                                class="w-full h-full object-cover transition-opacity duration-700">
                        </div>
                        <div class="room-image" id="livingareaImage">
                            <img src="{{ asset('asset/luxury/luxury-7.jpg') }}"
                                class="w-full h-full object-cover transition-opacity duration-700">
                        </div>

                        <!-- Tab Navigation -->
                        <div class="absolute bottom-0 left-0 right-0 bg-black/70 p-4 rounded-t-2xl">
                            <div class="flex justify-center space-x-6">
                                <button onclick="showRoom('bedroom', this)"
                                    class="room-tab px-5 py-2 rounded-full text-white font-medium transition-all duration-300">
                                    Bedroom
                                </button>
                                <button onclick="showRoom('bathroom', this)"
                                    class="room-tab px-5 py-2 rounded-full text-white font-medium transition-all duration-300">
                                    Bathroom
                                </button>
                                <button onclick="showRoom('livingarea', this)"
                                    class="room-tab px-5 py-2 rounded-full text-white font-medium transition-all duration-300">
                                    Living Area
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="space-y-6">
                    <div class="bg-[#16213e] p-8 rounded-xl shadow-xl backdrop-blur-lg border border-white/10">
                        <h3 class="text-3xl font-bold text-white mb-6">Premium Room Features</h3>
                        <ul class="space-y-6 text-gray-300">
                            <li class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-[#8B4513]/20 flex items-center justify-center rounded-full">
                                    <i class="fas fa-bed text-[#D4A017] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Smart Bed System</h4>
                                    <p class="text-sm text-gray-400">Adjustable firmness with ambient lighting control.</p>
                                </div>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-[#8B4513]/20 flex items-center justify-center rounded-full">
                                    <i class="fas fa-tablet-alt text-[#D4A017] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Room Automation</h4>
                                    <p class="text-sm text-gray-400">Control the entire room with voice commands.</p>
                                </div>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-[#8B4513]/20 flex items-center justify-center rounded-full">
                                    <i class="fas fa-bath text-[#D4A017] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Luxury Bathroom</h4>
                                    <p class="text-sm text-gray-400">Digital shower with customizable settings.</p>
                                </div>
                            </li>
                        </ul>

                        <!-- Room Specifications -->
                        <div class="mt-8 grid grid-cols-2 gap-4 bg-black/20 p-4 rounded-lg">
                            <div class="text-center">
                                <div class="text-[#D4A017] font-bold text-xl">45m²</div>
                                <div class="text-gray-400 text-sm">Room Size</div>
                            </div>
                            <div class="text-center">
                                <div class="text-[#D4A017] font-bold text-xl">4</div>
                                <div class="text-gray-400 text-sm">Max Guests</div>
                            </div>
                        </div>

                        <a href="#booking"
                            class="mt-6 block py-4 text-center font-semibold rounded-lg bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white
                            hover:from-[#D4A017] hover:to-[#8B4513] transition-all transform hover:scale-105">
                            Book This Room
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Smart Services Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-72 h-72 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#8B4513]/5 rounded-full blur-[120px]">
            </div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%239C92AC\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Enhanced Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-white mb-6">
                    Smart Services
                    <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Experience the future of hospitality with our
                    cutting-edge smart services</p>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Concierge Service Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6 relative">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-concierge-bell text-[#8B4513] text-3xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 bg-[#8B4513] text-white text-xs px-2 py-1 rounded-full">24/7
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Concierge Services</h3>
                    <p class="text-gray-300 mb-6">Experience world-class hospitality with our 24/7 concierge, ready to
                        assist with dining reservations, local tips, and personalized services to enhance your stay.</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Personalized recommendations
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Transportation assistance
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Multilingual support
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Smart Room Control Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-home text-[#8B4513] text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Smart Room Control</h3>
                    <p class="text-gray-300 mb-6">Take control of your comfort with our smart room technology, allowing you
                        to adjust your environment with ease.</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Climate control
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Lighting scenes
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Entertainment systems
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Digital Key Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-key text-[#8B4513] text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Digital Key</h3>
                    <p class="text-gray-300 mb-6">Unlock your room and hotel facilities effortlessly with your smartphone —
                        no physical key required.</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Contactless entry
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Secure encryption
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Easily share guest access
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>

            </div>

            <!-- Features Counter -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">100+</div>
                    <div class="text-gray-400">Smart Features</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">98%</div>
                    <div class="text-gray-400">Guest Satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">0.5s</div>
                    <div class="text-gray-400">Response Time</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">24/7</div>
                    <div class="text-gray-400">Support</div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <a href="#"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg hover:from-[#D4A017] hover:to-[#8B4513] transition-all duration-300 transform hover:scale-105">
                    Experience Smart Living
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- Immersive Experiences Section -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-[#8B4513]/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Enhanced Header -->
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-16 text-center">
                Immersive Experiences
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Experience Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                <!-- VR Spa Experience Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s7.jpg') }}" alt="VR Spa Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Virtual Reality Spa</h3>
                            <p class="text-gray-200 mb-6">Immerse yourself in tranquility with our VR-enhanced spa
                                treatments</p>
                            <a href="#" class="inline-flex items-center text-white">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Smart Room Experience Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s8.jpg') }}" alt="Smart Room Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Smart Room Technology</h3>
                            <p class="text-gray-200 mb-6">Control your entire room environment with our cutting-edge smart
                                systems</p>
                            <a href="#" class="inline-flex items-center text-white">
                                Explore Features
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Culinary Journey Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s9.jpg') }}" alt="Culinary Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Interactive Culinary Journey</h3>
                            <p class="text-gray-200 mb-6">Experience interactive cooking sessions with world-renowned chefs
                            </p>
                            <a href="#" class="inline-flex items-center text-white">
                                View Menu
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Experience Stats -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">5000+</div>
                    <div class="text-gray-600">Happy Guests</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">50+</div>
                    <div class="text-gray-600">Unique Experiences</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">24/7</div>
                    <div class="text-gray-600">Service Available</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">4.9★</div>
                    <div class="text-gray-600">Guest Rating</div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <a href="#booking"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105">
                    Book Your Experience
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Crescent Facilities Section -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#8B4513]/5 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Section Heading -->
            <h2 class="text-5xl font-extrabold text-[#1a1a2e] mb-16 text-center tracking-tight">
                Crescent Facilities
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Facility Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
                <!-- Crescent Restaurant -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (1).jpg') }}" alt="Crescent Restaurant"
                        class="w-full h-[300px] object-cover hover:scale-110 transition-transform duration-1000">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-end p-4">
                        <h3 class="text-white text-lg md:text-xl font-semibold uppercase tracking-wide">Crescent Restaurant
                        </h3>
                    </div>
                </div>

                <!-- Open TRace -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (1).jpg') }}" alt="Tit Bit Cafe"
                        class="w-full h-[300px] object-cover hover:scale-110 transition-transform duration-1000">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-end p-4">
                        <h3 class="text-white text-lg md:text-xl font-semibold uppercase tracking-wide">Open Trace</h3>
                    </div>
                </div>

                <!-- Gym -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/gym/gym (1).jpg') }}" alt="Gym"
                        class="w-full h-[300px] object-cover hover:scale-110 transition-transform duration-1000">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-end p-4">
                        <h3 class="text-white text-lg md:text-xl font-semibold uppercase tracking-wide">Modern Gym</h3>
                    </div>
                </div>

                <!-- Conference Room Elite 1 & 2 -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (1).jpg') }}" alt="Conference Room Elite"
                        class="w-full h-[300px] object-cover hover:scale-110 transition-transform duration-1000">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-end p-4">
                        <h3 class="text-white text-lg md:text-xl font-semibold uppercase tracking-wide">Conference Room
                            Elite 1 & 2</h3>
                    </div>
                </div>
            </div>

            <!-- Optional CTA Section -->
            <div class="mt-20 text-center">
                <a href="{{route('crescentfacilities')}}"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105 shadow-2xl hover:shadow-2xl">
                    Explore All Facilities
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- Our Signature Offerings -->
    <section class="py-24 bg-[#f7f7f7]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-extrabold text-[#1a1a2e] mb-6 tracking-wide leading-tight">
                Our Signature Offerings
            </h2>
            <div class="w-28 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mb-6 rounded-full"></div>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-16 leading-relaxed">
                Step into an oasis of elegance and warmth at Hotel Krinoscco, where luxury meets tradition to redefine your
                unforgettable experience.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Offering Item (Repeat for all) -->
                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">key</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Keycard Access</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Access to all rooms with a secure keycard for your convenience and safety.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">wifi</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Internet Access</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Stay connected with high-speed internet access throughout the property.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">phone</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Telephone with Intercom</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Stay in touch with hotel staff at any time with our telephone and intercom system.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">access_alarm</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">24/7 Accessibility</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Our services are available around the clock to cater to your needs.
                    </p>
                </div>

                <!-- Add the rest of your items in the same format -->
                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">bathtub</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Ensuite Bathroom</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Each room comes with a private ensuite bathroom for ultimate comfort.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">tv</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Entertainment</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Enjoy various entertainment options during your stay, including TV, music, and more.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">room_service</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Room Service</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Enjoy 24/7 room service for meals, beverages, and more, delivered right to your door.
                    </p>
                </div>

                <div
                    class="offering-item p-6 bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div
                        class="w-16 h-16 bg-gradient-to-tr from-[#8B4513] to-[#D4A017] flex items-center justify-center rounded-full mb-6 mx-auto border-4 border-white shadow-lg group-hover:scale-105 transition-transform">
                        <span class="material-icons text-white text-3xl">storage</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-3">Storage Space</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Keep your belongings safe with ample storage space available in your room.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="booking" class="py-12 animated-gradient">
        <div class="container mx-auto px-4">
            <!-- Title Section -->
            <h2 class="text-3xl font-bold text-white mb-8 text-center">
                Book Your Stay
                <div class="w-16 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-2 rounded-full"></div>
            </h2>
            <div class="w-full max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">

                <form action="{{ route('rooms.available') }}" method="POST"
                      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @csrf

                    <!-- Check-in Date Picker -->
                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Check-in</label>
                        <input type="date" id="checkin" name="check_in_date" placeholder="Select Check-in" required
                               class="border border-gray-300 rounded-md p-2 bg-white outline-none
                                       focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                    </div>

                    <!-- Check-out Date Picker -->
                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Check-out</label>
                        <input type="date" id="checkout" name="check_out_date" placeholder="Select Check-out" required
                               class="border border-gray-300 rounded-md p-2 bg-white outline-none
                                       focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                    </div>

                    <div class="flex flex-col">
                        <br>
                        <button type="submit"
                                class="px-6 py-2 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-md transition
                                    hover:from-[#D4A017] hover:to-[#8B4513]">
                            Search
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </section>

{{--    @include('component.booking')--}}

    <!-- Our Accommodation Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 tracking-wide uppercase">
                Our Accommodation
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mb-8 rounded-full"></div>

            <p class="text-lg text-gray-300 max-w-3xl mx-auto mb-12 leading-relaxed">
                Whether traveling for business or vacation, Hotel Krinoscco offers rooms thoughtfully designed for comfort
                and luxury.
                Experience classically styled rooms with contemporary touches, backed by round-the-clock service.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Standard Room Card -->
                <div
                    class="bg-[#16213e] p-8 rounded-2xl shadow-2xl border border-white/10 overflow-hidden group hover:shadow-3xl transition-all duration-300">
                    <div class="relative overflow-hidden rounded-lg mb-6">
                        <img src="{{ asset('asset/standard/standard-2.jpg') }}" alt="Standard Room"
                            class="w-full h-52 object-cover transition-transform duration-500 transform group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Standard Room</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Tastefully designed with essential conveniences, ensuring comfort and a memorable experience
                        throughout your stay.
                    </p>
                    <a href="{{ route('accommodation.standard') }}"
                        class="inline-block bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Deluxe Room Card -->
                <div
                    class="bg-[#16213e] p-8 rounded-2xl shadow-2xl border border-white/10 overflow-hidden group hover:shadow-3xl transition-all duration-300">
                    <div class="relative overflow-hidden rounded-lg mb-6">
                        <img src="{{ asset('asset/deluxe/deluxe-5.jpg') }}" alt="Deluxe Room"
                            class="w-full h-52 object-cover transition-transform duration-500 transform group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Deluxe Room</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Experience bespoke elegance in our Deluxe Room—crafted for ultimate comfort, with lavish amenities
                        and modern luxury.
                    </p>
                    <a href="{{ route('accommodation.deluxe') }}"
                        class="inline-block bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Luxury Room Card -->
                <div
                    class="bg-[#16213e] p-8 rounded-2xl shadow-2xl border border-white/10 overflow-hidden group hover:shadow-3xl transition-all duration-300">
                    <div class="relative overflow-hidden rounded-lg mb-6">
                        <img src="{{ asset('asset/luxury/luxury-3.jpg') }}" alt="Luxury Room"
                            class="w-full h-52 object-cover transition-transform duration-500 transform group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Suite Room</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        The epitome of grandeur and sophistication, our Luxury Room combines exclusivity and indulgence for
                        a truly unforgettable escape.
                    </p>
                    <a href="{{ route('accommodation.suite') }}"
                        class="inline-block bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

            </div>
        </div>
    </section>


    <!-- Our Packages Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold text-white mb-12">
                Our Packages
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <p class="text-lg text-gray-300 mb-12">Array of unique experiences to enjoy throughout your event, Experiences
                by Krinoscco serves as a concierge service for you.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Lawn Package -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/lawn.jpg') }}" alt="Lawn Package"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Lawn Package</h3>
                    <p class="text-gray-300 mb-6">Envision opulence in our Deluxe haven—where lavish comforts meet bespoke
                        elegance, weaving a tapestry of indulgence for an unforgettable retreat.</p>
                    <a href="{{ route('banquets.lawn') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Ballroom Package -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/Ballroom.jpg') }}" alt="Ballroom Package"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Ballroom Package</h3>
                    <p class="text-gray-300 mb-6">Discover the epitome of grandeur in our Suite—a symphony of
                        sophistication, where indulgence meets exclusivity for an unparalleled escape.</p>
                    <a href="{{ route('banquets.ballroom') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Digital Art Gallery -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-12 text-center">
                Digital Art Gallery
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="group relative">
                    <img src="{{ asset('asset/images/Art-1.jpg') }}" alt="Abstract Harmony"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/Art-1.jpg') }}')">
                </div>
                <div class="group relative">
                    <img src="{{ asset('asset/images/Art-2.jpg') }}" alt="Abstract Harmony"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/Art-2.jpg') }}')">
                </div>
                <div class="group relative">
                    <img src="{{ asset('asset/images/d8.jpg') }}" alt="Abstract Harmony"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/d8.jpg') }}')">
                </div>

                <div class="group relative">
                    <img src="{{ asset('asset/images/d0.jpg') }}" alt="Digital Dreams"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/d0.jpg') }}')">
                </div>

                <div class="group relative">
                    <img src="{{ asset('asset/images/s11.jpg') }}" alt="Neon Nights"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/s11.jpg') }}')">
                </div>

                <div class="group relative">
                    <img src="{{ asset('asset/images/suite13.jpg') }}" alt="Cyber Sunset"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer transition-transform transform group-hover:scale-105"
                        onclick="openModal('{{ asset('asset/images/suite13.jpg') }}')">
                </div>
            </div>

            <!-- See Gallery Button -->
            <div class="mt-12 text-center">
                <a href="{{ route('gallery') }}"
                    class="inline-block bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    See Gallery
                </a>
            </div>
        </div>
    </section>


    <!-- What Our Guests Say -->
    @include('component.testimonial')


    <!-- Contact Us -->
    <section class="bg-gray-100 py-16 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-72 h-72 sm:w-96 sm:h-96 bg-[#D4A017]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 sm:w-96 sm:h-96 bg-[#8B4513]/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 px-4 sm:px-8 lg:px-12 max-w-7xl mx-auto">
            <!-- Heading Section -->
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Contact Us</h2>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-base sm:text-lg text-gray-600">
                    We’d love to hear from you! Reach out to us anytime.
                </p>
            </div>

            <!-- Contact Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Single Info -->
                    <div class="flex items-start space-x-4">
                        <span class="material-icons text-[#8B4513] text-3xl sm:text-4xl">location_on</span>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Our Location</h4>
                            <p class="text-gray-600">Hotel Krinoscco, Amaniganj Ram Path, Ayodhya U.P Pin 224001</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <span class="material-icons text-[#8B4513] text-3xl sm:text-4xl">email</span>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Email Us</h4>
                            <p class="text-gray-600">info@krinoscco.com</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <span class="material-icons text-[#8B4513] text-3xl sm:text-4xl">phone</span>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Call Us</h4>
                            <p class="text-gray-600">+91-7275002525</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <span class="material-icons text-[#8B4513] text-3xl sm:text-4xl">access_time</span>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Timing</h4>
                            <p class="text-gray-600">Check In: 1:00 PM</p>
                            <p class="text-gray-600">Check Out: 11:00 AM</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <form action="#" method="POST"
                    class="bg-white p-6 sm:p-8 rounded-xl shadow-lg transition-transform duration-700
       hover:shadow-2xl hover:-translate-y-2 space-y-4">

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
               focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
               focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Your Mobile Number</label>
                        <input type="tel" name="phone" id="phone" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
               focus:ring-yellow-500 focus:border-yellow-500"
                            placeholder="+91-7275002525">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
               focus:ring-yellow-500 focus:border-yellow-500"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white font-medium py-3
               rounded-lg shadow-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Send Message
                        </button>
                    </div>

                </form>

            </div>

            <!-- Map Section -->
            <div class="mt-12 sm:mt-16">
                <iframe
                    class="w-full h-64 sm:h-80 lg:h-96 rounded-lg shadow-lg transition-transform duration-700 hover:shadow-2xl hover:scale-105"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.786563827908!2d82.162745675435!3d26.78307267672456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a0796e56fb899%3A0xffa1558e88f0d349!2sHotel%20Krinoscco!5e0!3m2!1sen!2sin!4v1739181698814!5m2!1sen!2sin"
                    frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-gradient-to-b from-[#F8F8F8] to-[#EAEAEA]">
        <div class="container mx-auto px-6">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900"> Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </div>
            <!-- FAQ Accordion -->
            <div class="space-y-8">
                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">What is the check-in and check-out time?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Check-in is from 1:00 PM, and check-out is by 11:00 AM.</p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Do you offer room service?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, we offer room service 24/7. You can place an order through our in-room menu.</p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Can I cancel my booking?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, cancellations are allowed with a 24-hour notice. Please check the terms for full details.
                        </p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Do you have a shuttle service?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, we provide shuttle service to and from the airport. Please contact reception for bookings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function showRoom(room, button) {
            // Remove active from all images
            document.querySelectorAll('.room-image').forEach(el => el.classList.remove('active'));
            document.getElementById(room + 'Image').classList.add('active');

            // Remove active from all tabs
            document.querySelectorAll('.room-tab').forEach(tab => tab.classList.remove('active-tab'));
            button.classList.add('active-tab');
        }

        // Ensure Bedroom tab and image are active on page load
        document.addEventListener('DOMContentLoaded', () => {
            showRoom('bedroom', document.querySelectorAll('.room-tab')[0]);
        });
    </script>

    <!--About Us JavaScript for Image Change -->
    <script>
        function changeMainImage(element) {
            const mainImage = document.getElementById("main-image");
            mainImage.src = element.src;
        }
    </script>

    <!-- Add the script to toggle the FAQ answers and rotate the icons -->
    <script>
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('.faq-icon');
                const isHidden = content.classList.contains('hidden');

                content.classList.toggle('hidden', !isHidden);
                toggle.classList.toggle('bg-[#F4F4F4]', !isHidden);
                icon.classList.toggle('rotate-180', !isHidden); // Rotates the icon
            });
        });
    </script>

    <!--Scripts -->
    <script>
        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.scroll-reveal');

        const revealOnScroll = () => {
            revealElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight * 0.85) {
                    element.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>
@endsection
