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
           Cancellation Policy
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

    <div class="max-w-4xl mx-auto py-8 px-4 mt-6 shadow-md mb-4">
        <!-- Cancellation Policy Section -->
        {{-- <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Cancellation Policy</h1>
            <p class="text-lg text-gray-600 mt-2">Thank you for choosing Hotel Krinoscco. Please read our cancellation policy carefully before making a reservation.</p>
        </div> --}}

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Reservation Confirmation</h2>
                <p>Once you make a reservation with Hotel Krinoscco, it is considered a confirmed booking. By confirming your reservation, you acknowledge and agree to the terms and conditions outlined in this no-refund policy.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Non-Refundable Bookings</h2>
                <p>All bookings made through our website are non-refundable. This means that once the reservation is made and the payment is processed, no refunds will be issued for any reason, including but not limited to changes in travel plans, cancellations, or early departures.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Modification Policy</h2>
                <p>In case you need to modify your reservation, we will do our best to accommodate your request, subject to availability. However, any modifications made to the booking, such as changes in dates, room type, or duration of stay, may be subject to additional charges. These charges will be communicated to you at the time of the modification.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Force Majeure</h2>
                <p>Hotel Krinoscco shall not be held responsible for any failure to provide accommodation or any other services due to events beyond our control, including but not limited to natural disasters, acts of government, labor disputes, or any other event that disrupts normal hotel operations. In such cases, no refunds or compensation will be provided.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">No-Show Policy</h2>
                <p>In the event of a no-show (failure to check-in on the reserved date without prior notice), the deposit will be charged, and no refunds will be given.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Incidentals and Damages</h2>
                <p>Guests are responsible for any additional charges incurred during their stay, such as room service, minibar usage, or damages to the hotel property. These charges will be billed to the guest’s credit card on file. Any damages caused by the guest will be assessed and charged accordingly.</p>
            </section>

            <section class="fadeIn">
                <h2 class="text-xl font-semibold text-gray-900">Discretionary Refunds</h2>
                <p>While our policy states that no refunds will be issued, Hotel Krinoscco reserves the right to make exceptions or provide discretionary refunds in exceptional cases, solely at our discretion.</p>
            </section>

            <section class="fadeIn">
                <p>By proceeding with your reservation, you acknowledge that you have read, understood, and agreed to the terms and conditions outlined in this no-refund policy.</p>
            </section>

            <section class="fadeIn">
                <p>If you have any questions or require further clarification, please contact our customer service team before making your reservation.</p>
            </section>

            <section class="fadeIn text-center">
                <p class="text-lg text-gray-600 mt-4">Thank you for choosing Hotel Krinoscco. We look forward to hosting you and providing you with a memorable stay.</p>
            </section>
        </div>
    </div>


@endsection