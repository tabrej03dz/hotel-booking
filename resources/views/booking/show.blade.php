<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-4">Booking #{{ $booking->id }}</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Customer Info --}}
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Customer Information</h4>
                        <p><strong>Name:</strong> {{ $booking->customer->name }}</p>
                        <p><strong>Email:</strong> {{ $booking->customer->email }}</p>
                        <p><strong>Phone:</strong> {{ $booking->customer->phone }}</p>
                        @if($booking->customer->address)
                            <p><strong>Address:</strong> {{ $booking->customer->address }}</p>
                        @endif
                    </div>

                    {{-- Booking Info --}}
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Booking Information</h4>
                        <p><strong>Room Number:</strong> {{ $booking->room->room_number }}</p>
                        <p><strong>Room Type:</strong> {{ $booking->room->roomType->name }}</p>
                        <p><strong>Hotel:</strong> {{ $booking->room->hotel->name }}</p>
                        <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</p>
                        <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</p>
                        <p><strong>Status:</strong> <span class="capitalize">{{ $booking->status }}</span></p>
                        <p><strong>Total Amount:</strong> ₹{{ number_format($booking->total_amount, 2) }}</p>
                    </div>
                </div>

                {{-- Optional Actions --}}
                <div class="mt-6">
                    <a href="{{ route('booking.index') }}"
                       class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                        Back to Bookings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
