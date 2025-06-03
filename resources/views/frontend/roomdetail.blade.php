@extends('component.main')
@section('content')
    <!-- Luxury Booking Section -->
    <section class="relative bg-cover bg-center py-16 md:py-24 px-4 sm:px-6 lg:px-8"
        style="background-image: url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

        <div class="relative max-w-7xl mx-auto">
            <div class="bg-white/80 backdrop-blur-lg rounded-xl lg:rounded-2xl shadow-xl overflow-hidden">

                <!-- Best Rate Guarantee Badge -->
                <div
                    class="absolute top-0 right-0 bg-gradient-to-r from-amber-400 to-amber-500 text-black text-xs md:text-sm font-bold px-4 py-2 rounded-bl-lg md:rounded-bl-xl shadow-md z-10 transform rotate-1 hover:rotate-0 transition-transform duration-300">
                    ✨ BEST RATE GUARANTEE
                </div>

                <!-- Header Section -->
                <div class="px-6 py-8 sm:p-10 md:p-12 text-center space-y-3">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 font-serif">Exclusive Stays Await
                    </h2>
                    <p class="text-gray-700 text-sm sm:text-base max-w-2xl mx-auto">Experience unparalleled luxury with our
                        curated collection of suites and villas, complemented by world-class service.</p>
                </div>

                <!-- Booking Form -->
                {{--      <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 p-6 bg-white/90 backdrop-blur-sm border-t border-gray-100"> --}}
                {{--        <!-- Hotel Selection --> --}}
                {{--        <div class="relative"> --}}
                {{--          <label for="hotel" class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Hotel</label> --}}
                {{--          <div class="relative"> --}}
                {{--            <select id="hotel" name="hotel" class="appearance-none w-full border border-gray-200 rounded-lg px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white pr-8"> --}}
                {{--              <option value="">Select Property</option> --}}
                {{--              <option>The Grand Palisades</option> --}}
                {{--              <option>Azure Waters Resort</option> --}}
                {{--              <option>Montage Serenity</option> --}}
                {{--              <option>Royal Orchid Suites</option> --}}
                {{--            </select> --}}
                {{--            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 mt-5"> --}}
                {{--              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg> --}}
                {{--            </div> --}}
                {{--          </div> --}}
                {{--        </div> --}}
                {{--      --}}
                {{--        <!-- Check-In --> --}}
                {{--        <div> --}}
                {{--          <label for="checkin" class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Check-In</label> --}}
                {{--          <div class="relative"> --}}
                {{--            <input type="date" id="checkin" name="checkin" class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"> --}}
                {{--            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-5"> --}}
                {{--              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                {{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /> --}}
                {{--              </svg> --}}
                {{--            </div> --}}
                {{--          </div> --}}
                {{--        </div> --}}
                {{--      --}}
                {{--        <!-- Check-Out --> --}}
                {{--        <div> --}}
                {{--          <label for="checkout" class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Check-Out</label> --}}
                {{--          <div class="relative"> --}}
                {{--            <input type="date" id="checkout" name="checkout" class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"> --}}
                {{--            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-5"> --}}
                {{--              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                {{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /> --}}
                {{--              </svg> --}}
                {{--            </div> --}}
                {{--          </div> --}}
                {{--        </div> --}}
                {{--      --}}
                {{--        <!-- Rooms & Guests --> --}}
                {{--        <div class="grid grid-cols-2 gap-3"> --}}
                {{--          <div> --}}
                {{--            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Rooms</label> --}}
                {{--            <select class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"> --}}
                {{--              <option>1</option> --}}
                {{--              <option>2</option> --}}
                {{--              <option>3</option> --}}
                {{--              <option>4+</option> --}}
                {{--            </select> --}}
                {{--          </div> --}}
                {{--          <div> --}}
                {{--            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Guests</label> --}}
                {{--            <select class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500"> --}}
                {{--              <option>1</option> --}}
                {{--              <option>2</option> --}}
                {{--              <option>3</option> --}}
                {{--              <option>4</option> --}}
                {{--              <option>5+</option> --}}
                {{--            </select> --}}
                {{--          </div> --}}
                {{--        </div> --}}
                {{--      --}}
                {{--        <!-- Submit Button --> --}}
                {{--        <div class="flex items-end"> --}}
                {{--          <button type="submit" class="w-full bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-semibold text-sm py-3 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2"> --}}
                {{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                {{--              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /> --}}
                {{--            </svg> --}}
                {{--            <span>FIND ROOMS</span> --}}
                {{--          </button> --}}
                {{--        </div> --}}
                {{--      </form> --}}
                {{--      --}}
                <!-- Featured Suites -->
                <div class="px-6 py-8 sm:p-10 md:p-12 bg-gradient-to-b from-white to-gray-50">
                    <div class="max-w-4xl mx-auto text-center mb-10">
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 font-serif">Our Signature Collections</h3>
                        <p class="text-gray-600 mt-2">Indulge in our most exclusive accommodations, designed for the
                            discerning traveler.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6 lg:gap-8">
                        @foreach ($roomTypes as $roomType)
                            @php
                                $availabilities = $roomType->selectedDateAvailabilities($checkIn, $checkOut);
                                $isAvailable = $availabilities->count() == $days && !$availabilities->contains('rooms', 0);
                                $totalPrice = $availabilities->sum('price');
                            @endphp

                            @if ($isAvailable)
                                {{-- ✅ Room Available --}}
                                <div class="group grid md:grid-cols-2 gap-6 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl p-6">
                                    {{-- Room Image --}}
                                    <div class="relative h-96 md:h-auto">
                                        <img src="{{ asset($roomType->images?->first() ? 'storage/' . $roomType->images->first()->path : 'asset/deluxe/deluxe-4.jpg') }}"
                                            alt="{{ $roomType->name }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 rounded-lg">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <div class="absolute bottom-4 left-4">
{{--                                            <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">MOST POPULAR</span>--}}
                                        </div>
                                    </div>

                                    {{-- Room Info --}}
                                    <div class="flex flex-col justify-between space-y-4">
                                        <div>
                                            <h4 class="text-2xl font-bold text-gray-900 font-serif mb-1">{{ $roomType->name }}</h4>
                                            <p class="text-gray-600 text-sm leading-relaxed">{{ $roomType->description }}</p>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                            @foreach ($availabilities as $available)
                                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-sm shadow-sm">
                                                    <p class="text-blue-600 font-semibold mb-1">{{ \Carbon\Carbon::parse($available->date)->format('d M Y') }}</p>
                                                    <p class="text-green-700 font-semibold">{{ $available->rooms }} <span class="font-normal text-green-800">rooms available</span></p>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="mt-4 bg-amber-50 border border-amber-200 rounded-lg p-4 shadow">
                                            <p class="text-amber-700 font-bold text-lg">
                                                ₹{{ number_format($totalPrice) }} for {{ $availabilities->count() }} night{{ $availabilities->count() > 1 ? 's' : '' }}:

                                            </p>
                                        </div>

                                        <form action="{{ route('booking.room', ['roomType' => $roomType->id]) }}" method="get" class="mt-4">
                                            @csrf
                                            <input type="hidden" name="check_in_date" value="{{ $checkIn }}">
                                            <input type="hidden" name="check_out_date" value="{{ $checkOut }}">
                                            <input type="hidden" name="days" value="{{ $days }}">

                                            <button type="submit"
                                                    class="bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white font-semibold py-2 px-6 rounded-lg hover:from-[#A0522D] hover:to-[#FFBF00] transition-all duration-300 shadow-md">
                                                Book →
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                {{-- ❌ Room Not Available --}}
                                <div class="bg-red-50 border border-red-200 text-red-800 font-semibold py-5 px-6 rounded-lg shadow-md">
                                    😔 <strong>{{ $roomType->name }}</strong> is not available for the selected dates. Please try different dates or room types.
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-12 text-center">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-300">
                            View All Accommodations
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
