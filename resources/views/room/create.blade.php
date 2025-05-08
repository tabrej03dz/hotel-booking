<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($room) ? 'Edit Room' : 'Create Room' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($room) ? 'Edit Room' : 'Create New Room' }}
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

                <form action="{{ isset($room) ? route('rooms.update', $room->id) : route('rooms.store') }}"
                      method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Room Number</label>
                        <input type="text" name="room_number"
                               value="{{ old('room_number', $room->room_number ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room number" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Hotel</label>
                        <select name="hotel_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            <option value="">Select a hotel</option>
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}" {{ old('hotel_id', $room->hotel_id ?? '') == $hotel->id ? 'selected' : '' }}>
                                    {{ $hotel->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Room Type</label>
                        <select name="room_type_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            <option value="">Select a room type</option>
                            @foreach($roomTypes as $type)
                                <option value="{{ $type->id }}" {{ old('room_type_id', $room->room_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Price (optional)</label>
                        <input type="number" name="price"
                               value="{{ old('price', isset($roomType) ? $roomType->price : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room price">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Discounted Price (optional)</label>
                        <input type="number" name="discounted_price"
                               value="{{ old('discounted_price', isset($roomType) ? $roomType->discounted_price : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room discounted price">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            @php
                                $statuses = ['available' => 'Available', 'booked' => 'Booked', 'maintenance' => 'Maintenance'];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $room->status ?? 'available') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($room) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
