<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($roomType) ? 'Edit Permission' : 'Create Permission' }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
                    method="POST" class="space-y-4" enctype="multipart/form-data">
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
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea name="description"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                  placeholder="Enter Room type description" required>{{ old('description', isset($roomType) ? $roomType->description : '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Amenities</label>
                        <select name="amenities[]" multiple class="select2 w-full" id="select2" required>
                            @foreach($amenities as $amenity)
                                <option value="{{ $amenity->id }}"
                                    {{ in_array($amenity->id, old('amenities', isset($roomType) ? $roomType->amenities->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                                    {{ $amenity->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Room Type Images</label>
                        <input type="file" name="images[]" multiple
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                        <p class="text-sm text-gray-500 mt-1">You can upload multiple images (JPEG, PNG, max 2MB each).</p>
                    </div>
                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($roomTypeType) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
                @if (isset($roomType) && $roomType->images)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                        @foreach ($roomType->images as $image)
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
        @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: "Select amenities",
                        allowClear: true,
                        width: '100%'
                    });
                });
            </script>
        @endpush
    </div>
</x-app-layout>
