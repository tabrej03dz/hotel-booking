<!-- Disclaimer Button (Fixed on the left) -->
<div class="fixed top-1/2 left-0 z-50 -translate-y-1/2">
    <div onclick="toggleDisclaimer()"
        class="rotate-[-90deg] origin-top-left bg-red-600 text-white font-bold px-4 py-2 text-sm cursor-pointer shadow-lg rounded-t-lg">
        Disclaimer
    </div>
</div>

<!-- Disclaimer Modal (Initially Hidden) -->
<div id="disclaimerModal" class="fixed inset-0 z-50 bg-black bg-opacity-60 flex items-center justify-center hidden">
    <div class="bg-white max-w-3xl w-full p-8 rounded-xl shadow-2xl relative border-t-4 border-[#8B4513]">

        <!-- Close Button -->
        <button onclick="toggleDisclaimer()"
            class="absolute top-3 right-3 text-gray-600 hover:text-red-600 text-2xl font-bold transition">
            &times;
        </button>

        <!-- Disclaimer Content -->
        <h2 class="text-3xl font-bold text-center mb-6 text-[#8B4513]">
            Disclaimer – Hotel Krinoscco
        </h2>

        <div class="space-y-4 text-gray-800 leading-relaxed max-h-[60vh] overflow-y-auto pr-2">
            <p>We, at <strong>Hotel Krinoscco</strong>, value the trust and safety of our guests. It has come to our
                attention that there are fake websites and fraudulent entities impersonating our brand and misleading
                our valued customers. To ensure a secure and authentic experience, we urge you to take note of the
                following:</p>

            <p><strong>Official Domain:</strong> Our official website is
                <a href="https://www.krinoscco.com" class="text-[#8B4513] underline font-medium"
                    target="_blank">www.krinoscco.com</a>.
                Please verify the URL in your browser’s address bar before proceeding with any bookings or transactions.
                Any other website claiming to represent Hotel Krinoscco is not affiliated with us and could potentially
                be a scam.
            </p>

            <p><strong>Secure Payments:</strong> All payments and bookings should be made exclusively through our
                official website. Hotel Krinoscco is not responsible for any transactions made on external websites or
                platforms.</p>

            <p><strong>Verification:</strong> If you come across any website or offer that seems suspicious or too good
                to be true,
                please do not hesitate to contact us directly at
                <a href="tel:+917275002525" class="text-[#8B4513] underline font-medium">+91 7275002525</a> for
                verification.
            </p>

            <p><strong>Reporting Fake Websites:</strong> If you encounter any fake websites or fraudulent activities,
                please report them to the concerned authorities at
                <a href="https://cybercrime.gov.in" class="text-[#8B4513] underline font-medium" target="_blank">Cyber
                    Crime Portal – cybercrime.gov.in</a>
                & to us at
                <a href="mailto:info@krinoscco.com" class="text-[#8B4513] underline font-medium">info@krinoscco.com</a>
                &
                <a href="tel:+917275002525" class="text-[#8B4513] underline font-medium">+91 7275002525</a>
                immediately. Your vigilance helps us protect our community from scams.
            </p>

            <p><strong>Privacy Policy:</strong> We are committed to protecting your personal information. Please refer
                to our policy on
                <em>“General Terms & Conditions For Online Payments”</em> &
                <em>“Personal Information”</em> for details on how we collect, use, and safeguard your data.
            </p>

            <p>By using our official website, you agree to the terms and conditions outlined in this disclaimer.
                Hotel Krinoscco reserves the right to take legal action against any individual or entity engaging in
                fraudulent activities or misrepresenting our brand.
            </p>

            <p class="font-medium">Thank you for choosing Hotel Krinoscco. We look forward to providing you with a safe
                and memorable hospitality experience.</p>
        </div>
    </div>
</div>

<!-- JavaScript to Toggle Disclaimer Modal -->
<script>
    function toggleDisclaimer() {
        const modal = document.getElementById('disclaimerModal');
        modal.classList.toggle('hidden');
    }
</script>
