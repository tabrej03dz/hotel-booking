


@extends('component.main')
@section('content')

<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-5xl mx-auto">
    
    <!-- Header -->
    <div class="text-center mb-12">
      <h1 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-2">Your Luxury Escape Awaits</h1>
      <div class="w-24 h-1 bg-amber-500 mx-auto"></div>
      <p class="text-gray-600 mt-4">Booking confirmation for your stay at</p>
      <h2 class="text-2xl md:text-3xl font-serif font-bold text-amber-700">The Grand Palisades</h2>
    </div>

    <!-- Booking Summary Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 border border-gray-100">
      <!-- Hotel Image -->
      <div class="relative h-48 md:h-64 w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="The Grand Palisades" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        <div class="absolute bottom-4 left-4">
          <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Confirmed</span>
        </div>
      </div>

      <!-- Booking Details -->
      <div class="p-6 md:p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Check-In</h3>
            <div class="flex items-center space-x-3">
              <div class="bg-amber-50 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-gray-900">Thursday, 22 May 2022</p>
                <p class="text-gray-600">From 3:00 PM</p>
              </div>
            </div>
          </div>

          <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Check-Out</h3>
            <div class="flex items-center space-x-3">
              <div class="bg-amber-50 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-gray-900">Sunday, 19 June 2022</p>
                <p class="text-gray-600">Until 11:00 AM</p>
              </div>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
          <h3 class="text-lg font-semibold text-gray-900 mb-4">Royal Suite</h3>
          <div class="flex flex-wrap gap-4 mb-6">
            <div class="flex items-center text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              King Bed • 65 m²
            </div>
            <div class="flex items-center text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 100 8M4 7a4 4 0 011.732-3H2v5h2V4h1.732A4 4 0 014 7zm6 0a4 4 0 100 8 4 4 0 000-8zm-6 6a4 4 0 011.732 3H2v-5h2v5h1.732A4 4 0 0110 13zm6 0a4 4 0 011.732 3H12v-5h2v5h1.732A4 4 0 0116 13z" />
              </svg>
              2 Adults
            </div>
            <div class="flex items-center text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Ocean View
            </div>
          </div>
          <p class="text-gray-700 mb-6">Experience unparalleled luxury in our signature Royal Suite featuring a spacious living area, marble bathroom with deep soaking tub, and panoramic views of the coastline.</p>
        </div>
      </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
      <!-- Left Column -->
      <div class="lg:col-span-2 space-y-8">
        <!-- Upgrade Options -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
          <h3 class="text-xl font-serif font-bold text-gray-900 mb-4">Enhance Your Stay</h3>
          <div class="space-y-4">
            <div class="flex items-start">
              <input type="checkbox" id="upgrade1" class="mt-1 h-5 w-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
              <label for="upgrade1" class="ml-3 flex-1">
                <span class="block font-medium text-gray-900">Private Butler Service</span>
                <span class="block text-sm text-gray-500">Dedicated butler for your entire stay</span>
                <span class="block font-bold text-amber-700 mt-1">$422.70 per stay</span>
              </label>
            </div>
            <div class="flex items-start">
              <input type="checkbox" id="upgrade2" class="mt-1 h-5 w-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
              <label for="upgrade2" class="ml-3 flex-1">
                <span class="block font-medium text-gray-900">Spa Retreat Package</span>
                <span class="block text-sm text-gray-500">Includes 2 massages and full spa access</span>
                <span class="block font-bold text-amber-700 mt-1">$1,000.00 per stay</span>
              </label>
            </div>
          </div>
        </div>

        <!-- Guest Details -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
          <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Guest Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
              <p class="font-medium text-gray-900">John</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
              <p class="font-medium text-gray-900">Smith</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <p class="font-medium text-gray-900">john.smith@example.com</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
              <p class="font-medium text-gray-900">+1 (555) 123-4567</p>
            </div>
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">Special Requests</label>
              <p class="font-medium text-gray-900">Early check-in requested if possible</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column - Payment Summary -->
      <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 h-fit sticky top-6">
        <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Payment Summary</h3>
        <div class="space-y-4">
          <div class="flex justify-between">
            <span class="text-gray-600">Room (28 nights)</span>
            <span class="font-medium">$12,600.00</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Taxes & Fees</span>
            <span class="font-medium">$1,890.00</span>
          </div>
          <div class="flex justify-between border-t border-gray-200 pt-4">
            <span class="text-gray-600">Subtotal</span>
            <span class="font-medium">$14,490.00</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Discount</span>
            <span class="text-amber-700 font-medium">-$1,000.00</span>
          </div>
          <div class="flex justify-between border-t border-gray-200 pt-4">
            <span class="text-lg font-bold">Total</span>
            <span class="text-lg font-bold">$13,490.00</span>
          </div>
        </div>

        <div class="mt-8">
          <h4 class="font-medium text-gray-900 mb-3">Apply Coupon</h4>
          <div class="flex">
            <input type="text" placeholder="Enter coupon code" class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:ring-amber-500 focus:border-amber-500">
            <button class="bg-amber-600 text-white px-4 py-2 rounded-r-lg hover:bg-amber-700 transition-colors">Apply</button>
          </div>
          <div class="mt-4">
            <button class="text-sm text-amber-600 hover:text-amber-700">View all available coupons</button>
          </div>
        </div>

        <button class="mt-8 w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white font-bold py-3 px-6 rounded-lg hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-md">
          Complete Booking
        </button>

        <div class="mt-6 text-center">
          <p class="text-xs text-gray-500">By completing this booking, you agree to our <a href="#" class="text-amber-600 hover:underline">Terms of Service</a> and <a href="#" class="text-amber-600 hover:underline">Privacy Policy</a>.</p>
        </div>
      </div>
    </div>

    <!-- Important Information -->
    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 mb-12">
      <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Important Information</h3>
      <div class="space-y-6">
        <div>
          <h4 class="font-medium text-gray-900 mb-2">Cancellation Policy</h4>
          <p class="text-gray-700">Free cancellation until 72 hours before check-in. Cancellations within 72 hours will incur a fee equivalent to one night's stay.</p>
        </div>
        <div>
          <h4 class="font-medium text-gray-900 mb-2">Check-In Requirements</h4>
          <p class="text-gray-700">Please present a valid government-issued ID and the credit card used for booking upon arrival.</p>
        </div>
        <div>
          <h4 class="font-medium text-gray-900 mb-2">Contact Information</h4>
          <p class="text-gray-700">For any inquiries, please contact our concierge at <a href="tel:+18005551234" class="text-amber-600 hover:underline">+1 (800) 555-1234</a> or <a href="mailto:concierge@grandpalisades.com" class="text-amber-600 hover:underline">concierge@grandpalisades.com</a>.</p>
        </div>
      </div>
    </div>

    <!-- Download Options -->
    <div class="text-center">
      <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Download Your Booking Details</h3>
      <div class="flex flex-wrap justify-center gap-4">
        <button class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
          </svg>
          PDF Version
        </button>
        <button class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          Add to Calendar
        </button>
        <button class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
          </svg>
          Share Booking
        </button>
      </div>
    </div>
  </div>
</div>

@endsection