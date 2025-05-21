@extends('frontend.profile.layout.layout')
@section('user-dashboard-content')

    <!-- Booking Confirmation -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100">

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-lg shadow-sm"
             role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Booking Confirmed!</p>
{{--                    <p class="text-sm">Your reservation at Hotel Krinoscco is confirmed. A confirmation email--}}
{{--                        has been sent to john@example.com.</p>--}}
                    <p class="text-sm">{{session('success')}}</p>
                </div>
            </div>
        </div>
        @endif

        @foreach($bookings as $booking)
            <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Room Details -->
            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Room Details</h3>
                <p class="mb-2"><span class="font-semibold">Type:</span> {{$booking->roomType->name}}</p>
                <p class="mb-2"><span class="font-semibold">Guests:</span> {{$booking->adults}} Adults, {{$booking->childrens}} Child</p>
                <p class="mb-2"><span class="font-semibold">Price:</span> ₹{{number_format($booking->total_amount)}}</p>
                @if($booking->payment?->status === 'paid')
                    <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-lg text-center smooth-transition">
                        <i class="fas fa-check-circle mr-1"></i> Payment Successful
                    </div>
                @elseif($booking->payment?->status === 'pending')
                    <div class="mt-4 p-3 bg-yellow-100 text-yellow-800 rounded-lg text-center smooth-transition">
                        <i class="fas fa-clock mr-1"></i> Payment Pending
                    </div>
                @elseif($booking->payment?->status === 'failed')
                    <div class="mt-4 p-3 bg-red-100 text-red-800 rounded-lg text-center smooth-transition">
                        <i class="fas fa-times-circle mr-1"></i> Payment Failed
                    </div>
                @endif

            </div>

            <!-- Stay Information -->
            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Stay Information</h3>
                <p class="mb-2"><span class="font-semibold">Check-In:</span> {{$booking->check_in_date->format('d M Y')}}</p>
                <p class="mb-2"><span class="font-semibold">Check-Out:</span> {{$booking->check_out_date->format('d M Y')}}</p>
                <p class="mb-2"><span class="font-semibold">Nights:</span> {{$booking->staying_days}}</p>
{{--                <p class="mt-3 text-sm text-luxuryBrown"><i class="fas fa-info-circle mr-1"></i> Early--}}
{{--                    check-in available for members</p>--}}
            </div>

            <!-- Guest Information -->
            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Guest Information</h3>
                <p class="mb-2"><span class="font-semibold">Name:</span> {{$booking->name}}</p>
                <p class="mb-2"><span class="font-semibold">Email:</span> {{$booking->email}}</p>
                <p class="mb-2"><span class="font-semibold">Phone:</span> {{$booking->phone}}</p>
{{--                <p class="mt-3 text-sm text-luxuryBrown"><i class="fas fa-star mr-1"></i> Diamond Member--}}
{{--                    Status</p>--}}
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
{{--            <button--}}
{{--                class="bg-gradient-to-r from-luxuryPurple to-luxuryBrown text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all transform hover:scale-105 smooth-transition flex items-center justify-center">--}}
{{--                <i class="fas fa-eye mr-2"></i> View Booking Details--}}
{{--            </button>--}}
            <a href="{{route('user.booking.generate-invoice', $booking->id)}}"
                class="border border-luxuryBrown text-luxuryBrown px-6 py-3 rounded-lg hover:bg-gray-50 hover:shadow-lg transition-all smooth-transition flex items-center justify-center">
                <i class="fas fa-download mr-2"></i> Generate Invoice
            </a>
        </div>
    </div>
        @endforeach

    </div>


    <!-- Help Section -->
{{--    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">--}}
{{--        <h3 class="font-bold text-lg mb-4 text-gray-800 border-b pb-2">Need Help With Your Booking?</h3>--}}
{{--        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">--}}
{{--            <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">--}}
{{--                <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">--}}
{{--                    <i class="fas fa-question-circle text-xl"></i>--}}
{{--                </div>--}}
{{--                <h4 class="font-medium mb-2">FAQs</h4>--}}
{{--                <p class="text-sm text-gray-600 mb-3">Find answers to common questions</p>--}}
{{--                <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">Visit Help Center</a>--}}
{{--            </div>--}}
{{--            <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">--}}
{{--                <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">--}}
{{--                    <i class="fas fa-phone-alt text-xl"></i>--}}
{{--                </div>--}}
{{--                <h4 class="font-medium mb-2">Customer Service</h4>--}}
{{--                <p class="text-sm text-gray-600 mb-3">Available 24/7 for your convenience</p>--}}
{{--                <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">+1 (800) 123-4567</a>--}}
{{--            </div>--}}
{{--            <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">--}}
{{--                <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">--}}
{{--                    <i class="fas fa-comments text-xl"></i>--}}
{{--                </div>--}}
{{--                <h4 class="font-medium mb-2">Live Chat</h4>--}}
{{--                <p class="text-sm text-gray-600 mb-3">Chat with our support team</p>--}}
{{--                <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">Start Chat</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
