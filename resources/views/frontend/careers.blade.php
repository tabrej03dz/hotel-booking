@extends('component.main')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <!-- Overlay Background (Optional) -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Glass Effect Content -->
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

        <!-- Content Inside the Hero Section -->
        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
                Join Our Team
            </h1>
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                Explore exciting career opportunities with us and become a part of our innovative and dynamic team.
            </p>
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

    <!-- Career Page Section -->
    {{-- <section class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-[#16213e] text-center mb-12">
                Join Our Team
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>
            <p class="text-lg text-[#16213e] text-center mb-12">
                Be part of a passionate and innovative team. At Hotel Krinoscco, we value creativity, collaboration, and
                commitment to excellence.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Job Position 1 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <h3 class="text-2xl font-bold text-white mb-4">Front Desk Manager</h3>
                    <p class="text-gray-300 mb-6">Deliver exceptional guest service while managing front desk operations
                        seamlessly.</p>
                    <ul class="text-gray-400 mb-6 space-y-2">
                        <li>• Excellent communication skills</li>
                        <li>• Prior experience in hospitality</li>
                        <li>• Flexible working hours</li>
                    </ul>
                    <a href="#apply"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Apply Now
                    </a>
                </div>

                <!-- Job Position 2 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <h3 class="text-2xl font-bold text-white mb-4">Housekeeping Supervisor</h3>
                    <p class="text-gray-300 mb-6">Oversee the housekeeping team to ensure top-notch cleanliness and guest
                        satisfaction.</p>
                    <ul class="text-gray-400 mb-6 space-y-2">
                        <li>• Attention to detail</li>
                        <li>• Leadership qualities</li>
                        <li>• Strong organizational skills</li>
                    </ul>
                    <a href="#apply"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Apply Now
                    </a>
                </div>

                <!-- Job Position 3 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <h3 class="text-2xl font-bold text-white mb-4">Chef de Cuisine</h3>
                    <p class="text-gray-300 mb-6">Lead the culinary team and craft exquisite dishes to delight our guests.
                    </p>
                    <ul class="text-gray-400 mb-6 space-y-2">
                        <li>• Creative and innovative mindset</li>
                        <li>• Expertise in international cuisines</li>
                        <li>• Passion for gastronomy</li>
                    </ul>
                    <a href="#apply"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Why Join Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-12">
                Why Join Us?
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl text-white">
                    <h3 class="text-2xl font-bold mb-4">Professional Growth</h3>
                    <p class="text-gray-300">Access training programs and mentorship to advance your career.</p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl text-white">
                    <h3 class="text-2xl font-bold mb-4">Employee Benefits</h3>
                    <p class="text-gray-300">Enjoy comprehensive benefits, including health insurance and leave policies.
                    </p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl text-white">
                    <h3 class="text-2xl font-bold mb-4">Diverse Workplace</h3>
                    <p class="text-gray-300">Work in an inclusive and diverse environment where everyone belongs.</p>
                </div>

                <!-- Benefit 4 -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl text-white">
                    <h3 class="text-2xl font-bold mb-4">Exciting Challenges</h3>
                    <p class="text-gray-300">Engage in roles that keep you motivated and help shape the future of
                        hospitality.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Process Section -->
    <div class="py-16 px-6 sm:px-8 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-4xl font-semibold mb-12 text-center text-gray-900 tracking-wide">
                How to Apply
            </h2>
            <div class="space-y-8 max-w-4xl mx-auto">
                <div class="flex items-start space-x-4">
                    <div class="bg-[#8B4513] text-white rounded-full h-10 w-10 flex items-center justify-center font-bold">1
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800">Prepare Your Resume</h3>
                        <p class="text-gray-700">Ensure your resume highlights your skills, experience, and achievements
                            relevant to the role.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="bg-[#8B4513] text-white rounded-full h-10 w-10 flex items-center justify-center font-bold">2
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800">Submit Your Application</h3>
                        <p class="text-gray-700">Use our application form or email us at <a
                                href="mailto:careers@krinoscco.com"
                                class="text-[#8B4513] hover:underline">careers@krinoscco.com
                            </a> to apply.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="bg-[#8B4513] text-white rounded-full h-10 w-10 flex items-center justify-center font-bold">3
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800">Interview Process</h3>
                        <p class="text-gray-700">Our team will review your application and schedule interviews to assess
                            your skills and fit for the role.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
