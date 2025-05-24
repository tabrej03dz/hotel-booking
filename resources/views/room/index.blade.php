<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Rooms') }}
            </h2>
            @can('create room')
                <a wire:navigate href="{{ route('rooms.create') }}"
                   class="inline-block px-6 py-2.5 bg-gradient-to-r from-[#c21108] to-[#000308] text-white font-medium text-sm leading-tight uppercase rounded-lg shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                    + Create Room
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="flex items-center bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex items-start bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-md">
                    <svg class="w-6 h-6 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">🛏️ Rooms</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Room Number</th>
                            <th class="px-6 py-4">Hotel</th>
                            <th class="px-6 py-4">Room Type</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($rooms as $room)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $room->room_number }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $room->hotel->name ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $room->roomType->name ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-700 capitalize">{{ $room->status }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        @can('edit room')
                                            <a href="{{ route('rooms.edit', $room->id) }}"
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition shadow">
                                                ✏️ Edit
                                            </a>
                                        @endcan

                                        @can('delete room')
                                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?');" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition shadow">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-400 text-base">
                                    No rooms found.
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
