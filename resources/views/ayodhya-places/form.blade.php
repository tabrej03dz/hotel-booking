<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 rounded-lg bg-white px-6 py-4 shadow-md sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $place->exists ? 'Edit Ayodhya Place' : 'Add Ayodhya Place' }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $place->exists
                        ? 'Update the attraction details displayed on the Explore Ayodhya page.'
                        : 'Add a new attraction to the Explore Ayodhya page.' }}
                </p>
            </div>

            <a wire:navigate
               href="{{ route('ayodhya-places.index') }}"
               class="inline-flex items-center justify-center rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-300">
                ← Back to Places
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="mb-6 flex items-start rounded-lg bg-red-100 px-4 py-3 text-red-700 shadow-md">
                    <svg class="mr-3 mt-0.5 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <div>
                        <p class="mb-2 font-semibold">
                            Please fix the following errors:
                        </p>

                        <ul class="space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

           <form id="ayodhyaPlaceForm"
                method="POST"
                enctype="multipart/form-data"
                action="{{ $place->exists
                    ? route('ayodhya-places.update', $place)
                    : route('ayodhya-places.store') }}"
                class="rounded-2xl border border-gray-100 bg-white p-6 shadow-xl md:p-8">

                @csrf

                @if ($place->exists)
                    @method('PUT')
                @endif

                <div class="mb-8 border-b border-gray-100 pb-5">
                    <h3 class="text-xl font-bold text-gray-800">
                        🛕 Place Information
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Fill in the attraction name, image, description and visitor information.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    {{-- Name --}}
                    <div>
                        <label for="name"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Place Name <span class="text-red-500">*</span>
                        </label>

                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name', $place->name) }}"
                               required
                               autofocus
                               placeholder="Example: Shri Ram Janmabhoomi Mandir"
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div>
                        <label for="category"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Category
                        </label>

                        <input id="category"
                               type="text"
                               name="category"
                               value="{{ old('category', $place->category) }}"
                               placeholder="Temple, Ghat, Heritage, Museum..."
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('category')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="md:col-span-2">
                        <label for="image"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Place Image
                            @unless ($place->exists)
                                <span class="text-red-500">*</span>
                            @endunless
                        </label>

                        <input id="image"
                               type="file"
                               name="image"
                               accept="image/jpeg,image/png,image/webp"
                               onchange="previewSelectedImage(event)"
                               class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-700 file:mr-4 file:rounded-md file:border-0 file:bg-[#c21108] file:px-4 file:py-2 file:font-semibold file:text-white hover:file:bg-[#000308]">

                        <p class="mt-2 text-xs text-gray-500">
                            Recommended size: 1200 × 800 pixels. Allowed formats: JPG, PNG and WEBP.
                        </p>

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                        <div id="imagePreviewWrapper"
                             class="{{ $place->image ? '' : 'hidden' }} mt-4">

                            <p class="mb-2 text-sm font-semibold text-gray-700">
                                Image Preview
                            </p>

                            <div class="relative inline-block overflow-hidden rounded-xl border border-gray-200 bg-gray-100 shadow-sm">
                                <img id="imagePreview"
                                     src="{{ $place->image ? $place->image_url : '' }}"
                                     alt="{{ $place->name ?: 'Place image preview' }}"
                                     class="h-48 w-full min-w-[280px] max-w-md object-cover">
                            </div>
                        </div>
                    </div>

                    {{-- Short Description --}}
                    <div class="md:col-span-2">
                        <label for="short_description"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Short Description <span class="text-red-500">*</span>
                        </label>

                        <textarea id="short_description"
                                  name="short_description"
                                  rows="4"
                                  required
                                  maxlength="500"
                                  placeholder="Write a short description for the attraction card..."
                                  class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">{{ old('short_description', $place->short_description) }}</textarea>

                        <div class="mt-1 flex items-center justify-between">
                            @error('short_description')
                                <p class="text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @else
                                <p class="text-xs text-gray-500">
                                    This description will appear on the attraction card.
                                </p>
                            @enderror

                            <span id="shortDescriptionCount"
                                  class="text-xs text-gray-400">
                                0 / 500
                            </span>
                        </div>
                    </div>

                    {{-- Full Description --}}
                    <div class="md:col-span-2">
                        <label for="description"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Full Description <span class="text-red-500">*</span>
                        </label>

                        <textarea id="description"
                            name="description"
                            rows="12"
                            placeholder="Write complete information about the place..."
                            class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">{{ old('description', $place->description) }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @else
                            <p class="mt-1 text-xs text-gray-500">
                                This content will appear on the attraction detail page.
                            </p>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div>
                        <label for="location"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Location
                        </label>

                        <input id="location"
                               type="text"
                               name="location"
                               value="{{ old('location', $place->location) }}"
                               placeholder="Example: Ram Path, Ayodhya"
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('location')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Timing --}}
                    <div>
                        <label for="timing"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Visiting Timings
                        </label>

                        <input id="timing"
                               type="text"
                               name="timing"
                               value="{{ old('timing', $place->timing) }}"
                               placeholder="Example: 6:00 AM to 10:00 PM"
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('timing')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Entry Fee --}}
                    <div>
                        <label for="entry_fee"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Entry Fee
                        </label>

                        <input id="entry_fee"
                               type="text"
                               name="entry_fee"
                               value="{{ old('entry_fee', $place->entry_fee) }}"
                               placeholder="Example: Free or ₹50 per person"
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('entry_fee')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Sort Order --}}
                    <div>
                        <label for="sort_order"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Display Order
                        </label>

                        <input id="sort_order"
                               type="number"
                               min="0"
                               name="sort_order"
                               value="{{ old('sort_order', $place->sort_order ?? 0) }}"
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        <p class="mt-1 text-xs text-gray-500">
                            Lower numbers will appear first.
                        </p>

                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Google Map URL --}}
                    <div class="md:col-span-2">
                        <label for="map_url"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Google Map URL
                        </label>

                        <input id="map_url"
                               type="url"
                               name="map_url"
                               value="{{ old('map_url', $place->map_url) }}"
                               placeholder="https://maps.google.com/..."
                               class="w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition focus:border-[#c21108] focus:ring-[#c21108]">

                        @error('map_url')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="md:col-span-2">
                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                            <label for="status"
                                   class="flex cursor-pointer items-center justify-between gap-4">

                                <div>
                                    <span class="block font-semibold text-gray-800">
                                        Active Status
                                    </span>

                                    <span class="mt-1 block text-sm text-gray-500">
                                        Enable this option to display the place on the Explore Ayodhya page.
                                    </span>
                                </div>

                                <div class="relative">
                                    <input id="status"
                                           type="checkbox"
                                           name="status"
                                           value="1"
                                           class="peer sr-only"
                                           {{ old('status', $place->exists ? $place->status : true) ? 'checked' : '' }}>

                                    <div class="h-7 w-12 rounded-full bg-gray-300 transition peer-checked:bg-green-500"></div>

                                    <div class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                {{-- Form buttons --}}
                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end">

                    <a wire:navigate
                       href="{{ route('ayodhya-places.index') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-gray-200 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-300">
                        Cancel
                    </a>

                    <button type="submit"
                            id="submitButton"
                            class="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-[#c21108] to-[#000308] px-7 py-3 font-semibold text-white shadow-md transition duration-300 hover:from-[#000308] hover:to-[#c21108] disabled:cursor-not-allowed disabled:opacity-60">

                        <svg id="submitSpinner"
                             class="mr-2 hidden h-5 w-5 animate-spin"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"></circle>

                            <path class="opacity-75"
                                  fill="currentColor"
                                  d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>

                        <span id="submitButtonText">
                            {{ $place->exists ? 'Update Place' : 'Save Place' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('ayodhyaPlaceForm');
            const submitButton = document.getElementById('submitButton');
            const submitButtonText = document.getElementById('submitButtonText');
            const submitSpinner = document.getElementById('submitSpinner');

            const shortDescription =
                document.getElementById('short_description');

            const shortDescriptionCount =
                document.getElementById('shortDescriptionCount');

            const descriptionField =
                document.getElementById('description');

            let descriptionEditor = null;

            function updateShortDescriptionCount() {
                if (!shortDescription || !shortDescriptionCount) {
                    return;
                }

                shortDescriptionCount.textContent =
                    shortDescription.value.length + ' / 500';
            }

            updateShortDescriptionCount();

            shortDescription?.addEventListener(
                'input',
                updateShortDescriptionCount
            );

            if (
                descriptionField &&
                typeof ClassicEditor !== 'undefined'
            ) {
                ClassicEditor
                    .create(descriptionField, {
                        toolbar: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'blockQuote',
                            'undo',
                            'redo'
                        ]
                    })
                    .then(function (editor) {
                        descriptionEditor = editor;
                    })
                    .catch(function (error) {
                        console.error('CKEditor error:', error);
                    });
            }

            form?.addEventListener('submit', function (event) {
                /*
                 * CKEditor का content hidden textarea में डालना जरूरी है।
                 */
                if (descriptionEditor) {
                    const editorContent =
                        descriptionEditor.getData().trim();

                    descriptionField.value = editorContent;

                    /*
                     * Empty CKEditor validation.
                     */
                    if (!editorContent) {
                        event.preventDefault();

                        alert('Full Description is required.');

                        descriptionEditor.editing.view.focus();

                        return;
                    }
                } else {
                    /*
                     * CKEditor load न होने पर normal textarea validation.
                     */
                    if (!descriptionField.value.trim()) {
                        event.preventDefault();

                        alert('Full Description is required.');

                        descriptionField.focus();

                        return;
                    }
                }

                /*
                 * Image create के समय required है।
                 */
                const imageInput =
                    document.getElementById('image');

                const isEdit =
                    {{ $place->exists ? 'true' : 'false' }};

                if (
                    !isEdit &&
                    imageInput &&
                    imageInput.files.length === 0
                ) {
                    event.preventDefault();

                    alert('Place Image is required.');

                    imageInput.focus();

                    return;
                }

                submitButton.disabled = true;
                submitSpinner.classList.remove('hidden');

                submitButtonText.textContent =
                    '{{ $place->exists ? 'Updating...' : 'Saving...' }}';
            });
        });

        function previewSelectedImage(event) {
            const file = event.target.files[0];

            const previewWrapper =
                document.getElementById('imagePreviewWrapper');

            const preview =
                document.getElementById('imagePreview');

            if (!file) {
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                event.target.value = '';

                alert('Only JPG, PNG and WEBP images are allowed.');

                return;
            }

            const maxSize = 5 * 1024 * 1024;

            if (file.size > maxSize) {
                event.target.value = '';

                alert('Image size must not exceed 5 MB.');

                return;
            }

            const reader = new FileReader();

            reader.onload = function (readerEvent) {
                preview.src = readerEvent.target.result;
                previewWrapper.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    </script>
@endpush