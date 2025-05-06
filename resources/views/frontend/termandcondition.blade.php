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
        <!-- Title with Enhanced Focus -->
        <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
            Terms and Condition
        </h1>

        <!-- Description Text with Focus -->
        <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
            Discover our story, values, and the unique experiences that make us exceptional. Join us on this exciting
            journey!
        </p>

        <!-- Stylish Divider -->
        <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
    </div>
</div>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .animate__fadeIn {
            animation: fadeIn 2s ease-in-out;
        }
    </style>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-20 mt-4">

       
       
        <!-- Terms Section -->
        <section class="mt-10 bg-white p-6 shadow-lg rounded-lg animate__fadeIn">
            <h2 class="text-2xl font-semibold text-gray-800">Online Payments</h2>
            <p class="text-lg text-gray-600 mt-4">
                The Terms and Conditions contained herein shall apply to any person (“User”) using the services of M/s.D P R
                Enterprises for making hotel bookings and payments through an online payment gateway service (“Service”)
                offered by M/S. D P R Enterprises for our Hotel Krinoscco in association with Punjab National Bank.
            </p>
            <p class="text-lg text-gray-600 mt-2">
                Each User is therefore deemed to have read and accepted these Terms and Conditions.
            </p>
        </section>

        <!-- Privacy Policy Section -->
        <section id="privacy-policy" class="mt-10 bg-white p-6 shadow-lg rounded-lg animate__fadeIn">
            <h2 class="text-2xl font-semibold text-gray-800">A. Privacy Policy</h2>
            <p class="text-lg text-gray-600 mt-4">
                M/s. D P R Enterprises respects and protects the privacy of individuals that access the information and use
                the services provided. Individually identifiable information about the User is not willfully disclosed to
                any third party without first receiving the User’s permission.
            </p>
            <p class="text-lg text-gray-600 mt-2">
                This Privacy Policy describes M/s. D P R Enterprises' treatment of personally identifiable information that
                it collects when a User is on the M/s. D P R Enterprises website.
            </p>
            <p class="text-lg text-gray-600 mt-2">
                Like any business interested in offering the highest quality of service to clients, M/s. D P R Enterprises
                may, from time to time, send emails and other communications to inform users about various services and
                features.
            </p>
        </section>

        <!-- Legal Information Section -->
        <section class="mt-10 bg-white p-6 shadow-lg rounded-lg animate__fadeIn">
            <h2 class="text-2xl font-semibold text-gray-800">Legal Requirements for Disclosure</h2>
            <ul class="list-disc list-inside text-lg text-gray-600 mt-4 space-y-2">
                <li>To comply with any valid legal process such as a search warrant, statute, or court order.</li>
                <li>If any of User’s actions on the website violate the Terms of Service.</li>
                <li>To protect or defend M/s. D P R Enterprises’ legal rights or property.</li>
                <li>To investigate, prevent, or take action regarding illegal activities, suspected fraud, or security
                    threats.</li>
            </ul>
        </section>
    </div>
@endsection
