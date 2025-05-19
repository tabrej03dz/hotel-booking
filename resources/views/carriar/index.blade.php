<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Carriars') }}
            </h2>
            @can('create carriar')
                <a href="{{ route('carriar.create') }}"
                   class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-sm leading-tight uppercase rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                    + Post Job
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-4">📋 Job Listings</h2>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-50 text-gray-700 uppercase font-semibold text-xs">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Company</th>
                                <th class="px-4 py-3">Location</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Last Date</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($jobs as $job)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $job->title }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $job->company_name }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $job->location }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $job->type }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $job->last_date_to_apply ? \Carbon\Carbon::parse($job->last_date_to_apply)->format('d M Y') : 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-3">
                                            @can('edit carriar')
                                                <a href="{{ route('carriar.edit', $job->id) }}"
                                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded-md text-sm font-semibold transition shadow">
                                                    ✏️ Edit
                                                </a>
                                            @endcan

                                            @can('delete carriar')
                                                <form action="{{ route('carriar.delete', $job->id) }}" method="get"
                                                      onsubmit="return confirm('Are you sure you want to delete this job?');"
                                                      class="inline">
                                                    @csrf
                                                
                                                    <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-sm font-semibold transition shadow">
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
                                        No jobs found.
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
