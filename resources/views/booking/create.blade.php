<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($booking) ? 'Edit Booking' : 'Create Booking' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($booking) ? 'Edit Booking' : 'Create New Booking' }}
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($booking) ? route('booking.update', $booking->id) : route('booking.store') }}"
                      method="POST" class="space-y-4">
                    @csrf
                    @if(isset($booking))
                        @method('PUT')
                    @endif

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Room</label>
                        <select name="room_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            <option value="">Select a room</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id ?? '') == $room->id ? 'selected' : '' }}>
                                    {{ $room->room_number }} - {{ $room->hotel->name ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Customer Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter customer name" required>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter customer email" required>
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter phone number" required>
                    </div>

                    {{-- Address (Optional) --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Address</label>
                        <textarea name="address" rows="3"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                  placeholder="Enter address">{{ old('address') }}</textarea>
                    </div>


                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Check-in Date</label>
                        <input type="date" name="check_in_date" value="{{ old('check_in_date', $booking->check_in_date ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Check-out Date</label>
                        <input type="date" name="check_out_date" value="{{ old('check_out_date', $booking->check_out_date ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            @php
                                $statuses = ['confirmed' => 'Confirmed', 'pending' => 'Pending', 'cancelled' => 'Cancelled'];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $booking->status ?? 'confirmed') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($booking) ? 'Update Booking' : 'Submit Booking' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
