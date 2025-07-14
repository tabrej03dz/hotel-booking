@extends('component.main')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

    <div class="relative container mx-auto text-center z-10">
        <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
            About Us
        </h1>
        <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
            Discover our story, values, and the unique experiences that make us exceptional. Join us on this exciting journey!
        </p>
        <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
    </div>
</div>

<!-- About Section -->
<section class="relative py-20 lg:py-32 overflow-hidden bg-gradient-to-b from-white to-gray-50">
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#8B4513] opacity-5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#1a1a2e] opacity-5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight text-center mb-8">
        Welcome to <span class="text-[#8B4513]">Hotel Krinoscco</span>
    </h1>

    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16 relative">
            <!-- Image Section -->
            <div class="w-full lg:w-1/2 space-y-6 group">
                <div class="relative overflow-hidden rounded-2xl shadow-xl transform transition-transform duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e]/20 to-transparent z-10"></div>
                    <img id="main-image" src="{{ asset('asset/images/d11.jpg') }}" alt="Hotel Krinoscco Main"
                        class="w-full h-[500px] object-cover transform transition-transform duration-700 hover:scale-110" />
                    <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg z-20">
                        <span class="text-[#1a1a2e] font-semibold">Est. 2021</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    @foreach (['d11.jpg', 's10.jpg', 's8.jpg'] as $image)
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/' . $image) }}" alt="Hotel Detail"
                                class="w-full h-24 object-cover cursor-pointer transition-transform duration-500 hover:scale-110"
                                onclick="changeMainImage(this)" />
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Content Section -->
            <div class="w-full lg:w-1/2 space-y-8">
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-[2px] bg-[#8B4513]"></div>
                        <span class="text-[#8B4513] font-semibold uppercase tracking-wider">About Us</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-[#1a1a2e] leading-tight">
                        D P R ENTERPRISES
                    </h2>
                </div>

                <p class="text-lg text-gray-700 leading-relaxed">
                    
                    The 60-room hotel, with its Roman-styled facade, is located on the famous Hotel Krinoscco Amaniganj Rampath ayodhya 224001
                    , the main thoroughfare of Ayodhya leading directly to the world-famous Ram Janmabhoomi.
                    <br><br>
                    Hotel Krinoscco at Ayodhya takes the hospitality concept to a new level with international standards of service and style. It sets a new standard for great accommodation and added values, offering “High tech” amenities with “high touch” levels of service unmatched in Ayodhya.
                    <br><br>
                    In the heart of Ayodhya, 15 minutes by taxi from Ayodhya Cantt. & Ayodhya railway stations as well as the Ayodhya airport & two hours by road from the Lucknow airport.
                </p>

                <!-- Features Section -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-[#8B4513] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#1a1a2e]">Prime Location</h4>
                            <p class="text-sm text-gray-600">Heart of Ayodhya</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                            <i class="fas fa-clock text-[#8B4513] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#1a1a2e]">Quick Access</h4>
                            <p class="text-sm text-gray-600">15min from stations</p>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex items-center gap-6 pt-4">
                    <a href="{{ route('gallery') }}"
                        class="group relative px-8 py-4 bg-[#8B4513] text-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="absolute inset-0 bg-[#6B3410] transform translate-y-full transition-transform duration-300 group-hover:translate-y-0"></div>
                        <span class="relative z-10 font-semibold">Discover More</span>
                    </a>

                    <a href="{{ route('gallery') }}"
                        class="group flex items-center gap-3 text-[#1a1a2e] font-semibold hover:text-[#8B4513] transition-colors duration-300">
                        <span>View Gallery</span>
                        <i class="fas fa-arrow-right transform transition-transform duration-300 group-hover:translate-x-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function changeMainImage(element) {
        document.getElementById("main-image").src = element.src;
    }
</script>
@endsection
