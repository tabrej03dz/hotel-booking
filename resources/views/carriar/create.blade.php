<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($carriar) ? 'Edit carriar' : 'Create carriar' }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isset($carriar) ? 'Edit carriar' : 'Create New carriar' }}
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

                <form action="{{ isset($carriar) ? route('carriar.update', $carriar->id) : route('carriar.store') }}"
                    method="POST" class="space-y-4" enctype="multipart/form-data">
                    {{-- CSRF Token --}}
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Upload Image (Optional)</label>
                        <input type="file" name="image"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                        @if (isset($carriar) && $carriar->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $carriar->image) }}" alt="Uploaded Image"
                                    class="w-24 h-24 object-cover rounded-md border">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Job Title</label>
                        <input type="text" name="title" value="{{ old('title', $carriar->title ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Job Description</label>

                        <textarea name="description" rows="6" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                            placeholder="Enter job description here...">{{ old('description', $carriar->description ?? '') }}</textarea>
                    </div>



                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Company Name</label>
                        <input type="text" name="company_name"
                            value="{{ old('company_name', $carriar->company_name ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $carriar->location ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">carriar Type</label>
                        <select name="type"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                            <option value="Full-Time"
                                {{ old('type', $carriar->type ?? '') == 'Full-Time' ? 'selected' : '' }}>Full-Time
                            </option>
                            <option value="Part-Time"
                                {{ old('type', $carriar->type ?? '') == 'Part-Time' ? 'selected' : '' }}>Part-Time
                            </option>
                            <option value="Remote"
                                {{ old('type', $carriar->type ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Salary (Optional)</label>
                        <input type="number" step="0.01" name="salary"
                            value="{{ old('salary', $carriar->salary ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Experience</label>
                        <input type="text" name="experience"
                            value="{{ old('experience', $carriar->experience ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Qualification</label>
                        <input type="text" name="qualification"
                            value="{{ old('qualification', $carriar->qualification ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Contact Email</label>
                        <input type="email" name="contact_email"
                            value="{{ old('contact_email', $carriar->contact_email ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Last Date to Apply</label>
                        <input type="date" name="last_date_to_apply"
                            value="{{ old('last_date_to_apply', isset($carriar->last_date_to_apply) ? \Carbon\Carbon::parse($carriar->last_date_to_apply)->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">

                    </div>

                  <div class="flex items-center">
    <!-- Hidden input to ensure unchecked value is submitted -->
    <input type="hidden" name="is_active" value="0">

    <input type="checkbox" name="is_active" id="is_active"
        class="mr-2 rounded text-green-600 border-gray-300 focus:ring focus:ring-green-300"
        value="1"
        {{ old('is_active', $carriar->is_active ?? true) ? 'checked' : '' }}>
        
    <label for="is_active" class="text-gray-700 font-medium">Active</label>
</div>



                    <div>
                        <button type="submit"
                            class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            {{ isset($carriar) ? 'Update carriar' : 'Post carriar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
