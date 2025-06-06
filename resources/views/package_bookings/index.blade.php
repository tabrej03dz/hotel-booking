<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="flex items-center bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex items-start bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-md">
                    <svg class="w-6 h-6 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">📦 Package Bookings</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Full Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Phone</th>
                            <th class="px-6 py-4">Package</th>
                            <th class="px-6 py-4">Preferred Date</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($packageBookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $booking->full_name }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $booking->email }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $booking->phone }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $booking->package_name }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ \Carbon\Carbon::parse($booking->preferred_date)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('package-booking.show', $booking->id) }}"
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition shadow">
                                            ✏️ Edit
                                        </a>

                                        <form action="{{ route('package-booking.destroy', $booking->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                              class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition shadow">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-6 text-gray-400 text-base">
                                    No bookings found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
