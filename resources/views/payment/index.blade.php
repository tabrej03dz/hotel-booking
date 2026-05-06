<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Payments') }}
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

    <form method="GET" action="{{ route('payment.index') }}">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

            <div>
                <label class="text-sm font-semibold text-gray-700 mb-1 block">Booking ID</label>
                <input type="text"
                       name="booking_id"
                       value="{{ request('booking_id') }}"
                       placeholder="Booking ID"
                       class="w-full rounded-xl border-gray-300">
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-700 mb-1 block">Status</label>
                <select name="status" class="w-full rounded-xl border-gray-300">
                    <option value="">All</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div>
                <label class="text-sm font-semibold text-gray-700 mb-1 block">Payment Method</label>
                <input type="text"
                       name="payment_method"
                       value="{{ request('payment_method') }}"
                       placeholder="cash / online"
                       class="w-full rounded-xl border-gray-300">
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

            <a href="{{ route('payment.index') }}"
               class="px-6 py-2.5 bg-gray-600 hover:bg-gray-700 text-white rounded-xl shadow-md">
                Reset
            </a>
        </div>
    </form>

</div>

<div class="flex flex-wrap items-center gap-3 mb-6">
    <form method="GET"
          action="{{ route('payment.export') }}"
          class="flex flex-wrap items-center gap-3">

        <input type="hidden" name="booking_id" value="{{ request('booking_id') }}">
        <input type="hidden" name="status" value="{{ request('status') }}">
        <input type="hidden" name="payment_method" value="{{ request('payment_method') }}">
        <input type="hidden" name="from_date" value="{{ request('from_date') }}">
        <input type="hidden" name="to_date" value="{{ request('to_date') }}">

        <select name="download_type"
                required
                class="rounded-xl border-gray-300">
            <option value="">Select Format</option>
            <option value="excel">Excel</option>
            <option value="pdf">PDF</option>
        </select>

        <button type="submit"
                class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl shadow-md">
            Download Report
        </button>
    </form>
</div>
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">💰 Payment Records</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Booking ID</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Payment Method</th>
                            <th class="px-6 py-4">Amount</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Paid At</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($payments as $payment)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $payment->booking_id }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $payment->booking->user->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-gray-700 capitalize">{{ $payment->payment_method }}</td>
                                <td class="px-6 py-4 text-gray-700">₹{{ number_format($payment->amount, 2) }}</td>
                                <td class="px-6 py-4 text-gray-700 capitalize">
                                    <form action="{{ route('payment.status', $payment->id) }}" method="GET" onsubmit="return confirm('Are you sure you want to change the payment status?')">
                                        @csrf
                                        <select name="status"
                                                onchange="if(confirm('Are you sure you want to change the payment status?')) this.form.submit(); else this.value = '{{ $payment->status }}';"
                                                class="px-2 py-1 rounded text-xs font-semibold
                                            @if($payment->status == 'paid') bg-green-100 text-green-700
                                            @elseif($payment->status == 'pending') bg-yellow-100 text-yellow-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                        </select>
                                    </form>

                                </td>

                                <td class="px-6 py-4 text-gray-700">{{ $payment->created_at->format('d M Y') }}</td>
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
