@extends('component.main')

@section('content')
    <!-- Add this CSS to style the pagination dots brown -->
    <style>
        .swiper-pagination-bullet {
            background-color: #8B4513 !important;
            /* Brown color for dots */
            width: 12px;
            height: 12px;
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background-color: #8B4513 !important;
            /* Brown color for active dot */
            opacity: 1;
            transform: scale(1.2);
        }
    </style>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <!-- Overlay Background (Optional) -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Glass Effect Content -->
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

        <!-- Content Inside the Hero Section -->
        <div class="relative container mx-auto text-center z-10">
            <!-- Title with Enhanced Focus -->
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">Suite Room</h1>

            <!-- Description Text with Focus -->
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                We’d love to hear from you! Reach out to us anytime.
            </p>

            <!-- Stylish Divider -->
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- Luxry Room Section -->
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

                <!-- Image Section with Auto Slider -->
                <div class="w-full lg:w-1/2 space-y-6">
                    <!-- Main Image Carousel (Swiper) -->
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e]/20 to-transparent z-10"></div>
                        <div class="swiper luxury-slider relative">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-1.jpg') }}" alt="Hotel Detail 1"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-2.jpg') }}" alt="Hotel Detail 2"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-3.jpg') }}" alt="Hotel Detail 3"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-4.jpg') }}" alt="Hotel Detail 4"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-5.jpg') }}" alt="Hotel Detail 5"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('asset/luxury/luxury-6.jpg') }}" alt="Hotel Detail 6"
                                        class="w-full h-[500px] object-cover" />
                                </div>
                            </div>
                        </div>

                        <!-- Arrows -->
                        <div
                            class="swiper-button-prev !text-white !font-bold !w-12 !h-12 !bg-[#8B4513]/80 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B4513] z-50">
                        </div>
                        <div
                            class="swiper-button-next !text-white !font-bold !w-12 !h-12 !bg-[#8B4513]/80 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B4513] z-50">
                        </div>

                        <!-- Pagination (with brown color dots) -->
                        <div class="swiper-pagination absolute bottom-4 left-1/2 transform -translate-x-1/2 z-20"></div>

                        <!-- Floating Badge -->
                        <div
                            class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg z-20">
                            <span class="text-[#1a1a2e] font-semibold">Est. 2021</span>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="w-full lg:w-1/2 space-y-8">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-[2px] bg-[#8B4513]"></div>
                            <span class="text-[#8B4513] font-semibold uppercase tracking-wider">Suite Room</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold text-[#1a1a2e] leading-tight">
                            Designed to Make Each Moment
                            <span class="relative">Sing
                                <div class="absolute bottom-0 left-0 w-full h-[8px] bg-[#8B4513]/20"></div>
                            </span>
                        </h2>

                    </div>

                    <div class="space-y-6">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Welcome to the Suite Room designed to offer the perfect blend of sophistication, comfort and personalized service. Whether you're traveling for business or leisure, our suite ensures a memorable stay with premium amenities and refined interiors.
                        </p>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Redefining modern rooms, it offers unmatched comfort and outstanding value, representing the pinnacle of contemporary sophistication.
                        </p>

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

                        <div class="flex items-center gap-6 pt-4">
                            <a href="{{ route('gallery') }}"
                                class="group relative px-8 py-4 bg-[#8B4513] text-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-[#6B3410] transform translate-y-full transition-transform duration-300 group-hover:translate-y-0">
                                </div>
                                <span class="relative z-10 font-semibold">Explore Our Rooms</span>
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

            <!-- Room Features -->
            <div class="space-y-6 py-12">
                <h1 class="text-3xl text-gray-800">The Suite room has all the essential conveniences and is tastefully
                    designed for your enjoyable stay. We are delivering the highest level of pleasure and a wonderful
                    experience.</h1>
                <h3 class="text-2xl font-semibold text-[#1a1a2e]">Room Features</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Keycard access to all the rooms</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">King or Double bedded rooms</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Sofa chairs in all rooms</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">High speed Wireless Internet access</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Telephone with intercoms</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Tea Coffee maker with complimentary coffee, tea & milk sachets</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Bottled Water</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Mini Bar</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Slippers available (on request)</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Bath amenities and toiletry items</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Hair Dryer (on request)</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Iron and Board (on request)</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">32 inch flat screen television</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">English, Hindi and other regional language channels</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-5 h-5 bg-[#8B4513] rounded-full"></div>
                        <p class="text-lg text-gray-700">Jacuzzi</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Real-time Availability Section -->
 {{-- booking section --}}
{{-- <section id="booking" class="py-12 animated-gradient bg-[#151127]">--}}
{{--    <div class="container mx-auto px-4">--}}
{{--        <!-- Title Section -->--}}
{{--        <h2 class="text-3xl font-bold text-white mb-8 text-center">--}}
{{--            Book Your Stay--}}
{{--            <div class="w-16 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-2 rounded-full"></div>--}}
{{--        </h2>--}}
{{--        <div class="w-full max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">--}}

{{--            <form action="{{ route('rooms.available') }}" method="GET"--}}
{{--                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">--}}
{{--                @csrf--}}

{{--                <!-- Check-in Date Picker -->--}}
{{--                <div class="flex flex-col">--}}
{{--                    <label class="text-gray-700 font-medium">Check-in</label>--}}
{{--                    <input type="date" id="checkin" name="check_in_date" placeholder="Select Check-in" required--}}
{{--                        class="border border-gray-300 rounded-md p-2 bg-white outline-none--}}
{{--                                   focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">--}}
{{--                </div>--}}

{{--                <!-- Check-out Date Picker -->--}}
{{--                <div class="flex flex-col">--}}
{{--                    <label class="text-gray-700 font-medium">Check-out</label>--}}
{{--                    <input type="date" id="checkout" name="check_out_date" placeholder="Select Check-out"--}}
{{--                        required--}}
{{--                        class="border border-gray-300 rounded-md p-2 bg-white outline-none--}}
{{--                                   focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">--}}
{{--                </div>--}}

{{--                <div class="flex flex-col">--}}
{{--                    <br>--}}
{{--                    <button type="submit"--}}
{{--                        class="px-6 py-2 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-md transition--}}
{{--                                hover:from-[#D4A017] hover:to-[#8B4513]">--}}
{{--                        Search--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--            </form>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


    @include('component.booking')

    <!-- Add SwiperJS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.luxury-slider', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                }
            });
        });
    </script>

    <!-- JavaScript for Image Change -->
    <script>
        function changeMainImage(element) {
            const mainImage = document.getElementById("main-image");
            mainImage.src = element.src;
        }
    </script>
@endsection
