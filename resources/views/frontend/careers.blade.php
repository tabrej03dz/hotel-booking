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




    <!-- Career Openings Section -->
    <!-- Career Openings Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-[#1a1a2e] mb-12">
                Current Openings
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            @if ($careers->count())
                <div class="space-y-10">
                    @foreach ($careers as $job)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                            <div class="md:flex">
                                <!-- Image Section -->
                                <div class="md:w-1/3 w-full h-64 md:h-auto">
                                    @if ($job->image)
                                        <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->title }}"
                                            class="object-cover w-full h-full">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-r from-[#8B4513] to-[#D4A017] flex items-center justify-center text-white text-2xl font-semibold">
                                            No Image
                                        </div>
                                    @endif
                                </div>

                                <!-- Details Section -->
                                <div class="md:w-2/3 w-full p-6">
                                    <h3 class="text-2xl font-bold text-[#1a1a2e] mb-3">{{ $job->title }}</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700 mb-4">
                                        <p><strong>Company:</strong> {{ $job->company_name }}</p>
                                        <p><strong>Location:</strong> {{ $job->location }}</p>
                                        <p><strong>Type:</strong> {{ $job->type }}</p>
                                        <p><strong>Experience:</strong> {{ $job->experience ?? 'Not Specified' }}</p>
                                        <p><strong>Qualification:</strong> {{ $job->qualification ?? 'Not Specified' }}</p>
                                        <p><strong>Salary:</strong> ₹{{ $job->salary ?? 'Negotiable' }}</p>
                                        <p><strong>Last Date to Apply:</strong>
                                            {{ $job->last_date_to_apply ? \Carbon\Carbon::parse($job->last_date_to_apply)->format('d M Y') : 'Open Until Filled' }}
                                        </p>
                                        <p><strong>Status:</strong>
                                            <span
                                                class="inline-block px-2 py-1 text-xs rounded-full {{ $job->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="text-gray-800 mb-4 text-sm">
                                        {!! nl2br(e($job->description)) !!}
                                    </div>


                                    <div class=" w-full flex flex-wrap gap-12 mt-4">
                                        <!-- Call Button -->
                                        <a href="tel:+917275112525"
                                            class="flex items-center gap-2 px-6 py-2 bg-[#8B4513] hover:bg-[#A0522D] text-white font-semibold rounded-md transition">
                                            <span class="material-icons">call</span>
                                            Call Now
                                        </a>

                                        <!-- WhatsApp Button -->
                                        <a href="https://wa.me/917275112525" target="_blank"
                                            class="flex items-center gap-2 px-6 py-2 bg-[#8B4513] hover:bg-[#A0522D] text-white font-semibold rounded-md transition">
                                            <span class="material-icons">chat</span>
                                            WhatsApp
                                        </a>

                                        <!-- Email Button -->
                                        <a href="mailto:info@krinoscco.com"
                                            class="flex items-center gap-2 px-6 py-2 bg-[#8B4513] hover:bg-[#A0522D] text-white font-semibold rounded-md transition">
                                            <span class="material-icons">email</span>
                                            Email
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 text-lg">No job openings available at the moment. Please check back
                    later.</p>
            @endif
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
                                href="mailto:careers@krinoscco.com" class="text-[#8B4513] hover:underline">hr@krinoscco.com
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
