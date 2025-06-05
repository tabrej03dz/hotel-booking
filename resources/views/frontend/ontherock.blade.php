@extends('component.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>
        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
              On The Rock
            </h1>
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                We’d love to hear from you! Reach out to us anytime.
            </p>
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- Packages Section -->
    <div class="container mx-auto py-16 px-6">
        <div class="py-4">
            <h2 class="text-4xl font-bold text-center text-gray-700 mb-4">
                On The Rock
            </h2>
            <span class="block border-b-4 border-gray-700 w-1/6 mx-auto"></span>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                <img src="{{ asset('asset/ballroom/ballroom-1.jpg') }}" class="w-full h-56 object-cover cursor-pointer"
                    onclick="openModal(this)">
                <img src="{{ asset('asset/ballroom/ballroom-2.JPG') }}" class="w-full h-56 object-cover cursor-pointer"
                    onclick="openModal(this)">
                <img src="{{ asset('asset/ballroom/ballroom-3.JPG') }}" class="w-full h-56 object-cover cursor-pointer"
                    onclick="openModal(this)">
                <img src="{{ asset('asset/ballroom/ballroom-4.JPG') }}" class="w-full h-56 object-cover cursor-pointer"
                    onclick="openModal(this)">
                <img src="{{ asset('asset/ballroom/ballroom-5.jpg') }}" class="w-full h-56 object-cover cursor-pointer"
                    onclick="openModal(this)">
            </div>

            <div class="p-6 text-center">
                {{-- <h3 class="text-2xl font-semibold text-gray-800 mb-3">Exclusive Banquet </h3>
                <p class="text-gray-600">Enjoy a premium ballroom experience with elegant decor, lighting, and catering.</p>
                <!-- Optional CTA Section --> --}}
                <div class="my-10 text-center">
                    <a href="{{ route('crescent') }}"
                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105 shadow-2xl hover:shadow-2xl">
                        Discover Our Services
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>


    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-75 z-50">
        <div class="relative">
            <button class="absolute top-2 right-2 text-white text-3xl" onclick="closeModal()">&times;</button>
            <button id="prevBtn" class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white text-3xl"
                onclick="prevImage()">&#10094;</button>
            <img id="modalImage" src="" class="max-w-full max-h-[80vh] rounded-lg shadow-lg">
            <button id="nextBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white text-3xl"
                onclick="nextImage()">&#10095;</button>
        </div>
    </div>



    <!-- JavaScript for Modal -->
    <script>
        let images = document.querySelectorAll('.grid img');
        let modalImage = document.getElementById('modalImage');
        let modal = document.getElementById('imageModal');

        function openModal(imgElement) {
            let index = Array.from(images).indexOf(imgElement);
            modalImage.dataset.index = index;
            modalImage.src = imgElement.src;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        function prevImage() {
            let currentIndex = parseInt(modalImage.dataset.index);
            let newIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            modalImage.src = images[newIndex].src;
            modalImage.dataset.index = newIndex;
        }

        function nextImage() {
            let currentIndex = parseInt(modalImage.dataset.index);
            let newIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            modalImage.src = images[newIndex].src;
            modalImage.dataset.index = newIndex;
        }
    </script>
@endsection
