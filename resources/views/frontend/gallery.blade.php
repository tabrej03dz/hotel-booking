@extends('component.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>
        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
                Digital Art Gallery
            </h1>
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                Explore a collection of stunning digital art pieces. We're thrilled to showcase the creativity and
                imagination of artists.
            </p>
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- Gallery Section -->
    {{-- <section class="py-20 bg-white">
        <div class="container mx-auto px-6 lg:px-10">
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-16 text-center">
                Gallery
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Gallery Grid with all image paths stored as data attributes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8" id="galleryGrid">
                @for ($i = 1; $i <= 50; $i++)
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('asset/gallery/gallery-' . $i . '.jpg') }}"
                            alt="Digital Artwork {{ $i }}"
                            class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                            onclick="openModal('{{ asset('asset/gallery/gallery-' . $i . '.jpg') }}', 'Digital Artwork {{ $i }}', {{ $i }})"
                            loading="lazy" data-index="{{ $i }}"
                            data-src="{{ asset('asset/gallery/gallery-' . $i . '.jpg') }}"
                            onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h3 class="text-white font-medium">Digital Artwork {{ $i }}</h3>
                        </div>
                    </div>
                @endfor
            </div>


        </div>
    </section>

    <!-- Enhanced Image Modal -->
    <div id="imageModal"
        class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50 transition-opacity duration-300 opacity-0">
        <div class="relative max-w-5xl w-full mx-4">
            <!-- Close button -->
            <button onclick="closeModal()"
                class="absolute -top-10 right-0 text-white hover:text-red-400 transition-colors duration-200 focus:outline-none z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Navigation buttons - Fixed positioning and increased visibility -->
            <button id="prevButton"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-80 hover:bg-opacity-100 text-white p-3 rounded-full transition-all duration-200 focus:outline-none z-20 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="nextButton"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-80 hover:bg-opacity-100 text-white p-3 rounded-full transition-all duration-200 focus:outline-none z-20 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Image container with download option -->
            <div class="rounded-lg overflow-hidden shadow-2xl bg-black relative group">
                <img id="modalImage"
                    class="max-w-full max-h-[80vh] mx-auto object-contain transition-transform duration-300"
                    alt="Full-size artwork">

                <!-- Caption and download button -->
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 p-4 flex justify-between items-center">
                    <h3 id="modalCaption" class="text-white font-medium text-lg"></h3>
                    <a id="downloadButton" href="#" download
                        class="text-white hover:text-blue-300 transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span class="hidden sm:inline">Download</span>
                    </a>
                </div>

                <!-- Zoom controls -->
                <div class="absolute top-4 right-4 bg-black bg-opacity-50 rounded-lg p-2 flex space-x-2">
                    <button onclick="zoomIn()"
                        class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m4-3H6" />
                        </svg>
                    </button>
                    <button onclick="zoomOut()"
                        class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7" />
                        </svg>
                    </button>
                    <button onclick="resetZoom()"
                        class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        let totalImages = 50;
        let zoomLevel = 1;
        const zoomStep = 0.25;
        const minZoom = 0.5;
        const maxZoom = 3;
        let imagePaths = [];

        // Initialize modal with keyboard event listeners
        document.addEventListener("DOMContentLoaded", function() {
            // Collect all image paths from the grid
            const imageElements = document.querySelectorAll('#galleryGrid img');

            // Create a map of image indices to their paths
            imageElements.forEach(img => {
                const index = parseInt(img.getAttribute('data-index'));
                const src = img.getAttribute('data-src');
                imagePaths[index] = src;
            });

            // Debug output to console
            console.log("Collected image paths:", imagePaths);

            // Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (!document.getElementById('imageModal').classList.contains('hidden')) {
                    if (e.key === 'Escape') closeModal();
                    if (e.key === 'ArrowRight') navigateImage(1);
                    if (e.key === 'ArrowLeft') navigateImage(-1);
                    if (e.key === '+' || e.key === '=') zoomIn();
                    if (e.key === '-') zoomOut();
                    if (e.key === '0') resetZoom();
                }
            });

            // Add click listeners to modal
            document.getElementById('imageModal').addEventListener('click', function(e) {
                if (e.target === this) closeModal();
            });

            // Add navigation button listeners
            document.getElementById('prevButton').addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent event bubbling
                navigateImage(-1);
            });

            document.getElementById('nextButton').addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent event bubbling
                navigateImage(1);
            });

            console.log("Gallery initialized with " + totalImages + " images");
        });

        function openModal(imageUrl, caption, index) {
            // Set current index
            currentIndex = index || 1;

            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalCaption = document.getElementById('modalCaption');
            const downloadButton = document.getElementById('downloadButton');

            // Reset zoom when opening new image
            resetZoom();

            // Set image and caption
            modalImage.src = imageUrl;
            modalImage.alt = caption || `Digital Artwork ${currentIndex}`;
            modalCaption.textContent = caption || `Digital Artwork ${currentIndex}`;

            // Set download link
            downloadButton.href = imageUrl;
            downloadButton.download = `digital-artwork-${currentIndex}.jpg`;

            // Show modal with animation
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modal.classList.remove('opacity-0');
            }, 10);

            // Prevent scrolling on body
            document.body.style.overflow = 'hidden';

            console.log("Modal opened with image index:", currentIndex);
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');

            // Hide modal with animation
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');

                // Reset zoom when closing
                resetZoom();

                // Re-enable scrolling
                document.body.style.overflow = '';
            }, 300);
        }

        function navigateImage(direction) {
            // Calculate new index with wrapping
            currentIndex = ((currentIndex + direction - 1 + totalImages) % totalImages) + 1;

            console.log("Navigating to image index:", currentIndex);

            // Get image URL from our stored paths array
            const newImageUrl = imagePaths[currentIndex];
            console.log("New image URL:", newImageUrl);

            const newCaption = `Digital Artwork ${currentIndex}`;

            // Update modal content
            document.getElementById('modalImage').src = newImageUrl;
            document.getElementById('modalImage').alt = newCaption;
            document.getElementById('modalCaption').textContent = newCaption;

            // Update download link
            document.getElementById('downloadButton').href = newImageUrl;
            document.getElementById('downloadButton').download = `digital-artwork-${currentIndex}.jpg`;

            // Reset zoom when navigating
            resetZoom();
        }

        function zoomIn() {
            if (zoomLevel < maxZoom) {
                zoomLevel += zoomStep;
                applyZoom();
            }
        }

        function zoomOut() {
            if (zoomLevel > minZoom) {
                zoomLevel -= zoomStep;
                applyZoom();
            }
        }

        function resetZoom() {
            zoomLevel = 1;
            applyZoom();
        }

        function applyZoom() {
            document.getElementById('modalImage').style.transform = `scale(${zoomLevel})`;
        }
    </script> --}}

  

<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-10">
        <h2 class="text-5xl font-bold text-[#1a1a2e] mb-8 text-center">
            Gallery
            <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
        </h2>

        <!-- Filter Tabs -->
        <div class="flex justify-center mb-12">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" 
                    class="filter-btn px-6 py-3 text-sm font-medium rounded-l-lg border border-gray-200 bg-[#1a1a2e] text-white hover:bg-[#2a2a3e] transition-all duration-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                    data-filter="all">
                    All Works
                </button>
                <button type="button" 
                    class="filter-btn px-6 py-3 text-sm font-medium border-t border-b border-gray-200 bg-white text-[#1a1a2e] hover:bg-gray-50 transition-all duration-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                    data-filter="digital-art">
                    Digital Art
                </button>
                <button type="button" 
                    class="filter-btn px-6 py-3 text-sm font-medium border-t border-b border-gray-200 bg-white text-[#1a1a2e] hover:bg-gray-50 transition-all duration-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                    data-filter="terrace">
                    Open Terrace
                </button>
                <button type="button" 
                    class="filter-btn px-6 py-3 text-sm font-medium rounded-r-lg border border-gray-200 bg-white text-[#1a1a2e] hover:bg-gray-50 transition-all duration-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-[#D4A017]"
                    data-filter="gym">
                    Gym
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8" id="galleryGrid">
            <!-- Digital Art Items -->
            <!-- Image 28 displayed in position 1 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="digital-art">
                <img src="{{ asset('asset/gallery/gallery-28.jpg') }}"
                    alt="Digital Artwork 1"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gallery/gallery-28.jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Digital Artwork 1</h3>
                </div>
            </div>

            <!-- All other digital art images except excluded ones -->
            @for ($i = 1; $i <= 50; $i++)
                @if($i != 2 && $i !=  28 && $i != 23 && $i != 24) <!-- Skip original positions of swapped images -->
                    @if(!in_array($i, [5, 7, 12, 15, 19, 22, 25, 30, 33, 37, 40, 45, 48])) <!-- Remove duplicates and rotated versions -->
                        <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="digital-art">
                            <img src="{{ asset('asset/gallery/gallery-' . $i . '.jpg') }}"
                                alt="Digital Artwork {{ $i }}"
                                class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                                loading="lazy" 
                                data-src="{{ asset('asset/gallery/gallery-' . $i . '.jpg') }}"
                                onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h3 class="text-white font-medium">Digital Artwork {{ $i }}</h3>
                            </div>
                        </div>
                    @endif
                @endif
            @endfor

            <!-- Image 2 now at the end position -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="digital-art">
                <img src="{{ asset('asset/gallery/gallery-2.jpg') }}"
                    alt="Digital Artwork 2"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gallery/gallery-2.jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Digital Artwork 2</h3>
                </div>
            </div>

            <!-- Tit Bit Cafe Images -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="terrace">
                <img src="{{ asset('asset/cafe/cafe (1).jpg') }}"
                    alt="Open Terrace 1"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/cafe/cafe (1).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Open Terrace 1</h3>
                </div>
            </div>

            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="terrace">
                <img src="{{ asset('asset/gallery/gallery-51.jpg') }}"
                    alt="Open Terrace 2"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gallery/gallery-51.jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Open Terrace 2</h3>
                </div>
            </div>

            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="terrace">
                <img src="{{ asset('asset/cafe/cafe (5).jpg') }}"
                    alt="Open Terrace 3"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/cafe/cafe (5).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Open Terrace 3</h3>
                </div>
            </div>

            <!-- Gym Images -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="gym">
                <img src="{{ asset('asset/gym/gym (1).jpg') }}"
                    alt="Gym 1"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gym/gym (1).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Gym 1</h3>
                </div>
            </div>

            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="gym">
                <img src="{{ asset('asset/gym/gym (2).jpg') }}"
                    alt="Gym 2"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gym/gym (2).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Gym 2</h3>
                </div>
            </div>

            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="gym">
                <img src="{{ asset('asset/gym/gym (3).jpg') }}"
                    alt="Gym 3"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gym/gym (3).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Gym 3</h3>
                </div>
            </div>

            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-category="gym">
                <img src="{{ asset('asset/gym/gym (4).jpg') }}"
                    alt="Gym 4"
                    class="w-full h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 group-hover:scale-105"
                    loading="lazy" 
                    data-src="{{ asset('asset/gym/gym (4).jpg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('asset/gallery/gallery-16.jpg') }}'">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white font-medium">Gym 4</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Image Modal -->
<div id="imageModal"
    class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50 transition-opacity duration-300 opacity-0">
    <div class="relative max-w-5xl w-full mx-4">
        <!-- Close button -->
        <button onclick="closeModal()"
            class="absolute -top-10 right-0 text-white hover:text-red-400 transition-colors duration-200 focus:outline-none z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Navigation buttons -->
        <button id="prevButton"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-80 hover:bg-opacity-100 text-white p-3 rounded-full transition-all duration-200 focus:outline-none z-20 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button id="nextButton"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-80 hover:bg-opacity-100 text-white p-3 rounded-full transition-all duration-200 focus:outline-none z-20 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Image container with download option -->
        <div class="rounded-lg overflow-hidden shadow-2xl bg-black relative group">
            <img id="modalImage"
                class="max-w-full max-h-[80vh] mx-auto object-contain transition-transform duration-300"
                alt="Full-size artwork">

            <!-- Caption and download button -->
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 p-4 flex justify-between items-center">
                <h3 id="modalCaption" class="text-white font-medium text-lg"></h3>
                <a id="downloadButton" href="#" download
                    class="text-white hover:text-blue-300 transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span class="hidden sm:inline">Download</span>
                </a>
            </div>

            <!-- Zoom controls -->
            <div class="absolute top-4 right-4 bg-black bg-opacity-50 rounded-lg p-2 flex space-x-2">
                <button onclick="zoomIn()"
                    class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m4-3H6" />
                    </svg>
                </button>
                <button onclick="zoomOut()"
                    class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7" />
                    </svg>
                </button>
                <button onclick="resetZoom()"
                    class="text-white hover:text-blue-300 transition-colors duration-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentIndex = 0;
    let zoomLevel = 1;
    const zoomStep = 0.25;
    const minZoom = 0.5;
    const maxZoom = 3;
    let currentFilter = 'all';
    let filteredItems = [];

    // Initialize gallery
    document.addEventListener("DOMContentLoaded", function() {
        // Set up filter buttons
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active button styling
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-[#1a1a2e]', 'text-white', 'hover:bg-[#2a2a3e]');
                    btn.classList.add('bg-white', 'text-[#1a1a2e]', 'hover:bg-gray-50');
                });
                
                this.classList.add('bg-[#1a1a2e]', 'text-white', 'hover:bg-[#2a2a3e]');
                this.classList.remove('bg-white', 'text-[#1a1a2e]', 'hover:bg-gray-50');
                
                // Filter items
                currentFilter = this.dataset.filter;
                filterGalleryItems();
            });
        });

        // Set first button as active
        document.querySelector('.filter-btn[data-filter="all"]').classList.add('bg-[#1a1a2e]', 'text-white', 'hover:bg-[#2a2a3e]');
        document.querySelector('.filter-btn[data-filter="all"]').classList.remove('bg-white', 'text-[#1a1a2e]', 'hover:bg-gray-50');

        // Initialize gallery items
        filterGalleryItems();

        // Add click event listeners to all gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const caption = this.querySelector('h3')?.textContent || img.alt;
                openModal(img.src, caption);
            });
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('imageModal').classList.contains('hidden')) {
                if (e.key === 'Escape') closeModal();
                if (e.key === 'ArrowRight') navigateImage(1);
                if (e.key === 'ArrowLeft') navigateImage(-1);
                if (e.key === '+' || e.key === '=') zoomIn();
                if (e.key === '-') zoomOut();
                if (e.key === '0') resetZoom();
            }
        });

        // Add click listeners to modal
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Add navigation button listeners
        document.getElementById('prevButton').addEventListener('click', function(e) {
            e.stopPropagation();
            navigateImage(-1);
        });

        document.getElementById('nextButton').addEventListener('click', function(e) {
            e.stopPropagation();
            navigateImage(1);
        });
    });

    // Filter gallery items based on current filter
    function filterGalleryItems() {
        const allItems = document.querySelectorAll('.gallery-item');
        
        allItems.forEach(item => {
            item.style.display = 'none';
            
            if (currentFilter === 'all' || item.dataset.category === currentFilter) {
                item.style.display = 'block';
            }
        });
        
        // Update filtered items array for navigation
        filteredItems = Array.from(document.querySelectorAll(`.gallery-item${currentFilter === 'all' ? '' : `[data-category="${currentFilter}"]`}`));
    }

    function openModal(imageUrl, caption) {
        // Reset zoom when opening new image
        resetZoom();

        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        const downloadButton = document.getElementById('downloadButton');

        // Set image and caption
        modalImage.src = imageUrl;
        modalImage.alt = caption;
        modalCaption.textContent = caption;

        // Set download link
        downloadButton.href = imageUrl;
        downloadButton.download = caption.toLowerCase().replace(/\s+/g, '-') + '.jpg';

        // Update current index based on filtered items
        filteredItems = Array.from(document.querySelectorAll(`.gallery-item${currentFilter === 'all' ? '' : `[data-category="${currentFilter}"]`}`));
        currentIndex = filteredItems.findIndex(item => {
            const img = item.querySelector('img');
            return img.src === imageUrl;
        });

        // Show modal with animation
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modal.classList.remove('opacity-0');
        }, 10);

        // Prevent scrolling on body
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');

        // Hide modal with animation
        modal.classList.add('opacity-0');
        modal.classList.remove('opacity-100');

        setTimeout(() => {
            modal.classList.add('hidden');
            // Reset zoom when closing
            resetZoom();
            // Re-enable scrolling
            document.body.style.overflow = '';
        }, 300);
    }

    function navigateImage(direction) {
        // Update current index with wrapping
        currentIndex = (currentIndex + direction + filteredItems.length) % filteredItems.length;
        
        // Get the new image element
        const newItem = filteredItems[currentIndex];
        const newImage = newItem.querySelector('img');
        const newCaption = newItem.querySelector('h3')?.textContent || newImage.alt;

        // Update modal content
        document.getElementById('modalImage').src = newImage.src;
        document.getElementById('modalImage').alt = newCaption;
        document.getElementById('modalCaption').textContent = newCaption;

        // Update download link
        document.getElementById('downloadButton').href = newImage.src;
        document.getElementById('downloadButton').download = newCaption.toLowerCase().replace(/\s+/g, '-') + '.jpg';

        // Reset zoom when navigating
        resetZoom();
    }

    function zoomIn() {
        if (zoomLevel < maxZoom) {
            zoomLevel += zoomStep;
            applyZoom();
        }
    }

    function zoomOut() {
        if (zoomLevel > minZoom) {
            zoomLevel -= zoomStep;
            applyZoom();
        }
    }

    function resetZoom() {
        zoomLevel = 1;
        applyZoom();
    }

    function applyZoom() {
        document.getElementById('modalImage').style.transform = `scale(${zoomLevel})`;
    }
</script>
    
@endsection
