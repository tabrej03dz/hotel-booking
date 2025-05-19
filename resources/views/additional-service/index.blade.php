<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">💰 Additional Service</h2>
                @can('create additional service')
                    <a wire:navigate href="{{ route('additional-service.create') }}"
                       class="inline-block px-6 py-2.5 bg-gradient-to-r from-[#c21108] to-[#000308] text-white font-medium text-sm leading-tight uppercase rounded-lg shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                        + Create Additional Service
                    </a>
                @endcan
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($additionalServices as $service)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-700 capitalize">{{ $service->name }}</td>
                                <td class="px-6 py-4 text-gray-700">₹{{ $service->price }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        @can('edit additional service')
                                            <a href="{{ route('additional-service.edit', $service->id) }}"
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition shadow">
                                                ✏️ Edit
                                            </a>
                                        @endcan

                                        @can('delete additional service')
                                            <form action="{{ route('additional-service.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?');" class="inline">
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
                                <td colspan="7" class="text-center py-6 text-gray-400 text-base">
                                    No payments found.
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
