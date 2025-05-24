<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Booking Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">

                <!-- Booking & Customer Info -->
                <div>
                    <p><span class="font-semibold">Booking ID:</span> {{ $booking->booking_id }}</p>
                    <p><span class="font-semibold">Name:</span> {{ $booking->name }}</p>
                    <p><span class="font-semibold">Email:</span> {{ $booking->email }}</p>
                    <p><span class="font-semibold">Phone:</span> {{ $booking->phone }}</p>
                    <p><span class="font-semibold">Status:</span> 
                        <span class="capitalize px-2 py-1 rounded-full 
                        @if($booking->status == 'confirmed') bg-green-100 text-green-800 
                        @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800 
                        @elseif($booking->status == 'cancelled') bg-red-100 text-red-800 
                        @else bg-gray-100 text-gray-800 @endif">
                            {{ $booking->status }}
                        </span>
                    </p>
                </div>

                <!-- Stay Info -->
                <div>
                    <p><span class="font-semibold">Check-in Date:</span> {{ $booking->check_in_date->format('d M, Y') }}</p>
                    <p><span class="font-semibold">Check-out Date:</span> {{ $booking->check_out_date->format('d M, Y') }}</p>
                    <p><span class="font-semibold">Staying Days:</span> {{ $booking->staying_days }}</p>
                    <p><span class="font-semibold">Room Type:</span> {{ $booking->roomType->name ?? 'N/A' }}</p>
                    <p><span class="font-semibold">Rooms:</span> {{ $booking->rooms }}</p>
                </div>

                <!-- People Info -->
                <div>
                    <p><span class="font-semibold">Adults:</span> {{ $booking->adults }}</p>
                    <p><span class="font-semibold">Children:</span> {{ $booking->children ?? 0 }}</p>
                    <p><span class="font-semibold">Extra Person:</span> {{ $booking->extra_person ?? 0 }}</p>
                </div>

                <!-- Payment Info -->
                <div>
                    <p><span class="font-semibold">Base Amount:</span> ₹{{ number_format($booking->amount, 2) }}</p>
                    <p><span class="font-semibold">Additional Services:</span> ₹{{ number_format($booking->additional_service_charge, 2) }}</p>
                    <p><span class="font-semibold">Taxes & Fees:</span> ₹{{ number_format($booking->tax_and_fee, 2) }}</p>
                    <p class="text-lg font-semibold"><span class="text-gray-800">Total Amount:</span> ₹{{ number_format($booking->total_amount, 2) }}</p>
                </div>

                <!-- GST Info -->
                <div>
                    <p><span class="font-semibold">GST Number:</span> {{ $booking->gst_number ?? 'N/A' }}</p>
                    <p><span class="font-semibold">Company Name:</span> {{ $booking->company_name ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('booking.index') }}"
                   class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 text-sm font-medium">Back to List</a>
                <a href="{{ route('booking.edit', $booking->id) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm font-medium">Edit Booking</a>
            </div>
        </div>
    </div>
</x-app-layout>
