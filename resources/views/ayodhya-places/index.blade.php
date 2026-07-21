<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between rounded-lg bg-white px-6 py-4 shadow-md">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ __('Ayodhya Places') }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Manage attractions shown on the Explore Ayodhya page.
                </p>
            </div>

            <a wire:navigate
               href="{{ route('ayodhya-places.create') }}"
               class="inline-block rounded-lg bg-gradient-to-r from-[#c21108] to-[#000308] px-6 py-2.5 text-sm font-medium uppercase leading-tight text-white shadow-md transition duration-300 ease-in-out hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-[#c21108] focus:ring-offset-2">
                + Add Place
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 flex items-center rounded-lg bg-green-100 px-4 py-3 text-green-800 shadow-md">
                    <svg class="mr-2 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-6 flex items-center rounded-lg bg-red-100 px-4 py-3 text-red-700 shadow-md">
                    <svg class="mr-2 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 flex items-start rounded-lg bg-red-100 px-4 py-3 text-red-700 shadow-md">
                    <svg class="mr-2 mt-1 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-xl">

                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            🛕 Ayodhya Places
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            All tourist attractions displayed on the website.
                        </p>
                    </div>

                    <div class="rounded-lg bg-amber-50 px-4 py-2 text-sm font-semibold text-amber-800">
                        Total Places: {{ $places->total() }}
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full overflow-hidden rounded-lg border border-gray-200 text-left text-sm">

                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-xs font-semibold uppercase text-gray-700">
                            <tr>
                                <th class="whitespace-nowrap px-6 py-4">#</th>
                                <th class="whitespace-nowrap px-6 py-4">Image</th>
                                <th class="whitespace-nowrap px-6 py-4">Place Name</th>
                                <th class="whitespace-nowrap px-6 py-4">Category</th>
                                <th class="whitespace-nowrap px-6 py-4">Order</th>
                                <th class="whitespace-nowrap px-6 py-4">Status</th>
                                <th class="whitespace-nowrap px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($places as $place)
                                <tr class="transition hover:bg-gray-50">

                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $places->firstItem() + $loop->index }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="h-16 w-24 overflow-hidden rounded-lg border border-gray-200 bg-gray-100 shadow-sm">
                                            <img src="{{ $place->image_url }}"
                                                 alt="{{ $place->name }}"
                                                 class="h-full w-full object-cover"
                                                 loading="lazy"
                                                 onerror="this.onerror=null; this.src='{{ asset('asset/images/no-image.png') }}';">
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">
                                            {{ $place->name }}
                                        </div>

                                        @if ($place->slug)
                                            <div class="mt-1 max-w-[220px] truncate text-xs text-gray-400">
                                                {{ $place->slug }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        @if ($place->category)
                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800">
                                                {{ $place->category }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="inline-flex h-9 min-w-9 items-center justify-center rounded-full bg-gray-100 px-3 font-semibold text-gray-700">
                                            {{ $place->sort_order }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($place->status)
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                                Active
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                                <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-3">

                                            {{-- View Frontend Detail Page --}}
                                            @if ($place->status)
                                                <a href="{{ route('ayodhya.places.show', $place->slug) }}"
                                                   target="_blank"
                                                   class="rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white shadow transition hover:bg-indigo-600">
                                                    👁️ View
                                                </a>
                                            @endif

                                            {{-- Edit --}}
                                            <a wire:navigate
                                               href="{{ route('ayodhya-places.edit', $place) }}"
                                               class="rounded-md bg-yellow-500 px-4 py-2 text-sm font-semibold text-white shadow transition hover:bg-yellow-600">
                                                ✏️ Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('ayodhya-places.destroy', $place) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete {{ addslashes($place->name) }}?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-md bg-red-500 px-4 py-2 text-sm font-semibold text-white shadow transition hover:bg-red-600">
                                                    🗑️ Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"
                                        class="px-6 py-14 text-center">

                                        <div class="mx-auto flex max-w-md flex-col items-center">
                                            <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 text-3xl">
                                                🛕
                                            </div>

                                            <h3 class="text-lg font-bold text-gray-700">
                                                No Ayodhya places found
                                            </h3>

                                            <p class="mt-2 text-sm text-gray-400">
                                                Add your first tourist attraction to display it on the Explore Ayodhya page.
                                            </p>

                                            <a wire:navigate
                                               href="{{ route('ayodhya-places.create') }}"
                                               class="mt-5 rounded-lg bg-gradient-to-r from-[#c21108] to-[#000308] px-5 py-2.5 text-sm font-semibold text-white shadow transition hover:from-[#000308] hover:to-[#c21108]">
                                                + Add First Place
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($places->hasPages())
                    <div class="mt-6 border-t border-gray-100 pt-6">
                        {{ $places->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>