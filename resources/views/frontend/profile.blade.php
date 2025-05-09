@extends('component.main')
@section('content')
 
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1a365d',
                            secondary: '#2c5282',
                            accent: '#ecc94b',
                            luxuryPurple: '#1C1444',
                            luxuryGold: '#D4A017',
                            luxuryBrown: '#8B4513',
                            luxuryCream: '#DEB887'
                        },
                        boxShadow: {
                            'luxury': '0 10px 25px -5px rgba(0, 0, 0, 0.2), 0 5px 10px -5px rgba(0, 0, 0, 0.15)',
                            'luxury-lg': '0 20px 40px -10px rgba(0, 0, 0, 0.25)'
                        }
                    }
                }
            }
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

            body {
                font-family: 'Poppins', sans-serif;
            }

            .luxury-font {
                font-family: 'Playfair Display', serif;
            }

            .smooth-transition {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
        </style>
    </head>

    <body class="bg-gray-50">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 bg-luxuryPurple text-white p-4 md:min-h-screen">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-2xl font-bold luxury-font">Krinoscco Stay</h1>
                    <button class="md:hidden text-white" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <nav class="hidden md:block" id="sidebarMenu">
                    <div
                        class="mb-6 p-3 bg-opacity-20 bg-black rounded-lg flex items-center smooth-transition hover:bg-opacity-30">
                        <div class="w-10 h-10 rounded-full bg-luxuryCream flex items-center justify-center mr-3">
                            <span class="text-luxuryPurple font-bold">JD</span>
                        </div>
                        <div>
                            <p class="font-medium">Hello, John Doe</p>
                            <p class="text-xs text-gray-300">Diamond Member</p>
                        </div>
                    </div>

                    <ul class="space-y-2">
                       
                        <li>
                            <a href="#"
                                class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition">
                                <i class="fas fa-calendar-alt mr-2"></i> My Bookings
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block p-3 rounded bg-opacity-20 bg-black smooth-transition">
                                <i class="fas fa-percentage mr-2"></i> Member Benefits
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition">
                                <i class="fas fa-gem mr-2"></i> Loyalty Program
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-3 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-red-200 hover:text-red-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </li>
                    </ul>

                    <div class="mt-8 pt-4 border-t border-gray-600">
                        <h3 class="text-sm uppercase text-gray-400 mb-2">Need Help?</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#"
                                    class="block p-2 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-sm">
                                    <i class="fas fa-question-circle mr-2"></i> Support
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block p-2 rounded hover:bg-opacity-20 hover:bg-black smooth-transition text-sm">
                                    <i class="fas fa-phone-alt mr-2"></i> Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <!-- Header Navigation -->
                {{-- <nav class="hidden md:flex justify-between items-center mb-8">
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-primary smooth-transition">Home</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">About</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Accommodation</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Banquets & Meetings</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Rules & Regulations</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Careers</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Gallery</a></li>
                    <li><a href="#" class="hover:text-primary smooth-transition">Contact Us</a></li>
                </ul>
            </nav> --}}

                <!-- Enhanced Member Benefits Banner -->
                <div
                    class="bg-gradient-to-r from-luxuryPurple via-luxuryBrown to-luxuryGold text-white p-8 rounded-xl mb-8 shadow-lg border border-luxuryCream">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-2xl font-bold mb-3 flex items-center luxury-font">
                                <span class="bg-luxuryCream text-luxuryPurple p-2 rounded-full mr-3">
                                    <i class="fas fa-crown"></i>
                                </span>
                                Exclusive Member Benefits
                            </h2>
                            <p class="text-luxuryCream max-w-lg">As a valued guest, enjoy <span
                                    class="font-bold text-white">15% off</span> your next stay plus <span
                                    class="font-bold text-white">early check-in privileges</span> and <span
                                    class="font-bold text-white">complimentary room upgrade</span> when you book directly
                                with us.</p>
                        </div>
                        <button
                            class="bg-luxuryCream hover:bg-luxuryGold text-luxuryPurple font-bold md:px-8 py-3 rounded-lg shadow-md hover:shadow-xl transition-all transform hover:scale-105 flex items-center smooth-transition">
                            <i class="fas fa-gem md:mr-2 px-4 md:px-0"></i>
                            Join Our Loyalty Program
                        </button>
                    </div>

                    <!-- Additional Benefits Icons -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                        <div
                            class="flex items-center bg-black bg-opacity-20 md:p-3 p-1 rounded-lg smooth-transition hover:bg-opacity-30">
                            <div class="bg-luxuryPurple md:p-3 rounded-full mr-3">
                                <i class="fas fa-clock text-luxuryCream"></i>
                            </div>
                            <span class="text-xs md:text-base">Early Check-In</span>
                        </div>
                        <div
                            class="flex items-center bg-black bg-opacity-20 md:p-3 p-1 rounded-lg smooth-transition hover:bg-opacity-30">
                            <div class="bg-luxuryPurple md:p-3 rounded-full mr-3">
                                <i class="fas fa-wifi text-luxuryCream"></i>
                            </div>
                            <span class="text-xs md:text-base">Free Premium WiFi</span>
                        </div>
                        <div
                            class="flex items-center bg-black bg-opacity-20 md:p-3 p-1 rounded-lg smooth-transition hover:bg-opacity-30">
                            <div class="bg-luxuryPurple md:p-3 rounded-full mr-3">
                                <i class="fas fa-utensils text-luxuryCream"></i>
                            </div>
                            <span class="text-xs md:text-base">Dining Discounts</span>
                        </div>
                        <div
                            class="flex items-center bg-black bg-opacity-20 md:p-3 p-1 rounded-lg smooth-transition hover:bg-opacity-30">
                            <div class="bg-luxuryPurple md:p-3 rounded-full mr-3">
                                <i class="fas fa-spa text-luxuryCream"></i>
                            </div>
                            <span class="text-xs md:text-base">Spa Credits</span>
                        </div>
                    </div>
                </div>

                <!-- Booking Confirmation -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100">
                    {{-- <div class="bg-gradient-to-r from-luxuryPurple to-luxuryBrown text-white p-6">
                    <h2 class="text-2xl font-bold luxury-font">Your Booking is Confirmed!</h2>
                    <p>Thank you for choosing LuxuryStay. Your reservation details are below.</p>
                </div> --}}
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-lg shadow-sm"
                        role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Booking Confirmed!</p>
                                <p class="text-sm">Your reservation at Hotel Krinoscco is confirmed. A confirmation email
                                    has been sent to john@example.com.</p>
                            </div>
                        </div>
                    </div>


                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <!-- Room Details -->
                            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Room Details</h3>
                                <p class="mb-2"><span class="font-semibold">Type:</span> Deluxe Ocean View</p>
                                <p class="mb-2"><span class="font-semibold">Guests:</span> 2 Adults, 1 Child</p>
                                <p class="mb-2"><span class="font-semibold">Price:</span> $499.00 / night</p>
                                <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-lg text-center smooth-transition">
                                    <i class="fas fa-check-circle mr-1"></i> Payment Successful
                                </div>
                            </div>

                            <!-- Stay Information -->
                            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Stay Information</h3>
                                <p class="mb-2"><span class="font-semibold">Check-In:</span> June 20, 2025</p>
                                <p class="mb-2"><span class="font-semibold">Check-Out:</span> June 24, 2025</p>
                                <p class="mb-2"><span class="font-semibold">Nights:</span> 4</p>
                                <p class="mt-3 text-sm text-luxuryBrown"><i class="fas fa-info-circle mr-1"></i> Early
                                    check-in available for members</p>
                            </div>

                            <!-- Guest Information -->
                            <div class="border rounded-xl p-5 smooth-transition hover:shadow-md">
                                <h3 class="font-bold text-lg mb-3 border-b pb-2 luxury-font">Guest Information</h3>
                                <p class="mb-2"><span class="font-semibold">Name:</span> John Doe</p>
                                <p class="mb-2"><span class="font-semibold">Email:</span> john@example.com</p>
                                <p class="mb-2"><span class="font-semibold">Phone:</span> +1 234 567 8900</p>
                                <p class="mt-3 text-sm text-luxuryBrown"><i class="fas fa-star mr-1"></i> Diamond Member
                                    Status</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <button
                                class="bg-gradient-to-r from-luxuryPurple to-luxuryBrown text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all transform hover:scale-105 smooth-transition flex items-center justify-center">
                                <i class="fas fa-eye mr-2"></i> View Booking Details
                            </button>
                            <button
                                class="border border-luxuryBrown text-luxuryBrown px-6 py-3 rounded-lg hover:bg-gray-50 hover:shadow-lg transition-all smooth-transition flex items-center justify-center">
                                <i class="fas fa-download mr-2"></i> Download Invoice
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hotel Information -->
                {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 smooth-transition hover:shadow-lg">
                        <h3 class="font-bold text-lg mb-4 luxury-font">Hotel Krinoscco</h3>
                        <p class="mb-2 flex items-start">
                            <i class="fas fa-map-marker-alt text-luxuryBrown mt-1 mr-2"></i>
                            <span>Hotel Krinoscco, Amariganj Ram Path, Ayodhya U.P., 224001</span>
                        </p>
                        <p class="mb-2 flex items-center">
                            <i class="fas fa-phone-alt text-luxuryBrown mr-2"></i>
                            <span>+91-727502525 ; +91-7275112525</span>
                        </p>
                        <p class="mb-4 flex items-center">
                            <i class="fas fa-envelope text-luxuryBrown mr-2"></i>
                            <span>info@krinoscco.com</span>
                        </p>

                        <h4 class="font-semibold mb-2 luxury-font">Follow us on</h4>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="text-luxuryPurple hover:text-luxuryBrown text-xl smooth-transition"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#"
                                class="text-luxuryPurple hover:text-luxuryBrown text-xl smooth-transition"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#"
                                class="text-luxuryPurple hover:text-luxuryBrown text-xl smooth-transition"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#"
                                class="text-luxuryPurple hover:text-luxuryBrown text-xl smooth-transition"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 smooth-transition hover:shadow-lg">
                        <h3 class="font-bold text-lg mb-4 luxury-font">Useful Links</h3>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Terms and Conditions
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Online Payment Terms
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Limitation of
                                    Liability
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Miscellaneous
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Payment Details
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Cancellation Policy
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-luxuryBrown smooth-transition flex items-center">
                                    <i class="fas fa-chevron-right text-xs text-luxuryBrown mr-2"></i> Hotel Facilities
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 smooth-transition hover:shadow-lg">
                        <h3 class="font-bold text-lg mb-4 luxury-font">Our Location</h3>
                        <div
                            class="bg-gray-100 h-48 rounded-xl flex items-center justify-center text-gray-400 overflow-hidden">
                            <!-- Map placeholder with luxury styling -->
                            <div class="relative w-full h-full">
                                <div class="absolute inset-0 bg-gradient-to-br from-luxuryPurple/10 to-luxuryBrown/10">
                                </div>
                                <i
                                    class="fas fa-map-marked-alt text-4xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-luxuryBrown"></i>
                            </div>
                        </div>
                        <button
                            class="mt-4 w-full bg-luxuryCream hover:bg-luxuryGold text-luxuryPurple font-bold py-2 rounded-lg smooth-transition">
                            <i class="fas fa-directions mr-2"></i> Get Directions
                        </button>
                        <p class="mt-3 text-xs text-gray-500">Map data ©2023 Google</p>
                    </div>
                </div> --}}

{{-- 
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg mb-4 text-gray-800 border-b pb-2">Next Steps</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-2 rounded-full mr-3 mt-1">
                                <i class="fas fa-bell text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Set up reminders</p>
                                <p class="text-sm text-gray-600">Add your stay dates to your calendar</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-2 rounded-full mr-3 mt-1">
                                <i class="fas fa-utensils text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Dining reservations</p>
                                <p class="text-sm text-gray-600">Book a table at our restaurants</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-2 rounded-full mr-3 mt-1">
                                <i class="fas fa-spa text-sm"></i>
                            </div>
                            <div>
                                <p class="font-medium">Spa appointments</p>
                                <p class="text-sm text-gray-600">Schedule your treatments in advance</p>
                            </div>
                        </li>
                    </ul>
                    <div class="pt-4">
                        <button
                            class="w-full border border-luxuryBrown text-luxuryBrown hover:bg-luxuryBrown hover:text-white font-medium py-2 rounded-lg transition-colors">
                            <i class="fas fa-calendar-plus mr-2"></i> Plan Your Stay
                        </button>
                    </div>
                </div> --}}

                <!-- Map -->
                {{-- <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg mb-4 text-gray-800 border-b pb-2">Our Location</h3>
                    <div class="relative h-48 bg-gray-100 rounded-lg overflow-hidden mb-4">
                        <!-- Map placeholder with hotel location -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-luxuryPurple/10 to-luxuryBrown/10 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-4xl text-luxuryBrown"></i>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-white px-2 py-1 rounded text-xs shadow-sm">
                            <i class="fas fa-hotel text-luxuryBrown mr-1"></i> Hotel Krinoscco
                        </div>
                    </div>
                    <button
                        class="w-full bg-luxuryPurple hover:bg-luxuryBrown text-white font-medium py-2 rounded-lg transition-colors">
                        <i class="fas fa-directions mr-2"></i> Get Directions
                    </button>
                </div> --}}
        

        <!-- Help Section -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">
            <h3 class="font-bold text-lg mb-4 text-gray-800 border-b pb-2">Need Help With Your Booking?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">
                        <i class="fas fa-question-circle text-xl"></i>
                    </div>
                    <h4 class="font-medium mb-2">FAQs</h4>
                    <p class="text-sm text-gray-600 mb-3">Find answers to common questions</p>
                    <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">Visit Help Center</a>
                </div>
                <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">
                        <i class="fas fa-phone-alt text-xl"></i>
                    </div>
                    <h4 class="font-medium mb-2">Customer Service</h4>
                    <p class="text-sm text-gray-600 mb-3">Available 24/7 for your convenience</p>
                    <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">+1 (800) 123-4567</a>
                </div>
                <div class="text-center p-4 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="bg-luxuryPurple bg-opacity-10 text-luxuryPurple p-3 rounded-full inline-block mb-3">
                        <i class="fas fa-comments text-xl"></i>
                    </div>
                    <h4 class="font-medium mb-2">Live Chat</h4>
                    <p class="text-sm text-gray-600 mb-3">Chat with our support team</p>
                    <a href="#" class="text-sm text-luxuryBrown font-medium hover:underline">Start Chat</a>
                </div>
            </div>
        </div>
        </main>




        <!-- Footer -->
        {{-- <footer class="text-center text-sm text-gray-600 border-t pt-6">
            <p class="luxury-font text-luxuryPurple">Copyright © 2023 Hotel Krinoscco</p>
            <p class="mt-1">Powered by <span class="text-luxuryBrown">Real Victory Groups</span></p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Privacy Policy</a>
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Terms of Service</a>
                <a href="#" class="text-xs hover:text-luxuryBrown smooth-transition">Accessibility</a>
            </div>
        </footer> --}}
        </main>
        </div>

        <script>
            // Toggle mobile menu
            document.getElementById('menuToggle').addEventListener('click', function() {
                const menu = document.getElementById('sidebarMenu');
                menu.classList.toggle('hidden');

                // Change icon based on state
                const icon = this.querySelector('i');
                if (menu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });

            // Add smooth scrolling to all links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
   </div>
@endsection
