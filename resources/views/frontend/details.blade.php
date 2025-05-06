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
           Credit/Debit Card, Bank Account Details
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
    </style>

    <div class="max-w-4xl mx-auto py-8 px-4 mt-6 shadow-md">
        {{-- <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Debit/Credit Card, Bank Account Details</h1>
        </div> --}}

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <p>The User agrees that the debit/credit card details provided by him/her for use of the aforesaid Service(s) must be correct and accurate. The User shall not use a debit/credit card that is not lawfully owned by him/her or the use of which is not authorized by the lawful owner thereof. The User further agrees and undertakes to provide correct and valid debit/credit card details.</p>
            </section>

            <section class="fadeIn">
                <p>The User may pay his/her hotel rent, food expenditure, or other services to M/s. D P R Enterprises by using a debit/credit card or through an online banking account. The User warrants, agrees, and confirms that when he/she initiates a payment transaction and/or issues an online payment instruction and provides his/her card/bank details:</p>
                <ul class="list-disc pl-6">
                    <li class="fadeIn">The User is fully and lawfully entitled to use such credit/debit card or bank account for such transactions;</li>
                    <li class="fadeIn">The User is responsible to ensure that the card/bank account details provided are accurate;</li>
                    <li class="fadeIn">The User is authorizing the debit of the nominated card/bank account for the payment of hotel booking and allied services selected by the User, along with any applicable fees.</li>
                </ul>
            </section>

            <section class="fadeIn">
                <p>The User is responsible to ensure that sufficient credit is available on the nominated card/bank account at the time of making the payment to permit the payment of the dues payable or the bill(s) selected by the User, inclusive of the applicable fee.</p>
            </section>

          
        </div>
    </div>



@endsection