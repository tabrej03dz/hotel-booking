<!-- Booking Form -->
<div class="container mx-auto py-16 px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
        Book Your Package
    </h2>

    <form action="{{route('package-booking.store')}}" method="POST" class="w-full max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg border">
        @csrf

        <div class="mb-4">
            <label for="full_name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
            <input type="text" id="full_name" name="full_name" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
            <input type="text" id="phone" name="phone" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all">
        </div>

        <div class="mb-4">
            <label for="package_name" class="block text-gray-700 font-semibold mb-2">Select Package</label>
            <select id="package_name" name="package_name" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all">
                <option value="Basic Package">Basic Package</option>
                <option value="Premium Package">Premium Package</option>
                <option value="Luxury Package">Luxury Package</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="preferred_date" class="block text-gray-700 font-semibold mb-2">Preferred Date</label>
            <input type="date" id="preferred_date" name="preferred_date" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all">
        </div>

        <div class="mb-6">
            <label for="additional_message" class="block text-gray-700 font-semibold mb-2">Additional Message</label>
            <textarea id="additional_message" name="additional_message" rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8B4513] hover:border-[#8B4513] transition-all"></textarea>
        </div>

        <button type="submit"
                class="w-full bg-[#8B4513] text-white py-3 rounded-lg hover:bg-gray-900 hover:scale-105 transition-all">
            Submit Booking
        </button>
    </form>
</div>
