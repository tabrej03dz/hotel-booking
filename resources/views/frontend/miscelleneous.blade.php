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
            Miscelleneous Liability
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
            <h1 class="text-3xl font-bold text-gray-900">Miscellaneous Conditions</h1>
        </div> --}}

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <p>Any waiver of any rights available to M/s. D P R Enterprises under these Terms and Conditions shall not mean that those rights are automatically waived.</p>
            </section>

            <section class="fadeIn">
                <p>The User agrees, understands, and confirms that his/her personal data, including without limitation details relating to debit card/credit card transmitted over the Internet, may be susceptible to misuse, hacking, theft, and/or fraud, and that M/s. DPR Enterprises and the Payment Service Provider(s) have no control over such matters.</p>
            </section>

            <section class="fadeIn">
                <p>Although all reasonable care has been taken towards guarding against unauthorized use of any information transmitted by the User, M/s. DPR Enterprises does not represent or guarantee that the use of the Services provided by/through it will not result in theft and/or unauthorized use of data over the Internet.</p>
            </section>

            <section class="fadeIn">
                <p>M/s. D P R Enterprises, the Payment Service Provider(s), and its affiliates and associates shall not be liable, at any time, for any failure of performance, error, omission, interruption, deletion, defect, delay in operation or transmission, computer virus, communications line failure, theft or destruction, or unauthorized access to, alteration of, or use of information contained on the Website.</p>
            </section>

            <section class="fadeIn">
                <p>The User may be required to create his/her own User ID and Password in order to register and/or use the Services provided by M/s. D P R Enterprises on the Website. By accepting these Terms and Conditions, the User agrees that his/her User ID and Password are important pieces of information, and it shall be the User’s responsibility to keep them secure and confidential. In furtherance hereof, the User agrees to:</p>
                <ul class="list-disc pl-6">
                    <li class="fadeIn">Choose a new password, whenever required for security reasons.</li>
                    <li class="fadeIn">Keep his/her User ID & Password strictly confidential.</li>
                    <li class="fadeIn">Be responsible for any transactions made by User under such User ID and Password.</li>
                </ul>
            </section>

            <section class="fadeIn">
                <p>The User is hereby informed that M/s. D P R Enterprises will never ask the User for the User’s password in an unsolicited phone call or email. The User is hereby required to sign out of his/her M/s. D P R Enterprises account on the Website and close the web browser window when the transaction(s) have been completed. This is to ensure that others cannot access the User’s personal information and correspondence when the User happens to share a computer with someone else or is using a computer in a public place like a library or an internet café.</p>
            </section>

        
        </div>
    </div>

@endsection