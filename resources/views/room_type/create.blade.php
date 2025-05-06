<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($roomType) ? 'Edit Permission' : 'Create Permission' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($roomType) ? 'Edit Room Type' : 'Create New Room Type' }}
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
                <form
                    action="{{ isset($roomType) ? route('room-type.update', $roomType->id) : route('room-type.store') }}"
                    method="POST" class="space-y-4">
                    @csrf
                    {{-- @if (isset($roomType))
                        @method('POST') <!-- Laravel doesn't allow PUT/PATCH via form, so using POST -->
                    @endif --}}

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', isset($roomType) ? $roomType->name : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room type name" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Price</label>
                        <input type="number" name="price"
                               value="{{ old('price', isset($roomType) ? $roomType->price : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room type price" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Discounted Price</label>
                        <input type="number" name="discounted_price"
                               value="{{ old('discounted_price', isset($roomType) ? $roomType->discounted_price : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room type discounted price" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea name="description"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                  placeholder="Enter Room type description" required>{{ old('description', isset($roomType) ? $roomType->description : '') }}</textarea>
                    </div>
                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($roomType) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
