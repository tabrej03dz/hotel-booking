<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md inline-block">
            {{ __('Dashboard') }}
        </h2> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Dashboard') }}
            </h2>

                <a href="{{ route('dashboard') }}"
                    class="font-bold text-2xl text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md inline-block hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                    {{ __('Dashboard') }}
                </a>


        </div>
    </x-slot>

    <div class="mt-10  md:px-32">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center my-12">📊 Business-wise Analytics</h3>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h4 class="text-lg font-semibold text-gray-700">Total Bookings</h4>
        <p class="text-2xl font-bold text-blue-600">{{ $totalBookings }}</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h4 class="text-lg font-semibold text-gray-700">Total Payments</h4>
        <p class="text-2xl font-bold text-green-600">₹{{ number_format($totalPayments, 2) }}</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h4 class="text-lg font-semibold text-gray-700">Completed Bookings</h4>
        <p class="text-2xl font-bold text-purple-600">{{ $completedBookings }}</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h4 class="text-lg font-semibold text-gray-700">Pending Payments</h4>
        <p class="text-2xl font-bold text-red-600">₹{{ number_format($pendingPayments, 2) }}</p>
    </div>
</div>


<div class="my-12 bg-white p-6 rounded-lg shadow-md">
    <canvas id="bookingChart" height="100"></canvas>
</div>

<script>
    const ctx = document.getElementById('bookingChart').getContext('2d');
    const bookingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total', 'Completed'],
            datasets: [{
                label: 'Bookings',
                data: [{{ $totalBookings }}, {{ $completedBookings }}],
                backgroundColor: ['#3b82f6', '#10b981'],
            }]
        }
    });
</script>


    </div>


</x-app-layout>
