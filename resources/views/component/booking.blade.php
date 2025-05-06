<!-- Include Flatpickr Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    /* Animated Gradient Effect */
    .animated-gradient {
        background: linear-gradient(270deg, #1a1a2e, #16213e, #8B4513);
        background-size: 600% 600%;
        animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<!-- Real-time Availability Section -->
<section id="booking" class="py-12 animated-gradient">
    <div class="container mx-auto px-4">
        <!-- Title Section -->
        <h2 class="text-3xl font-bold text-white mb-8 text-center">
            Book Your Stay
            <div class="w-16 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-2 rounded-full"></div>
        </h2>

        <div class="w-full max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">

            <form action="{{ route('booking.send') }}" method="POST"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @csrf

                <!-- Email / Phone Input -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Your Email or Phone</label>
                    <input type="text" name="contact" id="contact" placeholder="Enter email or phone number"
                        required
                        class="border border-gray-300 rounded-md p-2 bg-white outline-none 
               focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                    <span id="contact-error" class="text-red-500 text-sm hidden">Invalid email or phone number</span>
                </div>

                <!-- Check-in Date Picker -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Check-in</label>
                    <input type="text" id="checkin" name="checkin" placeholder="Select Check-in" required
                        class="border border-gray-300 rounded-md p-2 bg-white outline-none
                               focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                </div>

                <!-- Check-out Date Picker -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Check-out</label>
                    <input type="text" id="checkout" name="checkout" placeholder="Select Check-out" required
                        class="border border-gray-300 rounded-md p-2 bg-white outline-none
                               focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                </div>

                <!-- Adults -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Adults</label>
                    <select id="adults" name="adults" required
                        class="border border-gray-300 rounded-md p-2 bg-white outline-none
                           focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                        <option value="1">1 Adult</option>
                        <option value="2">2 Adults</option>
                        <option value="3">3 Adults</option>
                    </select>
                </div>

                <!-- Children -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Children</label>
                    <select id="children" name="children" required
                        class="border border-gray-300 rounded-md p-2 bg-white outline-none
                           focus:border-[#8B4513] focus:ring-2 focus:ring-[#8B4513]">
                        <option value="0">No Children</option>
                        <option value="1">1 Child</option>
                        <option value="2">2 Children</option>
                    </select>
                </div>

                <!-- Rooms -->
                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Rooms</label>
                    <div
                        class="flex items-center justify-between border border-gray-300 rounded-lg px-2 py-1 bg-white shadow-sm">
                        <button type="button" id="decrease"
                            class="p-1 px-4 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition disabled:opacity-50"
                            disabled>
                            -
                        </button>
                        <input type="text" id="roomCount" name="rooms" value="1"
                            class="w-8 text-center border-none outline-none bg-transparent font-semibold text-base"
                            readonly>
                        <button type="button" id="increase"
                            class="p-1 px-4 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition">
                            +
                        </button>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="col-span-1 sm:col-span-2 md:col-span-3 flex justify-center">
                    <button type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-md transition 
                            hover:from-[#D4A017] hover:to-[#8B4513]">
                        Book Now
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>

<!-- Flatpickr Script -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Check-in Picker
        flatpickr("#checkin", {
            dateFormat: "Y-m-d",
            minDate: "today", // Prevent past dates
            onChange: function(selectedDates, dateStr, instance) {
                // Set check-out date to at least 1 day after check-in
                checkoutPicker.set("minDate", dateStr);
            }
        });

        // Initialize Check-out Picker (starts with today, but will update dynamically)
        const checkoutPicker = flatpickr("#checkout", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const adultsDropdown = document.getElementById("adults");
        const childrenDropdown = document.getElementById("children");

        function updateChildrenOptions() {
            let adults = parseInt(adultsDropdown.value, 10);

            if (adults === 3) {
                // If 3 adults are selected, disable children dropdown and set it to 0
                childrenDropdown.value = "0";
                childrenDropdown.disabled = true;
            } else if (adults === 2) {
                // If 2 adults are selected, allow 1 or 2 children
                childrenDropdown.innerHTML = `
                    <option value="0">No Children</option>
                    <option value="1">1 Child</option>
                    <option value="2">2 Children</option>
                `;
                childrenDropdown.disabled = false;
            } else {
                // If 1 adult is selected, allow all options
                childrenDropdown.innerHTML = `
                    <option value="0">No Children</option>
                    <option value="1">1 Child</option>
                    <option value="2">2 Children</option>
                `;
                childrenDropdown.disabled = false;
            }
        }

        // Add event listener to Adults dropdown
        adultsDropdown.addEventListener("change", updateChildrenOptions);

        // Initialize on page load
        updateChildrenOptions();
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const roomInput = document.getElementById("roomCount");
        const increaseBtn = document.getElementById("increase");
        const decreaseBtn = document.getElementById("decrease");
        const maxRooms = 60; // Maximum limit

        function updateButtons() {
            let value = parseInt(roomInput.value, 10);
            decreaseBtn.disabled = value <= 1;
            increaseBtn.disabled = value >= maxRooms;
        }

        increaseBtn.addEventListener("click", function() {
            let value = parseInt(roomInput.value, 10);
            if (value < maxRooms) {
                roomInput.value = value + 1;
            }
            updateButtons();
        });

        decreaseBtn.addEventListener("click", function() {
            let value = parseInt(roomInput.value, 10);
            if (value > 1) {
                roomInput.value = value - 1;
            }
            updateButtons();
        });

        // Ensure input doesn't exceed the limit manually
        roomInput.addEventListener("input", function() {
            let value = parseInt(roomInput.value, 10) || 1;
            if (value > maxRooms) {
                roomInput.value = maxRooms;
            } else if (value < 1) {
                roomInput.value = 1;
            }
            updateButtons();
        });

        updateButtons();
    });
</script>
