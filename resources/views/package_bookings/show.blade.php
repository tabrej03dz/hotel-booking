<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Package Booking Details') }}
            </h2>
            <a href="{{ route('package-booking.index') }}"
               class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium transition">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">📋 Booking Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
                    <div>
                        <p class="font-medium">Full Name:</p>
                        <p class="text-gray-900">{{ $booking->full_name }}</p>
                    </div>

                    <div>
                        <p class="font-medium">Email:</p>
                        <p class="text-gray-900">{{ $booking->email }}</p>
                    </div>

                    <div>
                        <p class="font-medium">Phone:</p>
                        <p class="text-gray-900">{{ $booking->phone }}</p>
                    </div>

                    <div>
                        <p class="font-medium">Package Name:</p>
                        <p class="text-gray-900">{{ $booking->package_name }}</p>
                    </div>

                    <div>
                        <p class="font-medium">Preferred Date:</p>
                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($booking->preferred_date)->format('d M Y') }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="font-medium">Additional Message:</p>
                        <p class="text-gray-900 whitespace-pre-line">{{ $booking->additional_message ?: '—' }}</p>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">

                    <form action="{{ route('package-booking.destroy', ['booking' => $booking->id]) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this booking?');">
                        @csrf
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-md text-sm font-semibold transition shadow">
                            🗑️ Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
