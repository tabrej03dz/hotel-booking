@extends('component.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
                Contact Us
            </h1>
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                We’d love to hear from you! Reach out to us anytime.
            </p>
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="bg-gray-100 py-16 relative">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#D4A017]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900">Contact Us</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-gray-600">
                    Get in touch with us for any inquiries or assistance.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <!-- Registered Address -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">home</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Registered Address</h4>
                            <p class="text-gray-600">
                                309, Amaniganj, Faizabad, Uttar Pradesh, 224001
                            </p>
                        </div>
                    </div>

                    <!-- Functional Office -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">apartment</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Functional Office</h4>
                            <p class="text-gray-600">
                                Hotel Krinoscco, Amaniganj Ram Path, Ayodhya, Uttar Pradesh, 224001
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">email</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Email Address</h4>
                            <p class="text-gray-600">info@krinoscco.com</p>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">phone</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Contact Number</h4>
                            <p class="text-gray-600">+91-7275002525</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <form action="{{route('contact.save')}}" method="POST"
                    class="space-y-6 bg-white p-8 rounded-xl shadow-lg transition-transform duration-700 hover:shadow-2xl hover:-translate-y-2">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required value="{{old('name')}}"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]">
                    
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required value="{{old('email')}}"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]">
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Your Mobile Number</label>
                        <input type="tel" name="phone" id="phone" required value="{{old('phone')}}"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]"
                            placeholder="+91">
                            @error('phone')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required 
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]">{{old('name')}}</textarea>
                            @error('message')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white font-medium py-3 rounded-lg shadow-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[#D4A017]">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Google Map -->
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-6">Find Us on the Map</h3>
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.786563827908!2d82.162745675435!3d26.78307267672456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a0796e56fb899%3A0xffa1558e88f0d349!2sHotel%20Krinoscco!5e0!3m2!1sen!2sin!4v1739181698814!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
