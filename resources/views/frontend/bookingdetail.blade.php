@extends('component.main')
@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-2">Your Luxury Escape Awaits</h1>
                <div class="w-24 h-1 bg-amber-500 mx-auto"></div>
                <p class="text-gray-600 mt-4">Booking confirmation for your stay at</p>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-amber-700">Krinoscco</h2>
            </div>

            <form action="{{ route('booking.save', $roomType->id) }}" method="post">
                @csrf
                <input type="hidden" name="days" id="stayin-days" value="{{ $days }}">
                <!-- Booking Summary Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 border border-gray-100">
                    <!-- Hotel Image -->
                    <div class="relative h-48 md:h-64 w-full overflow-hidden">
                        <img src="{{asset($roomType->images?->first() ? 'storage/' . $roomType->images->first()->path : 'asset/deluxe/deluxe-4.jpg')}}"
                            alt="The Grand Palisades" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Confirmed</span>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Check-In</h3>
                                <div class="flex items-center space-x-3">
                                    <div class="bg-amber-50 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <input type="date" class="font-bold text-gray-900" name="check_in_date"
                                            value="{{ $checkInDate }}" readonly />
                                        {{-- <p class="text-gray-600">From 3:00 PM</p> --}}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Check-Out</h3>
                                <div class="flex items-center space-x-3">
                                    <div class="bg-amber-50 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <input type="date" class="font-bold text-gray-900" name="check_out_date"
                                            value="{{ $checkOutDate }}" readonly />
                                        {{-- <p class="text-gray-600">Until 11:00 AM</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">{{$roomType->name}}</h3>
                            <div class="flex flex-wrap gap-4 mb-6">
                                {{--              <div class="flex items-center text-sm text-gray-600"> --}}
                                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                                {{--                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /> --}}
                                {{--                </svg> --}}
                                {{--                King Bed • 65 m² --}}
                                {{--              </div> --}}
                                {{--              <div class="flex items-center text-sm text-gray-600"> --}}
                                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                                {{--                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 100 8M4 7a4 4 0 011.732-3H2v5h2V4h1.732A4 4 0 014 7zm6 0a4 4 0 100 8 4 4 0 000-8zm-6 6a4 4 0 011.732 3H2v-5h2v5h1.732A4 4 0 0110 13zm6 0a4 4 0 011.732 3H12v-5h2v5h1.732A4 4 0 0116 13z" /> --}}
                                {{--                </svg> --}}
                                {{--                2 Adults --}}
                                {{--              </div> --}}
                                {{--              <div class="flex items-center text-sm text-gray-600"> --}}
                                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                                {{--                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /> --}}
                                {{--                </svg> --}}
                                {{--                Ocean View --}}
                                {{--              </div> --}}
                                @foreach ($roomType->amenities as $amenity)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <div>
                                            @if ($amenity->icon)
                                                <i class="{{ $amenity->icon }}"></i>
                                            @else
                                                <span>No Icon</span>
                                            @endif

                                        </div>

                                        {{ $amenity->name }}
                                    </div>
                                @endforeach
                            </div>
                            <p class="text-gray-700 mb-6">{{$roomType->description}}</p>
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
                                @foreach($additionalServices as $service)
                                    <div class="flex items-start justify-between border-b py-3">
                                        <div class="flex items-start">
                                            <input
                                                type="checkbox"
                                                name="service_ids[]" value="{{$service->id}}"
                                                id="service{{ $service->id }}"
                                                class="mt-1 h-5 w-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500 service-checkbox"
                                                data-id="{{ $service->id }}"
                                                data-price="{{ $service->price }}"
                                            >

                                            <label for="service{{ $service->id }}" class="ml-3">
                                                <span class="block font-medium text-gray-900">{{ $service->name }}</span>
                                                <span class="block text-sm text-gray-500">{{ $service->description }}</span>
                                                <span class="block font-bold text-amber-700 mt-1">&#8377; {{ $service->price }} per unit</span>
                                            </label>
                                        </div>

                                        <!-- Quantity controls -->
                                        <div class="flex items-center space-x-2 ml-4">
                                            <button type="button" class="decrease-qty px-2 py-1 bg-gray-200 rounded" data-id="{{ $service->id }}">-</button>
                                            <input type="number" name="quantities[{{ $service->id }}]" value="1" min="1"
                                                   class="service-qty w-12 text-center border border-gray-300 rounded"
                                                   data-id="{{ $service->id }}" data-price="{{ $service->price }}" disabled>
                                            <button type="button" class="increase-qty px-2 py-1 bg-gray-200 rounded" data-id="{{ $service->id }}">+</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                          </div>

                        <!-- Guest Details -->
                        <div x-data="{
                                    showGST: {{ old('gst_required') || $errors->has('gst_number') || $errors->has('company_name') ? 'true' : 'false' }},
                                    children: '{{ old('children', 0) }}',
                                    childAges: [
                                        @if(old('children'))
                                            @for ($i = 0; $i < old('children'); $i++)
                                                '{{ old("child_ages.$i") }}'{{ $i < old('children') - 1 ? ',' : '' }}
                                            @endfor
                                        @endif
                                    ]}" class="bg-white rounded-xl shadow-md p-6 border border-gray-100">

                            <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Guest Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" name="name" placeholder="Full Name" value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                        required />
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" placeholder="john.smith@example.com" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                        required />
                                    @error('email')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                    <input type="text" name="phone" placeholder="+1 (555) 123-4567" value="{{ old('phone', auth()->check() ? auth()->user()->phone_number : '') }}"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                        required />
                                    @error('phone')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <textarea name="address" placeholder="City, State, Country"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Adults -->
                                <div class="flex flex-col">
                                    <label class="text-gray-700 font-medium">Adults</label>
                                    <select id="adults" name="adults" required
                                        class="border border-gray-300 rounded-md p-2 bg-white outline-none focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                                        <option value="1" {{ old('adults') == '1' ? 'selected' : '' }}>1 Adult</option>
                                        <option value="2" {{ old('adults') == '2' ? 'selected' : '' }}>2 Adults</option>
                                        <option value="3" {{ old('adults') == '3' ? 'selected' : '' }}>3 Adults</option>
                                    </select>
                                    @error('adults')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <select id="children" name="children" required x-model="children"
                                        @change="childAges = Array.from({ length: parseInt(children) }, (_, i) => '')"
                                        class="border border-gray-300 rounded-md p-2 bg-white outline-none focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                                    <option value="0">No Children</option>
                                    <option value="1">1 Child</option>
                                    <option value="2">2 Children</option>
                                </select>

                                <div class="mt-4" x-show="children > 0">
                                    <template x-for="(age, index) in childAges" :key="index">
                                        <div class="mb-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Child Age <span x-text="index + 1"></span>
                                            </label>
                                            <input type="number"
                                                   :name="'child_ages[' + index + ']'"
                                                   min="0" max="17"
                                                   class="child-age-input w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                                   x-model="childAges[index]"
                                                   placeholder="Enter age">

                                            {{-- Blade error handling (only works for existing indexes) --}}
                                            @for ($i = 0; $i < 5; $i++)  {{-- Adjust max index if needed --}}
                                            @error("child_ages.$i")
                                            <template x-if="index === {{ $i }}">
                                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                            </template>
                                            @enderror
                                            @endfor
                                        </div>
                                    </template>
                                </div>
                                <!-- Rooms -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Rooms</label>
                                    <input type="number" name="rooms" placeholder="1" value="{{ old('rooms', 1) }}"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                        required />
                                    @error('rooms')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- GST Bill Checkbox -->
                                <div class="mt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="gst_required" value="on" x-model="showGST" class="form-checkbox">
                                        <span class="ml-2 text-sm text-gray-700 font-medium">Request GST Bill</span>
                                    </label>
                                </div>
                                <!-- GST Number -->
                                <div x-show="showGST" x-cloak class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">GST Number</label>
                                    <input type="text" name="gst_number" value="{{ old('gst_number') }}"
                                        class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                        placeholder="22ABCDE1234F1Z5">
                                    @error('gst_number')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Company Name -->
                                <div x-show="showGST" x-cloak class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                                            class="w-full border border-gray-300 p-2 rounded font-medium text-gray-900"
                                            placeholder="Company Pvt. Ltd.">
                                        @error('company_name')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{--payment summary--}}
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 h-fit sticky top-6">
                        <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Payment Summary</h3>
                        @php
                            $price = 0;
                            foreach($roomType->selectedDateAvailabilities($checkInDate, $checkOutDate) as $availability){
                                $price += $availability->price;
                            }

                            $taxRate = $price < 7500 ? 0.12 : 0.18;
                            $tax = $price * $taxRate;
                        @endphp
                        <div class="space-y-4">
                            @php
                            $totalRoomPrice = 0;
                            foreach($roomType->selectedDateAvailabilities($checkInDate, $checkOutDate) as $availability) {
                                $totalRoomPrice += $availability->price;
                            }
                        @endphp

                        <div class="flex justify-between">
                            <span class="text-gray-600">Room Price (for {{ count($roomType->selectedDateAvailabilities($checkInDate, $checkOutDate)) }} days)</span>
                            <span class="font-medium" id="room-price">₹{{ number_format($totalRoomPrice, 2) }}</span>
                        </div>

                            <!-- 👇 Service Charges -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Additional Services</span>
                                <span class="font-medium" id="service-price">₹0.00</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-600">Extra Person</span>
                                <span class="font-medium" id="extra-person">₹0.00</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-600">Child</span>
                                <span class="font-medium" id="extra-child">₹0.00</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-600">Taxes & Fees</span>
                                <span class="font-medium" id="tax-amount">₹{{ number_format($tax, 2) }}</span>
                            </div>

                            <div class="flex justify-between border-t border-gray-200 pt-4">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium" id="subtotal">₹{{ number_format($price + $tax, 2) }}</span>
                            </div>

                            <div class="flex justify-between border-t border-gray-200 pt-4">
                                <span class="text-lg font-bold">Total</span>
                                <span class="text-lg font-bold" id="total-price">₹{{ number_format($price + $tax, 2) }}</span>
                            </div>

                            <p class="text-xs text-gray-500 mt-1" id="tax-note">GST @ {{ $taxRate * 100 }}% applied based on room price</p>
                        </div>

                        <button type="submit"
                            class="mt-8 w-full bg-gradient-to-r from-amber-600 to-amber-700 text-white font-bold py-3 px-6 rounded-lg hover:from-amber-700 hover:to-amber-800 transition-all duration-300 shadow-md">
                            Confirm Booking
                        </button>

                        <div class="mt-6 text-center">
                            <p class="text-xs text-gray-500">By completing this booking, you agree to our
                                <a href="#" class="text-amber-600 hover:underline">Terms of Service</a> and
                                <a href="#" class="text-amber-600 hover:underline">Privacy Policy</a>.
                            </p>
                        </div>
                    </div>

                </div>
            </form>

            <!-- Important Information -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 mb-12">
                <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Important Information</h3>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Cancellation Policy</h4>
                        <p class="text-gray-700">Free cancellation until 72 hours before check-in. Cancellations within 72
                            hours will incur a fee equivalent to one night's stay.</p>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Check-In Requirements</h4>
                        <p class="text-gray-700">Please present a valid government-issued ID and the credit card used for
                            booking upon arrival.</p>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Contact Information</h4>
                        <p class="text-gray-700">For any inquiries, please contact our concierge at <a href="tel:+917275002525" class="text-amber-600 hover:underline">7275002525</a>
                            or <a
                                href="mailto:Info@krinoscco.com"
                                class="text-amber-600 hover:underline">Info@krinoscco.com</a>.</p>
                    </div>
                </div>
            </div>

            <!-- Download Options -->
{{--            <div class="text-center">--}}
{{--                <h3 class="text-xl font-serif font-bold text-gray-900 mb-6">Download Your Booking Details</h3>--}}
{{--                <div class="flex flex-wrap justify-center gap-4">--}}
{{--                    <button--}}
{{--                        class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"--}}
{{--                            stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />--}}
{{--                        </svg>--}}
{{--                        PDF Version--}}
{{--                    </button>--}}
{{--                    <button--}}
{{--                        class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"--}}
{{--                            stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />--}}
{{--                        </svg>--}}
{{--                        Add to Calendar--}}
{{--                    </button>--}}
{{--                    <button--}}
{{--                        class="flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"--}}
{{--                            stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />--}}
{{--                        </svg>--}}
{{--                        Share Booking--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const adultsDropdown = document.getElementById("adults");
            const childrenDropdown = document.getElementById("children");

            function updateChildrenOptions() {
                let adults = parseInt(adultsDropdown.value, 10);

                if (adults === 3) {
                    // If 3 adults are selected, disable children dropdown and set it to 0
                    childrenDropdown.value = "0";
                    childrenDropdown.disabled = true;
                } else if (adults === 2) {
                    // If 2 adults are selected, allow 1 or 2 children
                    childrenDropdown.innerHTML = `
                    <option value="0">No Children</option>
                    <option value="1">1 Child</option>
                    <option value="2">2 Children</option>
                `;
                    childrenDropdown.disabled = false;
                } else {
                    // If 1 adult is selected, allow all options
                    childrenDropdown.innerHTML = `
                    <option value="0">No Children</option>
                    <option value="1">1 Child</option>
                    <option value="2">2 Children</option>
                `;
                    childrenDropdown.disabled = false;
                }
            }

            // Add event listener to Adults dropdown
            adultsDropdown.addEventListener("change", updateChildrenOptions);

            // Initialize on page load
            updateChildrenOptions();
        });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const baseRoomPrice = {{ $totalRoomPrice }};
        const serviceCheckboxes = document.querySelectorAll(".service-checkbox");
        const qtyInputs = document.querySelectorAll(".service-qty");

        const roomPriceElem = document.getElementById("room-price");
        const servicePriceElem = document.getElementById("service-price");
        const taxElem = document.getElementById("tax-amount");
        const subtotalElem = document.getElementById("subtotal");
        const totalElem = document.getElementById("total-price");
        const extraPersonElem = document.getElementById("extra-person");
        const taxNoteElem = document.getElementById("tax-note");

        const roomsInput = document.querySelector('input[name="rooms"]');
        const daysInput = document.getElementById("stayin-days");
        const adultsInput = document.getElementById("adults");

        const formatINR = (val) => '₹' + val.toFixed(2);

        function updatePaymentSummary() {
            let totalServiceCost = 0;

            const stayingDays = parseInt(daysInput?.value || 1);
            const totalRooms = parseInt(roomsInput?.value || 1);

            const totalRoomPrice = baseRoomPrice * totalRooms;

            // Services
            serviceCheckboxes.forEach(cb => {
                const id = cb.dataset.id;
                const price = parseFloat(cb.dataset.price || 0);
                const qtyInput = document.querySelector(`.service-qty[data-id="${id}"]`);
                if (cb.checked && qtyInput) {
                    const quantity = parseInt(qtyInput.value || 1);
                    totalServiceCost += price * quantity * stayingDays;
                    qtyInput.disabled = false;
                } else if (qtyInput) {
                    qtyInput.disabled = true;
                }
            });

            // Extra Person
            const adults = parseInt(adultsInput?.value || 1);
            const extraAdults = adults > 2 ? (adults - 2) : 0;
            const extraPersonCharge = extraAdults * 1500 * stayingDays;
            extraPersonElem.textContent = formatINR(extraPersonCharge);

            // Extra Child Charges
            let extraChildCharge = 0;
            document.querySelectorAll('.child-age-input').forEach(input => {
                const age = parseInt(input.value);
                if (!isNaN(age) && age > 6) {
                    extraChildCharge += 500 * stayingDays;
                }
            });
            document.getElementById("extra-child").textContent = formatINR(extraChildCharge);


            // Tax logic
            // const updatedSubtotal = totalRoomPrice + totalServiceCost + extraPersonCharge;
            const updatedSubtotal = totalRoomPrice + totalServiceCost + extraPersonCharge + extraChildCharge;

            const appliedTaxRate = totalRoomPrice < 7500 ? 0.12 : 0.18;
            const tax = updatedSubtotal * appliedTaxRate;
            const grandTotal = updatedSubtotal + tax;

            // DOM Updates
            document.getElementById("room-price").textContent = formatINR(totalRoomPrice);
            servicePriceElem.textContent = formatINR(totalServiceCost);
            taxElem.textContent = formatINR(tax);
            subtotalElem.textContent = formatINR(updatedSubtotal);
            totalElem.textContent = formatINR(grandTotal);
            taxNoteElem.textContent = `GST @ ${appliedTaxRate * 100}% applied based on room total`;
        }


        // Event Listeners
        serviceCheckboxes.forEach(cb => cb.addEventListener("change", updatePaymentSummary));
        qtyInputs.forEach(input => input.addEventListener("input", updatePaymentSummary));
        roomsInput?.addEventListener("input", updatePaymentSummary);
        adultsInput?.addEventListener("change", updatePaymentSummary);
        document.addEventListener("input", function (e) {
            if (e.target.classList.contains("child-age-input")) {
                updatePaymentSummary();
            }
        });

        document.querySelectorAll(".increase-qty").forEach(btn => {
            btn.addEventListener("click", function () {
                const id = this.dataset.id;
                const input = document.querySelector(`.service-qty[data-id="${id}"]`);
                input.value = parseInt(input.value) + 1;
                updatePaymentSummary();
            });
        });

        document.querySelectorAll(".decrease-qty").forEach(btn => {
            btn.addEventListener("click", function () {
                const id = this.dataset.id;
                const input = document.querySelector(`.service-qty[data-id="${id}"]`);
                input.value = Math.max(1, parseInt(input.value) - 1);
                updatePaymentSummary();
            });
        });

        updatePaymentSummary(); // Initialize
    });
</script>


@endsection
