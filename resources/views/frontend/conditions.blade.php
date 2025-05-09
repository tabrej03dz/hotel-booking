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
                General Terms and Conditions For Online-Payments
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

    <div class="max-w-4xl mx-auto py-8 px-4 mt-4 shadow-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">General Terms and Conditions For Online Payments</h1>
        </div>

        <div class="space-y-6 text-gray-700">
            <section class="fadeIn">
                <p>Once a User has accepted these Terms and Conditions, he/she may register and avail the Services.</p>
                <p>User may either register M/s. D P R Enterprises website or alternatively enter [his/her consumer number
                    and billing unit number and pay their hotel bills/dues/bill(s)] or please change this clause as per the
                    Type of payment associated with this client in any other manner as may be specified M/S D P R
                    Enterprises from time to time.</p>
            </section>

            <section class="fadeIn">
                <p>M/s. D P R Enterprises rights, obligations, and undertakings shall be subject to the laws in force in
                    India, as well as any directives/procedures of the Government of India, and nothing contained in these
                    Terms and Conditions shall be in derogation of M/S. D P R Enterprises right to comply with any law
                    enforcement agencies' request or requirements relating to any User’s use of the website or information
                    provided to or gathered by M/s. D P R Enterprises with respect to such use.</p>
            </section>

            <section class="fadeIn">
                <p>If any part of these Terms and Conditions are determined to be invalid or unenforceable pursuant to
                    applicable law, the invalid or unenforceable provision will be superseded by a valid, enforceable
                    provision that most closely matches the intent of the original provision, and the remainder of these
                    Terms and Conditions shall continue in effect.</p>
            </section>

            <section class="fadeIn">
                <p>These Terms and Conditions constitute the entire agreement between the User and M/s. D P R Enterprises.
                    These Terms and Conditions supersede all prior or contemporaneous communications and proposals, whether
                    electronic, oral, or written, between the User and M/s. D P R Enterprises.</p>
            </section>

            <section class="fadeIn">
                <p class="font-semibold text-lg">Refund for Charge Back Transaction:</p>
                <p>In the event of a claim for charge back by the User for any reason whatsoever, such User shall
                    immediately approach M/s. D P R Enterprises for claim details. Refund (if any) shall only be effected
                    via payment gateway or other means as M/s. D P R Enterprises deems appropriate.</p>
            </section>

            <section class="fadeIn">
                <p class="font-semibold text-lg">Refund for fraudulent/duplicate transaction(s):</p>
                <p>The User shall directly contact M/s. D P R Enterprises for any fraudulent transaction(s) and such issues
                    shall be suitably addressed by M/s. D P R Enterprises alone in line with their policies and rules.</p>
            </section>

            <section class="fadeIn">
                <p class="font-semibold text-lg">Server Slow Down/Session Timeout:</p>
                <p>In case the website or payment provider’s page experiences any server issues, the User should check if
                    their bank account has been debited and then take the appropriate action to confirm or retry the
                    payment.</p>
            </section>


        </div>
    </div>
@endsection
