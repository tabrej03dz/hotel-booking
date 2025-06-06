<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($hotel) ? 'Edit Permission' : 'Create Permission' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($hotel) ? 'Edit Permission' : 'Create New Permission' }}
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
                    action="{{ isset($hotel) ? route('hotel.update', $hotel->id) : route('hotel.store') }}"
                    method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    {{-- @if (isset($hotel))
                        @method('POST') <!-- Laravel doesn't allow PUT/PATCH via form, so using POST -->
                    @endif --}}

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', isset($hotel) ? $hotel->name : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter hotel name" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">City</label>
                        <input type="text" name="city"
                               value="{{ old('city', isset($hotel) ? $hotel->city : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter hotel city" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">State</label>
                        <input type="text" name="state"
                               value="{{ old('state', isset($hotel) ? $hotel->state : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter hotel state" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">County</label>
                        <input type="text" name="country"
                               value="{{ old('country', isset($hotel) ? $hotel->country : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter hotel country" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="number" name="phone"
                               value="{{ old('phone', isset($hotel) ? $hotel->phone : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter hotel phone" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Address</label>
                        <textarea name="address"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                  placeholder="Enter hotel address" required>{{ old('address', isset($hotel) ? $hotel->address : '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Hotel Images</label>
                        <input type="file" name="images[]" multiple
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                        <p class="text-sm text-gray-500 mt-1">You can upload multiple images (JPEG, PNG, max 2MB each).</p>
                    </div>
                    
                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($hotel) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
                @if (isset($hotel) && $hotel->images)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                        @foreach ($hotel->images as $image)
                            <div class="relative group border rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Hotel Image" class="w-full h-40 object-cover">

                                <!-- Remove button -->
                                <form action="{{ route('image.delete', $image->id) }}" method="POST"
                                    class="absolute top-2 right-2 hidden group-hover:block">
                                    @csrf
                                    <button type="submit"
                                            class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700">
                                        ✕
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
