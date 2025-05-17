<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($amenity) ? 'Edit Amenity' : 'Create Amenity' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($amenity) ? 'Edit Amenity' : 'Create New Amenity' }}
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
                    action="{{ isset($amenity) ? route('amenity.update', $amenity->id) : route('amenity.store') }}"
                    method="POST" class="space-y-4">
                    @csrf
                    {{-- @if (isset($roomType))
                        @method('POST') <!-- Laravel doesn't allow PUT/PATCH via form, so using POST -->
                    @endif --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="icon"
                               value="{{ old('icon', isset($amenity) ? $amenity->icon : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room type icon" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', isset($amenity) ? $amenity->name : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter room type name" required>
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
