@extends('component.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-8 lg:px-16">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
                Crescent Facilities
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <section class="bg-gray-100">

        <!-- Crescent Restaurant Section -->
        <div class="py-16 px-8 lg:px-16">
            <div class="text-center py-10">
                <!-- Title of the Restaurant without shadow, with hover effect on text -->
                <h2
                    class="text-4xl font-semibold text-[#2c3e50] mb-6 transform transition-all hover:scale-105 hover:text-[#e67e22]">
                    Crescent Restaurant
                </h2>
                <!-- Gradient line with smooth animation -->
                <div
                    class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full transition-all duration-500 hover:w-40">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (1).jpg') }}" alt="Crescent Restaurant Image 1"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (2).jpg') }}" alt="Crescent Restaurant Image 2"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (3).jpg') }}" alt="Crescent Restaurant Image 3"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (4).jpg') }}" alt="Crescent Restaurant Image 4"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/restaurant/restaurant (5).jpg') }}" alt="Crescent Restaurant Image 5"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
        </div>

        <!-- Tit Bit Cafe Section -->
        <div class="py-16 px-8 lg:px-16">
            <div class="text-center py-10">
                <!-- Title of the Restaurant without shadow, with hover effect on text -->
                <h2
                    class="text-4xl font-semibold text-[#2c3e50] mb-6 transform transition-all hover:scale-105 hover:text-[#e67e22]">
                    Open Terrace


                </h2>

                <!-- Gradient line with smooth animation -->
                <div
                    class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full transition-all duration-500 hover:w-40">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (1).jpg') }}" alt="Tit Bit Cafe Image 1"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                {{-- <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (2).jpg') }}" alt="Tit Bit Cafe Image 2"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div> --}}
                {{-- <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (3).jpg') }}" alt="Tit Bit Cafe Image 3"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div> --}}
                {{-- <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (4).jpg') }}" alt="Tit Bit Cafe Image 4"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div> --}}
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (5).jpg') }}" alt="Tit Bit Cafe Image 5"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
        </div>

        <!-- Gym Section -->
        <div class="py-16 px-8 lg:px-16">
            <div class="text-center py-10">
                <!-- Title of the Restaurant without shadow, with hover effect on text -->
                <h2
                    class="text-4xl font-semibold text-[#2c3e50] mb-6 transform transition-all hover:scale-105 hover:text-[#e67e22]">
                    Gym
                </h2>

                <!-- Gradient line with smooth animation -->
                <div
                    class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full transition-all duration-500 hover:w-40">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/gym/gym (1).jpg') }}" alt="Gym Image 1"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/gym/gym (2).jpg') }}" alt="Gym Image 2"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/gym/gym (3).jpg') }}" alt="Gym Image 3"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/gym/gym (4).jpg') }}" alt="Gym Image 4"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                {{-- <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/cafe/cafe (5).jpg') }}" alt="Gym Image 5"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div> --}}
            </div>
        </div>

        <!-- Conference Room Elite 1 & Elite 2 Section -->
        <div class="py-16 px-8 lg:px-16">
            <div class="text-center py-10">
                <!-- Title of the Restaurant without shadow, with hover effect on text -->
                <h2
                    class="text-4xl font-semibold text-[#2c3e50] mb-6 transform transition-all hover:scale-105 hover:text-[#e67e22]">
                    Conference Room Elite 1 & Elite 2
                </h2>

                <!-- Gradient line with smooth animation -->
                <div
                    class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full transition-all duration-500 hover:w-40">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (1).jpg') }}" alt="Conference Room Image 1"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (2).jpg') }}" alt="Conference Room Image 2"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (3).jpg') }}" alt="Conference Room Image 3"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (4).jpg') }}" alt="Conference Room Image 4"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (5).jpg') }}" alt="Conference Room Image 5"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (6).jpg') }}" alt="Conference Room Image 6"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
                <div
                    class="relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-transform duration-700 ease-in-out hover:scale-105">
                    <img src="{{ asset('asset/confrence-hall/hall (7).jpg') }}" alt="Conference Room Image 7"
                        class="w-full h-[250px] object-cover hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
        </div>

        {{-- <!-- Optional CTA Section -->
        <div class="my-10 text-center">
            <a href="{{ route('crescent') }}"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105 shadow-2xl hover:shadow-2xl">
                Discover Our Services
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div> --}}

    </section>
@endsection
