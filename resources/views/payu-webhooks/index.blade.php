<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('PayU Webhook Logs') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 mb-6">
                <form method="GET" action="{{ route('payu.webhooks.logs') }}">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">Transaction ID</label>
                            <input type="text"
                                   name="txnid"
                                   value="{{ request('txnid') }}"
                                   placeholder="Txn ID"
                                   class="w-full rounded-xl border-gray-300">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">PayU ID</label>
                            <input type="text"
                                   name="mihpayid"
                                   value="{{ request('mihpayid') }}"
                                   placeholder="PayU ID"
                                   class="w-full rounded-xl border-gray-300">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">Payment Status</label>
                            <select name="status" class="w-full rounded-xl border-gray-300">
                                <option value="">All</option>
                                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                                <option value="failure" {{ request('status') == 'failure' ? 'selected' : '' }}>Failure</option>
                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">Process Status</label>
                            <select name="process_status" class="w-full rounded-xl border-gray-300">
                                <option value="">All</option>
                                <option value="received" {{ request('process_status') == 'received' ? 'selected' : '' }}>Received</option>
                                <option value="processed" {{ request('process_status') == 'processed' ? 'selected' : '' }}>Processed</option>
                                <option value="failed" {{ request('process_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">From Date</label>
                            <input type="date"
                                   name="from_date"
                                   value="{{ request('from_date') }}"
                                   class="w-full rounded-xl border-gray-300">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1 block">To Date</label>
                            <input type="date"
                                   name="to_date"
                                   value="{{ request('to_date') }}"
                                   class="w-full rounded-xl border-gray-300">
                        </div>

                    </div>

                    <div class="flex flex-wrap gap-3 mt-5">
                        <button type="submit"
                                class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-md">
                            Filter
                        </button>

                        <a href="{{ route('payu.webhooks.logs') }}"
                           class="px-6 py-2.5 bg-gray-600 hover:bg-gray-700 text-white rounded-xl shadow-md">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">🔔 PayU Webhook Records</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                            <tr>
                                <th class="px-6 py-4">#</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Txn ID</th>
                                <th class="px-6 py-4">PayU ID</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Process</th>
                                <th class="px-6 py-4">Message</th>
                                <th class="px-6 py-4">Payload</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($logs as $log)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $loop->iteration + ($logs->currentPage() - 1) * $logs->perPage() }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-700 whitespace-nowrap">
                                        {{ $log->created_at ? $log->created_at->format('d M Y h:i A') : '-' }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $log->txnid ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $log->mihpayid ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4 capitalize">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if(strtolower($log->status) == 'success') bg-green-100 text-green-700
                                            @elseif(strtolower($log->status) == 'failure' || strtolower($log->status) == 'failed') bg-red-100 text-red-700
                                            @else bg-yellow-100 text-yellow-700
                                            @endif">
                                            {{ $log->status ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 capitalize">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($log->process_status == 'processed') bg-green-100 text-green-700
                                            @elseif($log->process_status == 'received') bg-yellow-100 text-yellow-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            {{ $log->process_status }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-gray-700 min-w-[220px]">
                                        {{ $log->message ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <details>
                                            <summary class="cursor-pointer text-blue-600 hover:text-blue-800 font-semibold">
                                                View
                                            </summary>

                                            <pre class="bg-gray-900 text-white p-4 rounded-xl mt-3 text-xs overflow-x-auto max-w-[500px] max-h-[300px]">{{ json_encode($log->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                                        </details>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-6 text-gray-400 text-base">
                                        No webhook logs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $logs->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>