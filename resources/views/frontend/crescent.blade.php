@extends('component.main')
@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative container mx-auto text-center z-10">
            <h1 class="text-5xl font-extrabold uppercase drop-shadow-md mb-2">Hotel Krinoscco</h1>
            <p class="text-lg font-medium text-[#ecf0f1]">Amaniganj, Ayodhya</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-6xl mx-auto px-6 py-10 text-gray-800 space-y-10">
        <!-- Overview -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Overview</h2>
            <p class="leading-relaxed">
                The 60-room hotel, with its Roman styled facade, is located on the famous Rampath at Amaniganj — the main
                thoroughfare of Ayodhya leading directly to the world-famous Ram Janmabhoomi.
            </p>
            <p class="mt-2">
                Hotel Krinoscco takes the hospitality concept to a new level with international standard service and style.
                It offers high-tech amenities with high-touch levels of service unmatched in Ayodhya.
            </p>
        </section>

        <!-- Location -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Location</h2>
            <p class="leading-relaxed">
                Located in the heart of Ayodhya, just 15 minutes by taxi from Ayodhya Cantt. and Ayodhya railway stations
                and  just 25 minutes by road from Ayodhya Airport.
            </p>
        </section>

        <!-- Hotel Details -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Hotel Details</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li>Number of floors: 6</li>
                <li>Suite Rooms (with Jacuzzi): 2</li>
                <li>Standard Rooms: 57</li>
                <li>Deluxe Room: 1</li>
                <li>Banquet Halls: 4 (including 4000 sq.ft. hall)</li>
                <li>Lawns: 1 (25000 sq.ft.)</li>
                <li>Elevators: 2</li>
            </ul>
        </section>

        <!-- Hotel Services -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Hotel Services</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li>Cooked-to-order / Buffet Breakfast for In-House & Walk-in guests</li>
                <li>High-speed Wireless Internet access in all rooms, function rooms, and public areas</li>
                <li>Travel and Concierge Desk</li>
                <li>Multi-lingual staff</li>
                <li>24-hour In-room dining</li>
                <li>Crescent - The multicuisine restaurant</li>
                <li>Tit-Bit the Café (in-house speciality serving bakery products, fast food & a sumptuous variety of tea &
                    coffee)</li>
                <li>Laundry Service</li>
                <li>Airport & railway station taxi service (chargeable)</li>
                <li>Gymnasium</li>
            </ul>
        </section>

        <!-- Room Features -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Room Features</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li>Keycard access to all rooms</li>
                <li>King or Double bedded rooms with sofa chairs</li>
                <li>High-speed Wireless Internet access</li>
                <li>Telephone with intercoms</li>
                <li>Tea Coffee maker with complimentary coffee, tea & milk sachets</li>
                <li>Bottled Water</li>
                <li>Mini Bar</li>
                <li>Wall Safe</li>
                <li>Slippers available (on request)</li>
                <li>Bath amenities and toiletry items</li>
                <li>Hair Dryer (on request)</li>
                <li>Iron and Board (on request)</li>
                <li>32-inch flat-screen television with English, Hindi, and other regional language channels</li>
            </ul>
        </section>




        <!-- Banquet Capacities -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Banquet Capacities</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr class="text-left">
                            <th class="border px-4 py-2">Hall Name</th>
                            <th class="border px-4 py-2">U-Shape</th>
                            <th class="border px-4 py-2">Cluster</th>
                            <th class="border px-4 py-2">Theatre</th>
                            <th class="border px-4 py-2">Classroom</th>
                            <th class="border px-4 py-2">Reception</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Royal Ballroom</td>
                            <td class="border px-4 py-2">100</td>
                            <td class="border px-4 py-2">150</td>
                            <td class="border px-4 py-2">300</td>
                            <td class="border px-4 py-2">100</td>
                            <td class="border px-4 py-2">300</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Elite-1</td>
                            <td class="border px-4 py-2">25</td>
                            <td class="border px-4 py-2">30</td>
                            <td class="border px-4 py-2">40</td>
                            <td class="border px-4 py-2">30</td>
                            <td class="border px-4 py-2">40</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Elite-2</td>
                            <td class="border px-4 py-2">35</td>
                            <td class="border px-4 py-2">50</td>
                            <td class="border px-4 py-2">70</td>
                            <td class="border px-4 py-2">35</td>
                            <td class="border px-4 py-2">70</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">On The Rocks</td>
                            <td class="border px-4 py-2">-</td>
                            <td class="border px-4 py-2">70</td>
                            <td class="border px-4 py-2">100</td>
                            <td class="border px-4 py-2">-</td>
                            <td class="border px-4 py-2">100</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Swayamvar Lawn</td>
                            <td class="border px-4 py-2">-</td>
                            <td class="border px-4 py-2">300</td>
                            <td class="border px-4 py-2">1000</td>
                            <td class="border px-4 py-2">-</td>
                            <td class="border px-4 py-2">1500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Restaurant -->
        <section>
            <h2 class="text-2xl font-bold mb-3 border-b-2 border-yellow-600 inline-block">Crescent Restaurant</h2>
            <p class="leading-relaxed">
                A Triumph of Taste
                The state of the art multicuisine restaurant “Crescent” accompanied with a rooftop open terrace is not just
                a stunningly designed venue but behind its splendid premises it hosts a real research Center where we are
                constantly at work to come up with new creations, in order to offer a unique dining experience in a magical
                blend of carefully studied details.
            </p>
            <p class="leading-relaxed">

                The restaurant staff will be able to advise you on the best choices, with much courtesy and competence.
            </p>
        </section>
    </div>
@endsection
