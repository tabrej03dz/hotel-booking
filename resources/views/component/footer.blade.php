<style>
    /* Footer specific animations */
    .social-icon {
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-3px);
        filter: brightness(1.2);
    }

    .footer-link {
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .footer-link:hover {
        transform: translateZ(20px);
    }

    .footer-link::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg,
                rgba(255, 187, 36, 0),
                rgba(255, 187, 36, 0.3),
                rgba(255, 187, 36, 0));
        transform: translateZ(-1px);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 4px;
    }

    .footer-link:hover::before {
        opacity: 1;
    }

    .footer-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg,
                transparent,
                #FBBF24,
                transparent);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateX(-50%);
    }

    .footer-link:hover::after {
        width: 100%;
    }


    .footer-link:hover::after {
        width: 100%;
    }

    /* Premium styling for the footer */
    .premium-footer {
        background: linear-gradient(45deg, #1D1D1D, #0D0630);
        color: white;
        border-top: 4px solid burlywood;
    }
</style>

<footer class="premium-footer">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Hotel Info -->
            <div class="space-y-4">
                <img src="{{ asset('asset/images/logo.png') }}" alt="Hotel Krinoscco Logo" class="w-24 h-auto mb-6" />
                <h3 class="text-2xl font-bold text-white mb-6">Hotel Krinoscco</h3>
               <div class="flex items-center space-x-2">
    <a href="https://www.google.com/maps/place/Hotel+Krinoscco/@26.783073,82.165321,16z/data=!4m9!3m8!1s0x399a0796e56fb899:0xffa1558e88f0d349!5m2!4m1!1i2!8m2!3d26.7830727!4d82.1653206!16s%2Fg%2F11ry4tcm_l?hl=en&entry=ttu" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-2 text-sm text-white hover:underline">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>Hotel Krinossco,Rampath, Amaniganj, Ayodhya (U.P.), 224001.
</span>
    </a>
</div>

                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="text-sm">+91-7275002525 ;</span>
                    <span class="text-sm">+91-7275112525</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm">info@krinoscco.com</span>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-white mb-6">Useful Links</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('termandcondition') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Terms and
                            Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('conditons') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">General Terms
                            and Conditions For Online-Payments</a>
                    </li>
                    <li>
                        <a href="{{ route('liability') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Limitation of
                            Liability</a>
                    </li>
                    <li>
                        <a href="{{ route('miscelleneous') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Miscellaneous
                            Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('details') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Debit/Credit
                            Card, Bank Account Details</a>
                    </li>
                    <li>
                        <a href="{{ route('information') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Personal
                            Information</a>
                    </li>
                    <li>
                        <a href="{{ route('policy') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Cancellation
                            Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('crescentfacilities') }}"
                            class="footer-link text-sm hover:text-white transition-colors duration-300">Crescent
                            Facilities</a>
                    </li>
                </ul>
            </div>

            <!-- Map & Location -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-white mb-4 sm:mb-6">Our Location</h3>
                <div class="w-full overflow-hidden rounded-lg shadow-md">
                    <iframe class="w-full h-[300px] sm:h-[400px] lg:h-[450px]"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.786563827908!2d82.162745675435!3d26.78307267672456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a0796e56fb899%3A0xffa1558e88f0d349!2sHotel%20Krinoscco!5e0!3m2!1sen!2sin!4v1739181698814!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>

    <!-- Social Media Section -->
    <div class="text-center py-6">
        <h3 class="text-lg font-semibold text-white mb-4">Follow us on</h3>
        <a href="https://www.facebook.com/people/Hotel-Krinoscco/pfbid0hiL26HVezzPrGJmMjJLMTFgXXtHBuvVWeguLSWsEYvm7akhtkcQHujsUDDDeMVqwl/"
            target="_blank" class="social-icon text-white mx-4 text-2xl">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.instagram.com/hotelkrinoscco/#" target="_blank"
            class="social-icon text-white mx-4 text-2xl">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/@hotelkrinoscco" target="_blank" class="social-icon text-white mx-4 text-2xl">
            <i class="fab fa-youtube"></i>
        </a>
        <a href="https://x.com/i/flow/login?redirect_after_login=%2Fkrinoscco" target="_blank"
            class="social-icon text-white mx-4 text-2xl">
            <i class="fab fa-twitter"></i>
        </a>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-sm text-gray-400">
                    Copyright © 2025 Hotel Krinoscco
                </div>
                <div class="text-sm text-gray-400">
                    Powered by <a href="https://realvictorygroups.com/ " class="text-blue-400 hover:text-blue-300">Real
                        Victory Groups</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Add FontAwesome for the icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
