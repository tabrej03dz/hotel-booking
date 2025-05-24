<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($booking) ? 'Edit Booking' : 'Create Booking' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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

                    <!-- Room Type -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Room Type</label>
                        <select name="room_type_id" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                            <option value="">Select a room type</option>
                            @foreach($roomTypes as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('room_type_id', $booking->room_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Customer Name</label>
                        <input type="text" name="name" value="{{ old('name', $booking->name ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter customer name" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $booking->email ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter customer email" required>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $booking->phone ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter phone number" required>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Check-in Date</label>
                            <input type="date" name="check_in_date"
                                   value="{{ old('check_in_date', $booking->check_in_date ?? '') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Check-out Date</label>
                            <input type="date" name="check_out_date"
                                   value="{{ old('check_out_date', $booking->check_out_date ?? '') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                        </div>
                    </div>

                    <!-- Guests -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Adults</label>
                            <input type="number" name="adults" value="{{ old('adults', $booking->adults ?? 1) }}"
                                   min="1" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Children</label>
                            <input type="number" name="children" value="{{ old('children', $booking->children ?? 0) }}"
                                   min="0" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Extra Person</label>
                            <input type="number" name="extra_person" value="{{ old('extra_person', $booking->extra_person ?? 0) }}"
                                   min="0" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>

                    <!-- Rooms and Staying Days -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Rooms</label>
                            <input type="number" name="rooms" value="{{ old('rooms', $booking->rooms ?? 1) }}"
                                   min="1" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Staying Days</label>
                            <input type="number" name="staying_days" value="{{ old('staying_days', $booking->staying_days ?? 0) }}"
                                   min="1" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                    </div>

                    <!-- Financials -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Amount</label>
                            <input type="number" name="amount" step="0.01"
                                   value="{{ old('amount', $booking->amount ?? 0.00) }}"
                                   class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Additional Charges</label>
                            <input type="number" name="additional_service_charge" step="0.01"
                                   value="{{ old('additional_service_charge', $booking->additional_service_charge ?? 0.00) }}"
                                   class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Tax & Fee</label>
                            <input type="number" name="tax_and_fee" step="0.01"
                                   value="{{ old('tax_and_fee', $booking->tax_and_fee ?? 0.00) }}"
                                   class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Total Amount</label>
                        <input type="number" name="total_amount" step="0.01"
                               value="{{ old('total_amount', $booking->total_amount ?? 0.00) }}"
                               class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <!-- GST Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">GST Number</label>
                            <input type="text" name="gst_number" maxlength="15"
                                   value="{{ old('gst_number', $booking->gst_number ?? '') }}"
                                   class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Company Name</label>
                            <input type="text" name="company_name"
                                   value="{{ old('company_name', $booking->company_name ?? '') }}"
                                   class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            @php
                                $statuses = ['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled', 'completed' => 'Completed', 'failed' => 'Failed'];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $booking->status ?? 'pending') === $value ? 'selected' : '' }}>
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
