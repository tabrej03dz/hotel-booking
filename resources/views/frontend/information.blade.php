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
            Personal Information
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
        /* Fade-in animation */
        .fadeIn {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <!-- Personal Information Section -->
        {{-- <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Personal Information</h1>
        </div> --}}

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <p>The User agrees that, to the extent required or permitted by law, M/s D P R Enterprises and/or the Payment Service Provider(s) may collect, use, and disclose personal information in connection with security-related or law enforcement investigations or in the course of cooperating with authorities or complying with legal requirements.</p>
            </section>

            <section class="fadeIn">
                <p>The User agrees that any communication sent by the User via email shall imply the release of information therein to M/s D P R Enterprises. The User agrees to be contacted via email on such mails initiated by him/her.</p>
            </section>

            <section class="fadeIn">
                <p>In addition to the information already in the possession of M/s D P R Enterprises and/or the Payment Service Provider(s), M/s D P R Enterprises may have collected similar information from the User in the past. By entering the Website, the User consents to the terms of M/s D P R Enterprises' information privacy policy and to M/s D P R Enterprises' continued use of previously collected information. By submitting the User’s personal information to M/s D P R Enterprises, the User is treated as having given permission for the processing of the User’s personal data as set out herein.</p>
            </section>

            <section class="fadeIn">
                <p>The User acknowledges and agrees that his/her information will be managed in accordance with the laws currently in force.</p>
            </section>

            <!-- Payment Gateway Disclaimer Section -->
            <div class="text-center mt-8">
                <h1 class="text-3xl font-bold text-gray-900">Payment Gateway Disclaimer</h1>
            </div>

            <section class="fadeIn">
                <p>The Service is provided to facilitate access to view and pay Hotel Booking and allied services online. M/s D P R Enterprises or the Payment Service Provider(s) do not make any representations of any kind, express or implied, regarding the operation of the Payment Gateway, other than what is specified on the Website for this purpose.</p>
            </section>

            <section class="fadeIn">
                <p>By accepting/agreeing to these Terms and Conditions, the User expressly agrees that their use of the aforesaid online payment service is entirely at their own risk and responsibility.</p>
            </section>

        </div>
    </div>


@endsection