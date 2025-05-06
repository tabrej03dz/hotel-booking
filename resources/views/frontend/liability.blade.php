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
            Limitation of Liability
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
        /* Animation for section transitions */
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

        /* Hover effect on text */
        .hover:text-blue-500:hover {
            color: #3B82F6;
        }
    </style>


    <div class="max-w-4xl mx-auto py-8 px-4 mt-6 shadow-md">
        {{-- <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Limitation of Liability</h1>
        </div> --}}

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <p>M/s. D P R Enterprises has made this Service available to the User as a matter of convenience. M/s. DPR Enterprises Resorts expressly disclaims any claim or liability arising out of the provision of this Service. The User agrees and acknowledges that he/she shall be solely responsible for his/her conduct and that M/s. D P R Enterprises reserves the right to terminate the rights to use of the Service immediately without giving any prior notice thereof.</p>
            </section>

            <section class="fadeIn">
                <p>M/s. D P R Enterprises and/or the Payment Service Providers shall not be liable for any inaccuracy, error, or delay in, or omission of (a) any data, information or message, or (b) the transmission or delivery of any such data, information or message; or (c) any loss or damage arising from or occasioned by any such inaccuracy, error, delay or omission, non-performance or interruption in any such data, information or message.</p>
            </section>

            <section class="fadeIn">
                <p>Under no circumstances shall M/s. D P R Enterprises and/or the Payment Service Providers, its employees, directors, and its third-party agents involved in processing, delivering or managing the Services, be liable for any direct, indirect, incidental, special or consequential damages, or any damages whatsoever, including punitive or exemplary arising out of or in any way connected with the provision of or any inadequacy or deficiency in the provision of the Services or resulting from unauthorized access or alteration of transmissions of data or arising from suspension or termination of the services.</p>
            </section>

            <section class="fadeIn">
                <p>M/s. DPR Enterprises and the Payment Service Provider(s) assume no liability whatsoever for any monetary or other damage suffered by the User on account of:</p>
                <ul class="list-disc pl-6">
                    <li class="fadeIn">The delay, failure, interruption, or corruption of any data or other information transmitted in connection with use of the Payment Gateway or Services in connection thereto; and/or</li>
                    <li class="fadeIn">Any interruption or errors in the operation of the Payment Gateway.</li>
                </ul>
            </section>

            <section class="fadeIn">
                <p class="font-semibold text-lg">Indemnification:</p>
                <p>The User shall indemnify and hold harmless the Payment Service Provider(s), M/s. DPR Enterprises, and their respective officers, directors, agents, and employees, from any claim or demand, or actions arising out of or in connection with the utilization of the Services.</p>
            </section>

            <section class="fadeIn">
                <p>The User agrees that M/s. DPR Enterprises or any of its employees will not be held liable by the User for any loss or damages arising from your use of, or reliance upon the information contained on the Website, or any failure to comply with these Terms and Conditions where such failure is due to circumstances beyond M/s. D P R Enterprises reasonable control.</p>
            </section>

        </div>
    </div>


@endsection