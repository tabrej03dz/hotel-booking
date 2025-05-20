<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($service) ? 'Edit Room' : 'Create Room' }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($service) ? 'Edit Service' : 'Create New Service' }}
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

                <form action="{{ isset($service) ? route('additional-service.update', $service->id) : route('additional-service.store') }}"
                      method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name', $service->name ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter service name" >
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Price</label>
                        <input type="number" name="price"
                               value="{{ old('price', isset($service) ? $service->price : '') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter service price">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea name="description"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                                  placeholder="Enter service description">{{ old('description', isset($service) ? $service->description : '') }}</textarea>
                    </div>

{{--                    <div>--}}
{{--                        <label class="block text-gray-700 font-medium mb-2">Room Images</label>--}}
{{--                        <input type="file" name="images[]" multiple--}}
{{--                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">--}}
{{--                        <p class="text-sm text-gray-500 mt-1">You can upload multiple images (JPEG, PNG, max 2MB each).</p>--}}
{{--                    </div>--}}


                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($service) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>

{{--                @if(isset($service))--}}
{{--                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">--}}
{{--                        @foreach ($service->images as $image)--}}
{{--                            <div class="relative group border rounded-lg overflow-hidden">--}}
{{--                                <img src="{{ asset('storage/' . $image->path) }}" alt="Room Image" class="w-full h-40 object-cover">--}}

{{--                                <!-- Remove button -->--}}
{{--                                <form action="{{ route('image.delete', $image->id) }}" method="POST"--}}
{{--                                      class="absolute top-0 right-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit"--}}
{{--                                            class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700">--}}
{{--                                        ✕--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
</x-app-layout>
